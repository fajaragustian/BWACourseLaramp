<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password </title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <a href="{{ route('welcome') }}">
                                    <img src="{{ asset('/assets/images/banner.png') }}" alt="Course Laracamp"
                                        title="Course Laracamp" width="500px" height="400px"
                                        style="margin: 25px 20px 12px 20px">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @include('components.flash-message')
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    @vite(["resources/template/auth/vendor/jquery/jquery.min.js",
    "resources/template/auth/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "resources/template/auth/vendor/jquery-easing/jquery.easing.min.js",
    "resources/template/auth/js/sb-admin-2.min.js",])

</body>

</html>