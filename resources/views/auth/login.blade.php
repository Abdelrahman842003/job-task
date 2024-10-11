@extends('frontend.layouts.main')
@section('title','Login')
@section('content')
    <div class="container mb-30">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body p-5">
                        <h3 class="card-title text-center mb-4">Login with</h3>

                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-primary" type="button"> <i class="bi bi-facebook"></i> Facebook</button>
                            <button class="btn btn-dark" type="button"> <i class="bi bi-apple"></i> Apple</button>
                            <button class="btn btn-danger" type="button"> <i class="bi bi-google"></i> Google</button>
                        </div>

                        <div class="text-center mb-3">or</div>

                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="d-grid text-center">
                                <button type="submit" class="btn btn-primary ">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
