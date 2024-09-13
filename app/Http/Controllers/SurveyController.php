<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Log;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Entry;
use App\Models\User;
use \Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        $surveysRaw = Survey::all();
        $surveys = $surveysRaw->map(function($survey) {
            $project = Project::find($survey->project_id);
            return [
                'survey' => $survey,
                'project_name' => $project ? $project->nama : 'N/A'
            ];
        });

        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('surveys.create', compact('projects'));
    }

    public function store(Request $request)
    {
        try {
            logger($request->all()); // Use Laravel's logger

            $request->validate([
                'name' => 'required|string|max:255',
                'settings.accept-guest-entries' => 'required',
                'settings.limit-per-participant' => 'required',
                'sections' => 'required|array',
                'sections.*.name' => 'required|string',
                'sections.*.questions' => 'required|array',
                'sections.*.questions.*.content' => 'required|string',
                'sections.*.questions.*.type' => 'required|string',
                'sections.*.questions.*.rules' => 'nullable|string',
            ]);

            $survey = Survey::create([
                'name' => $request->name,
                'settings' => [
                    'accept-guest-entries' => filter_var($request->settings['accept-guest-entries'], FILTER_VALIDATE_BOOLEAN),
                    'limit-per-participant' => (int) $request->settings['limit-per-participant'],
                ]
            ]);

            foreach ($request->sections as $sectionData) {
                $section = $survey->sections()->create(['name' => $sectionData['name']]);

                foreach ($sectionData['questions'] as $questionData) {
                    $section->questions()->create([
                        'content' => $questionData['content'],
                        'type' => $questionData['type'],
                        'rules' => isset($questionData['rules']) ? explode(',', $questionData['rules']) : [],
                        'options' => isset($questionData['options']) ? explode(',', $questionData['options']) : null,
                    ]);
                }
            }

            DB::update('UPDATE surveys SET project_id = ? WHERE id = ?', [$request->project_id, $survey->id]);

            return redirect()->route('surveys.index')->with('success', 'Survey created successfully.');
        } catch (\Exception $e) {
            Log::error('Survey creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create survey. Please try again later.');
        }
    }

    public function view($id)
    {
        $survey = Survey::with('sections.questions')->findOrFail($id);
        $lastEntry = Entry::where('participant_id', auth()->id())->latest()->first();
        $projects = Project::all();

        return view('surveys.view', compact('survey', 'lastEntry', 'projects'));
    }

    public function edit(Survey $survey)
    {
        $projects = Project::all();
        return view('surveys.edit', compact('survey', 'projects'));
    }

    public function update(Request $request, Survey $survey)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'settings.accept-guest-entries' => 'required',
                'settings.limit-per-participant' => 'required',
                'sections' => 'required|array',
                'sections.*.name' => 'required|string',
                'sections.*.questions' => 'required|array',
                'sections.*.questions.*.content' => 'required|string',
                'sections.*.questions.*.type' => 'required|string',
                'sections.*.questions.*.rules' => 'nullable|string',
            ]);

            // Update Survey
            $survey->update([
                'name' => $request->name,
                'settings' => [
                    'accept-guest-entries' => filter_var($request->settings['accept-guest-entries'], FILTER_VALIDATE_BOOLEAN),
                    'limit-per-participant' => (int) $request->settings['limit-per-participant'],
                ]
            ]);

            // Loop through each section in the request
            foreach ($request->sections as $sectionData) {
                $section = $survey->sections()->updateOrCreate(
                    ['name' => $sectionData['name']], // Find or create the section by name
                    ['name' => $sectionData['name']] // Update the section's name
                );

                // Loop through each question in the section
                foreach ($sectionData['questions'] as $questionData) {
                    $question = $section->questions()->updateOrCreate(
                        ['content' => $questionData['content']], // Find or create the question by content
                        [
                            'type' => $questionData['type'], // Update the question's type
                            'rules' => isset($questionData['rules']) ? explode(',', $questionData['rules']) : [], // Update the question's rules
                            'options' => isset($questionData['options']) ? explode(',', $questionData['options']) : null, // Update the question's options
                        ]
                    );
                }
            }

            DB::update('UPDATE surveys SET project_id = ? WHERE id = ?', [$request->project_id, $survey->id]);

            return redirect()->route('surveys.index')->with('success', 'Survey updated successfully.');
        } catch (\Exception $e) {
            Log::error('Survey update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update survey. Please try again later.');
        }
    }


    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted successfully!');
    }

    public function createEntry(Survey $survey)
    {
        $lastEntry = null;
        return view('surveys.submit', compact('survey', 'lastEntry'));
    }
    public function submit(Survey $survey, Request $request)
    {
        // Validate the request data against the survey's rules
        $answers = $request->validate($survey->rules);

        // Create a new entry for the survey with the validated answers
        (new Entry)->for($survey)->by(auth()->user())->fromArray($answers)->push();

        // Redirect to a confirmation page or back to the survey list with a success message
        return redirect()->route('surveys.index')->with('success', 'Your responses have been submitted successfully.');
    }

    public function results(Survey $survey)
    {
        $results = [];
        $totalResponses = $survey->entries()->count();

        foreach ($survey->sections as $section) {
            $sectionResults = [];
            foreach ($section->questions as $question) {
                $answers = [];
                if ($question->type === 'multiselect') {
                    foreach ($question->answers as $answer) {
                        // Split each answer by comma and trim whitespace
                        $splitAnswers = array_map('trim', explode(',', $answer->value));
                        $answers = array_merge($answers, $splitAnswers);
                    }
                } else {
                    // For other types (radio, text, number, etc.)
                    $answers = $question->answers()->pluck('value')->toArray();
                }

                $sectionResults[] = [
                    'question' => $question->content,
                    'type' => $question->type,
                    'options' => $question->options,
                    'answers' => $answers,
                ];
            }
            $results[] = [
                'section' => $section->name,
                'questions' => $sectionResults
            ];
        }

        return view('surveys.results', compact('survey', 'results', 'totalResponses'));
    }
}
