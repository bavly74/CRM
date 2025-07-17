@extends('layouts.master')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <!-- row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card  box-shadow-0">
                        <div class="card-header">
                            <h4 class="card-title mb-1">Sync Permissions</h4>
                        </div>
                        <div class="card-body pt-0">
                            <form class="form-horizontal" action="{{route('roles.StoreSyncPermission',['id' => $role->id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input disabled type="text" name="role" class="form-control" value="{{$role->name}}">
                                </div>

                                <div class="form-group mb-0 justify-content-end">
                                    @foreach($permissions as $permission)
                                        <div class="checkbox">
                                            <div class="custom-checkbox custom-control">
                                                <input
                                                    type="checkbox"
                                                    name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    data-checkboxes="mygroup"
                                                    class="custom-control-input"
                                                    id="checkbox-{{ $permission->id }}"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                    required>

                                                <label for="checkbox-{{ $permission->id }}" class="custom-control-label mt-1">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('permissions')<span class="text-danger">{{ $message }}</span>@enderror

                                </div>
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
