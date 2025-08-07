@extends('layouts.master')

@section('content')
    <div class="container">
        				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Cards</span></div>
					</div>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary ml-2">Create New Project</a>
				</div>
				<!-- breadcrumb -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="row">
            @foreach($data as $row)
                <div class="col-12 col-sm-6 col-lg-6 col-xl-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">{{ $row->name }}</h5>
                        </div>
                        <div class="card-body">
                            <strong>Tasks:</strong>
                            @if($row->tasks->count())
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach($row->tasks as $task)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $task->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No tasks assigned</span>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Client: {{ $row->client->name ?? 'N/A' }}</span>
                                <span>Assigned to: {{ $row->user->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('projects.show', $row->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
