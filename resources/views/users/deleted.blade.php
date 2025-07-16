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
                        <h4 class="card-title mg-b-0">All Users</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                        @can('add users')
                            <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
                            <a href="{{route('user.showDeletedUsers')}}" class="btn btn-primary">Show Deleted Users</a>

                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Role/s</th>
                                <th class="wd-15p border-bottom-0">Actions</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $row )
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @foreach ($row->roles as $role )
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('user.restore',['id'=>$row->id])}}" class="btn btn-success">restore</a>
                                    </td>
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
