@extends('layouts.master')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    				<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">All Tasks</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
                                    @can('add tasks')
                                        <a href="{{route('tasks.create')}}" class="btn btn-primary">Add Task</a>
                                    @endcan
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">Name</th>
												<th class="wd-15p border-bottom-0">Project</th>
												<th class="wd-20p border-bottom-0">Assigned To</th>
												<th class="wd-15p border-bottom-0">Client</th>

											</tr>
										</thead>
										<tbody>

                                                @foreach ($data as $row )
                                                    <tr>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->project->name }}</td>
                                                        <td>{{ $row->project->user->name }}</td>
                                                        <td>{{ $row->project->client->name }}</td>
                                                    </tr>
                                                @endforeach

										</tbody>
                                    </table>
								</div>
							</div>
					    </div>
                    </div>
</div>
@endsection
