@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-center">
                    <x-alert/>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                {{ __('Routes') }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('route.create') }}" class="btn btn-success">Add Route</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Route Code</th>
                                <th>Route Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($routes as $route)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$route->code}}</td>
                                    <td>{{$route->name}}</td>
                                    <td>
                                        @if($route->status == 1)
                                            <button class="btn btn-success">Active</button>
                                        @else
                                            <button class="btn btn-danger">Inactive</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $routes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
