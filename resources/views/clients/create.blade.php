@extends('layouts.master')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif
        <div class="row row-sm">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Add Client</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form class="form-horizontal" action="{{route('clients.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" >
                            </div>
                            @error('name') <div class="text-danger">{{$message}}</div> @enderror

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" >
                            </div>
                            @error('email') <div class="text-danger">{{$message}}</div> @enderror

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
