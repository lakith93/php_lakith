@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="name" class="form-label fw-bold">Full Name <span
                                    class="text-danger small"> * </span></label>
                            @error('first_name')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="name" name="name" class="form-control"
                                   @error('name') style="border-color: red"
                                   @enderror value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="address" class="form-label fw-bold">Address <span
                                    class="text-danger small"> * </span></label>
                            @error('address')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="address" id="address" class="form-control"
                                   @error('address') style="border-color: red" @enderror value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="dob" class="form-label fw-bold">Date of Birth <span
                                    class="text-danger small"> * </span></label>
                            @error('dob')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="dob" id="dob" class="form-control"
                                   @error('dob') style="border-color: red" @enderror value="{{ old('dob') }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="nic" class="form-label fw-bold">NIC <span
                                    class="text-danger small"> * </span></label>
                            @error('nic')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nic" name="nic" class="form-control"
                                   @error('nic') style="border-color: red" @enderror value="{{ old('nic')}}">
                        </div>
                    </div>


                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="mobile" class="form-label fw-bold">Mobile <span
                                    class="text-danger small"> * </span></label>
                            @error('mobile')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="mobile" name="mobile" class="form-control"
                                   @error('mobile') style="border-color: red" @enderror value="{{ old('mobile') }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="email" class="form-label fw-bold">E-Mail</label>
                            @error('email')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="email" id="email" name="email" class="form-control"
                                   @error('email') style="border-color: red" @enderror value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="gender" class="form-label fw-bold">Gender</label>
                            @error('gender')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="gender" name="gender">
                                <option value="" selected>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="password" class="form-label fw-bold">Password <span
                                    class="text-danger small"> * </span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" id="password" name="password" class="form-control"
                                   @error('password') style="border-color: red" @enderror>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end">
                            <label for="password_confirmation" class="form-label fw-bold">Password Again</label>
                            @error('password')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control"
                                   @error('password_confirmation') style="border-color: red" @enderror>
                        </div>
                    </div>


                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 text-end"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success mt-2">Register</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
