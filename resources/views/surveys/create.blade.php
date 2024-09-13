@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Survey</h1>

        <form action="{{ route('surveys.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Survey Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="project_id">Select Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <option value="">-- Select Project --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="accept-guest-entries">Accept Guest Entries</label>
                <select name="settings[accept-guest-entries]" id="accept-guest-entries" class="form-control">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="limit-per-participant">Limit Per Participant</label>
                <input type="number" name="settings[limit-per-participant]" id="limit-per-participant" class="form-control" value="1">
            </div>

            <div id="sections-container">
                <div class="section-group">
                    <div class="form-group">
                        <label for="section-name">Section Name</label>
                        <input type="text" name="sections[0][name]" class="form-control section-name" required>
                    </div>

                    <div class="questions-container">
                        <div class="form-group question-group">
                            <label for="question-content">Question</label>
                            <input type="text" name="sections[0][questions][0][content]" class="form-control" required>

                            <label for="question-type">Type</label>
                            <select name="sections[0][questions][0][type]" class="form-control question-type" required>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="radio">Radio</option>
                                <option value="multiselect">Multiselect</option>
                                <option value="range">Range</option>
                            </select>

                            <label for="question-rules">Rules (comma-separated)</label>
                            <input type="text" name="sections[0][questions][0][rules]" class="form-control" placeholder="e.g. required, numeric, min:0">

                            <label for="question-options">Options (comma-separated, for radio and multiselect)</label>
                            <input type="text" name="sections[0][questions][0][options]" class="form-control question-options" disabled>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary add-question">Add Question</button>
                </div>
            </div>

            <button type="button" id="add-section" class="btn btn-secondary">Add Section</button>
            <button type="submit" class="btn btn-primary">Create Survey</button>
        </form>

        <div class="mt-5">
            <h3>Available Validation Rules</h3>
            <ul>
                <li>required</li>
                <li>email</li>
                <li>url</li>
                <li>alpha</li>
                <li>numeric</li>
                <li>integer</li>
                <li>boolean</li>
                <li>array</li>
                <li>min:value</li>
                <li>max:value</li>
                <li>between:min,max</li>
                <li>size:value</li>
                <li>in:foo,bar,...</li>
                <li>not_in:foo,bar,...</li>
                <li>exists:table,column</li>
                <li>unique:table,column</li>
                <li>regex:pattern</li>
                <li>date</li>
                <li>before:date</li>
                <li>after:date</li>
                <!-- Add more rules as needed -->
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateQuestionOptions(selectElement) {
                const type = selectElement.value;
                const formGroup = selectElement.closest('.form-group');
                const optionsInput = formGroup.querySelector('.question-options');

                if (type === 'radio' || type === 'multiselect') {
                    optionsInput.disabled = false;
                } else {
                    optionsInput.disabled = true;
                    optionsInput.value = '';
                }
            }

            document.querySelectorAll('.question-type').forEach(function(selectElement) {
                updateQuestionOptions(selectElement);
                selectElement.addEventListener('change', function() {
                    updateQuestionOptions(selectElement);
                });
            });

            document.getElementById('add-section').addEventListener('click', function() {
                const container = document.getElementById('sections-container');
                const sectionIndex = container.querySelectorAll('.section-group').length;
                const sectionHtml = `
                    <div class="section-group">
                        <div class="form-group">
                            <label for="section-name">Section Name</label>
                            <input type="text" name="sections[${sectionIndex}][name]" class="form-control section-name" required>
                        </div>

                        <div class="questions-container">
                            <div class="form-group question-group">
                                <label for="question-content">Question</label>
                                <input type="text" name="sections[${sectionIndex}][questions][0][content]" class="form-control" required>

                                <label for="question-type">Type</label>
                                <select name="sections[${sectionIndex}][questions][0][type]" class="form-control question-type" required>
                                    <option value="text">Text</option>
                                    <option value="number">Number</option>
                                    <option value="radio">Radio</option>
                                    <option value="multiselect">Multiselect</option>
                                    <option value="range">Range</option>
                                </select>

                                <label for="question-rules">Rules (comma-separated)</label>
                                <input type="text" name="sections[${sectionIndex}][questions][0][rules]" class="form-control" placeholder="e.g. required, numeric, min:0">

                                <label for="question-options">Options (comma-separated, for radio and multiselect)</label>
                                <input type="text" name="sections[${sectionIndex}][questions][0][options]" class="form-control question-options" disabled>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary add-question">Add Question</button>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', sectionHtml);

                const newSelectElement = container.querySelector(`.section-group:last-child .question-type`);
                updateQuestionOptions(newSelectElement);
                newSelectElement.addEventListener('change', function() {
                    updateQuestionOptions(newSelectElement);
                });
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('add-question')) {
                    const sectionGroup = event.target.closest('.section-group');
                    const sectionIndex = Array.from(sectionGroup.parentNode.children).indexOf(sectionGroup);
                    const questionsContainer = sectionGroup.querySelector('.questions-container');
                    const questionIndex = questionsContainer.querySelectorAll('.question-group').length;
                    const questionHtml = `
                        <div class="form-group question-group">
                            <label for="question-content">Question</label>
                            <input type="text" name="sections[${sectionIndex}][questions][${questionIndex}][content]" class="form-control" required>

                            <label for="question-type">Type</label>
                            <select name="sections[${sectionIndex}][questions][${questionIndex}][type]" class="form-control question-type" required>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="radio">Radio</option>
                                <option value="multiselect">Multiselect</option>
                                <option value="range">Range</option>
                            </select>

                            <label for="question-rules">Rules (comma-separated)</label>
                            <input type="text" name="sections[${sectionIndex}][questions][${questionIndex}][rules]" class="form-control" placeholder="e.g. required, numeric, min:0">

                            <label for="question-options">Options (comma-separated, for radio and multiselect)</label>
                            <input type="text" name="sections[${sectionIndex}][questions][${questionIndex}][options]" class="form-control question-options" disabled>
                        </div>
                    `;
                    questionsContainer.insertAdjacentHTML('beforeend', questionHtml);

                    const newSelectElement = questionsContainer.querySelector(`.question-group:last-child .question-type`);
                    updateQuestionOptions(newSelectElement);
                    newSelectElement.addEventListener('change', function() {
                        updateQuestionOptions(newSelectElement);
                    });
                }
            });
        });
    </script>
@endsection
