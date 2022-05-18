@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Route') }}</div>

                    <div class="card-body">
                        <form action="{{ route('route.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="code" class="form-label">Code</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="code" id="code" @error('code') style="border-color: red"
                                           @enderror value="{{old('code')}}">
                                </div>

                                @error('code')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Name</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" @error('name') style="border-color: red"
                                           @enderror value="{{old('name')}}">
                                </div>

                                @error('name')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="row pt-3">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>

                                <div class="col-md-2">
                                    <a href="{{route('route.index')}}" class="btn btn-danger"> Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
