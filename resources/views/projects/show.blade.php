@extends('layouts.master')

@section('content')
    <!-- row opened -->
    <div class="row row-sm mt-4">
        <div class="col-12  col-lg-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Project: {{$project->name}}</h5>
                    <p class="card-text">Client: {{$project->client->name}}</p>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->

    <div class="row">
        @foreach($project->tasks as $i=>$task)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">Task {{++$i}}: {{$task->name}}</h5>
                    </div>

                </div>
            </div>
        @endforeach

    </div>


@endsection
