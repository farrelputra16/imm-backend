@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    <style>
        .dashboard-card {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="row">
        <!-- Posts Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('posts.index') }}" class="text-decoration-none">
                <div class="card border-left-success shadow h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">Blogs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['postCount'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Events Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('events.index') }}" class="text-decoration-none">
                <div class="card border-left-info shadow h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-info text-uppercase mb-1">Events</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['eventCount'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Companies Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('companies.index') }}" class="text-decoration-none">
                <div class="card border-left-warning shadow h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Companies</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['companyCount'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Projects Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('projects.index') }}" class="text-decoration-none">
                <div class="card border-left-danger shadow h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Projects</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['projectCount'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Recent Posts -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Blogs</h6>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($recentPosts as $post)
                            <li class="list-group-item">
                                <a href="{{ route('posts.view', $post->id) }}">{{ $post->title }}</a>
                                <small class="float-right text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Events</h6>
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($upcomingEvents as $event)
                            <li class="list-group-item">
                                <a href="{{ route('events.view', $event->id) }}">{{ $event->title }}</a>
                                <small
                                    class="float-right text-muted">{{ \Illuminate\Support\Carbon::parse($event->start)->format('Y-m-d\TH:i') }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
