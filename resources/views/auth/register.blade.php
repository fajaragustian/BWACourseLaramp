<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">

    <title>Skill Sphere</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Custom fonts for this template-->

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @vite(["resources/template/auth/css/sb-admin-2.min.css",
    "resources/template/auth/vendor/fontawesome-free/css/all.min.css",])

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('/assets/images/banner.png') }}" alt="Course Laracamp"
                                title="Course Laracamp" width="500px" height="400px"
                                style="margin: 25px 20px 12px 20px">
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class=" form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                            id="name" placeholder="Full Name">
                                        @error('name' )
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>=
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        id="email" placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" id="password"
                                            placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password-confirm" placeholder="Repeat Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            @endif
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Js --}}
    @vite(["resources/template/auth/vendor/jquery/jquery.min.js",
    "resources/template/auth/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "resources/template/auth/vendor/jquery-easing/jquery.easing.min.js",
    "resources/template/auth/js/sb-admin-2.min.js",])

</body>

</html>