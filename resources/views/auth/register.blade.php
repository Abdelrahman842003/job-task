@extends('frontend.layouts.main')
@section('title','Register')
@section('content')
    <div class="container mb-30">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body p-5">
                        <h3 class="card-title text-center mb-4">Register with</h3>

                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-primary" type="button"><i class="bi bi-facebook"></i> Facebook
                            </button>
                            <button class="btn btn-dark" type="button"><i class="bi bi-apple"></i> Apple</button>
                            <button class="btn btn-danger" type="button"><i class="bi bi-google"></i> Google</button>
                        </div>

                        <div class="text-center mb-3">or</div>

                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid text-center">
                                <button type="submit" class="btn btn-primary ">Register</button>
                            </div>

                        </form>

                        <div class="text-center mt-3">
                            <small>Already have an account? <a class="text-info" href="#">Sign in</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
