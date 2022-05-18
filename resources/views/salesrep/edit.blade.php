@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Sales Representative') }}</div>

                    <div class="card-body">
                        <form action="{{ route('sales-rep.update', $rep->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <a href="{{route('sales-rep.index')}}" class="btn btn-success"> Back to List</a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label font-weight-bold">ID:</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="id" id="id" value="{{$rep->id}}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Full Name:</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{$rep->name}}">
                                </div>

                                @error('name')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email Address:</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="{{$rep->email}}">
                                </div>

                                @error('email')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="telephone" class="form-label">Telephone:</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="telephone" id="telephone"
                                           value="{{$rep->telephone}}">
                                </div>

                                @error('telephone')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="joined_date" class="form-label">Joined Date:</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="joined_date" id="joined_date"
                                           value="{{$rep->joined_date}}">
                                </div>

                                @error('telephone')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="route_id" class="form-label">Current Route:</label>
                                </div>

                                <div class="col-md-4">
                                    <select name="route_id" id="route_id" class="form-control">
                                        <option value="">SELECT ROUTE</option>
                                        @foreach($routes as $route)
                                            <option value="{{$route->id}}" @if($rep->route_id == $route->id) selected @endif>{{$route->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('route_id')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label for="comments" class="form-label">Comments:</label>
                                </div>

                                <div class="col-md-6">
                                    <textarea id="comments" class="form-control" name="comments" rows="4" cols="50">{{$rep->comments}}</textarea>
                                    {{--                                    <input type="text" class="form-control" name="joined_date" id="joined_date"">--}}
                                </div>

                                @error('comments')
                                <div class="mt-1 text-danger small">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>

                                <div class="col-md-2">
                                    <a href="{{route('sales-rep.index')}}" class="btn btn-danger"> Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
