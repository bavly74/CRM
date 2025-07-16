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

                            <a href="{{route('roles.create')}}" class="btn btn-primary">Add Role</a>
{{--                            <a href="{{route('user.showDeletedUsers')}}" class="btn btn-primary">Add Permission</a>--}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Role Name</th>
                                <th class="wd-15p border-bottom-0">Permissions</th>
                                <th class="wd-15p border-bottom-0">Actions</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $row )
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                    @foreach($row->permissions  as $permission)
                                        {{ $permission->name . ' - '??'' }}

                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('roles.syncPermission',['id'=>$row->id])}}" class="btn btn-primary">Sync Permissions</a>
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

