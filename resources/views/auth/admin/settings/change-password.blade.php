@extends('layouts.auth.main')
@section('title','Dashboard Change Password')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    {{-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="..."> --}}
                    @include('components.flash-message')
                </div>
                <form class="user" method="POST" action="{{ route('admin-update-password') }}">
                    @csrf
                    <div class=" form-group">
                        <label for="oldPasswordInput" class="form-label ml-2">Old Password</label>
                        <input type="password"
                            class="form-control form-control-user @error('old_password') is-invalid @enderror"
                            name="old_password" required autocomplete="old_password" id="oldPasswordInput"
                            aria-describedby="old_password" placeholder="Enter Your Old Password">
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="newPasswordInput" class="form-label ml-2">New Password</label>
                        <input type="password"
                            class="form-control form-control-user @error('new_password') is-invalid @enderror"
                            name="new_password" required autocomplete="new_password" autofocus id="newPasswordInput"
                            aria-describedby="new_password" placeholder="Enter Your New Password">
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPasswordInput" class="form-label ml-2">Confirm New Password</label>
                        <input name="new_password_confirmation" type="password" class="form-control form-control-user"
                            id="confirmNewPasswordInput" placeholder="Enter Your Confirm New Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Submit
                    </button>
                </form>
                {{-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                    unDraw &rarr;</a> --}}
            </div>
        </div>


    </div>
</div>
@endsection