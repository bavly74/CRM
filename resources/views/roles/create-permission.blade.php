@extends('layouts.master')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-sm">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Add Permisison</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form class="form-horizontal" action="{{route('permission.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-0 justify-content-end">
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <div class="custom-checkbox custom-control">
                                            <input
                                                type="checkbox"
                                                name="roles[]"
                                                value="{{ $role->name }}"
                                                data-checkboxes="mygroup"
                                                class="custom-control-input"
                                                id="checkbox-{{ $role->id }}"
                                                required>

                                            <label for="checkbox-{{ $role->id }}" class="custom-control-label mt-1">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                @error('roles')<span class="text-danger">{{ $message }}</span>@enderror

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
