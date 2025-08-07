@extends('layouts.master')

@section('content')
    <!-- row opened -->
    <div class="row row-sm mt-4">
        <div class="col-12 col-lg-6 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Project: {{ $project->name }}</h5>
                    <p class="card-text">Client: {{ $project->client->name ?? 'N/A' }}</p>
                    <p>Assigned to: {{ $project->user->name ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <div class="row">
        @forelse($project->tasks as $i => $task)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-3 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Task {{ $i + 1 }}: {{ $task->name }}</h5>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary">No tasks assigned to this project.</div>
            </div>
        @endforelse
    </div>
@endsection
