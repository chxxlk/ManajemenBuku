@extends('layout.view')
@section('title', 'Register')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 me-0">
                            <img src="{{ asset('images/books-8934573_1280.jpg') }}" alt="Login Image"
                                class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-6 ps-0" style="margin-top: auto; margin-bottom: auto;">
                            <div class="card-body">
                                <h3 class="text-center">Register</h3>

                                <form method="POST" action="{{ route('users_register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                            id="fullname" name="fullname" value="{{ old('fullname') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            id="username" name="username" value="{{ old('username') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-check position-absolute" style="right: 10px; top: 35px;">
                                            <label class="form-check-label" for="showPassword">
                                                <i class="fas fa-eye" id="togglePasswordIcon"
                                                    onclick="togglePasswordVisibility()"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            id="confirm_password" name="password_confirmation" required>
                                        @error('confirm_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-check position-absolute" style="right: 10px; top: 35px;">
                                            <label class="form-check-label" for="showConfirmPassword">
                                                <i class="fas fa-eye" id="toggleConfirmPasswordIcon"
                                                    onclick="toggleConfirmPasswordVisibility()"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn mx-auto d-block"
                                        style="background-color: rgb(33, 37, 41); color:white;">Register</button>
                                </form>
                            </div>
                            <p class="text-center" style="margin-top: 0">Already have an account? <a
                                    href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function toggleConfirmPasswordVisibility() {
            const confirmPasswordInput = document.getElementById('confirm_password');
            const toggleIcon = document.getElementById('toggleConfirmPasswordIcon');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
@endsection
