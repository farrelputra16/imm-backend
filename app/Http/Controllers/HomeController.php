<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Event;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $postCount = Post::count();
        $eventCount = Event::count();
        $companyCount = Company::count();
        $projectCount = Project::count();

        $recentPosts = Post::latest()->take(5)->get();
        $upcomingEvents = Event::where('start', '>=', now())
            ->orderBy('start', 'asc')
            ->take(5)
            ->get();

        $widget = [
            'postCount' => $postCount,
            'eventCount' => $eventCount,
            'companyCount' => $companyCount,
            'projectCount' => $projectCount,
        ];

        return view('home', compact('widget', 'recentPosts', 'upcomingEvents'));
    }
}
