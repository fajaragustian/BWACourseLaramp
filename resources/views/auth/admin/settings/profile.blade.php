@extends('layouts.auth.main')
@section('title','Dashboard Change Profile')
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
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Profile</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    {{-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="..."> --}}
                    @include('components.flash-message')
                </div>
                <div class="row">
                    <div class="col-md-4 pt-md-2">
                        @if ($user->avatar)
                        <img src=" https://ui-avatars.com/api/?name={{ Auth::user()->name }}/?rounded=true"
                            class="img-profile rounded-circle mx-auto d-block" srcset="" width="190px" height="190px">
                        @else
                        <img class="img-thumbnail rounded mx-auto d-block"
                            src="{{ asset('template/auth/img/undraw_profile.svg') }}">
                        @endif

                    </div>
                    <div class="col-md-8">
                        <form class="user" method="POST" action="{{ route('admin-update-profile',$user->id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class=" form-group">
                                <label for="Name" class="form-label ml-2">Full Name</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="Name" id="Name" aria-describedby="Name"
                                    value="{{ $user->name ?? old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Email" class="form-label ml-2">Email</label>
                                <input type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="Email" id="Email" aria-describedby="Email"
                                    value="{{ $user->email ?? old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Username" class="form-label ml-2">Username</label>
                                <input type="text"
                                    class="form-control form-control-user @error('username') is-invalid @enderror"
                                    name="username" required autocomplete="Username" id="Username"
                                    aria-describedby="Username" value="{{ $user->username ?? old('username') }}"
                                    placeholder="Enter Your Username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Working" class="form-label ml-2">Working</label>
                                <input type="text"
                                    class="form-control form-control-user @error('working') is-invalid @enderror"
                                    name="working" required autocomplete="Working" id="Working"
                                    aria-describedby="Working" value="{{ $user->working ?? old('working') }}"
                                    placeholder="Enter Your Working">
                                @error('working')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="University" class="form-label ml-2">University</label>
                                <input type="text"
                                    class="form-control form-control-user @error('university') is-invalid @enderror"
                                    name="university" required autocomplete="University" id="University"
                                    aria-describedby="university" value="{{ $user->university ?? old('university') }}"
                                    placeholder="Enter Your University">
                                @error('university')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Phone" class="form-label ml-2">Phone</label>
                                <input type="number"
                                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                                    name="phone" required autocomplete="Phone" id="Phone" aria-describedby="phone"
                                    value="{{ $user->phone ?? old('phone') }}" placeholder="Enter Your Phone"
                                    maxlength="15">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Country" class="form-label ml-2">Country</label>
                                <input type="text"
                                    class="form-control form-control-user @error('country') is-invalid @enderror"
                                    name="country" required autocomplete="Country" id="Country"
                                    aria-describedby="country" value="{{ $user->country ?? old('country') }}"
                                    placeholder="Enter Your Country">
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Region" class="form-label ml-2">Region</label>
                                <input type="text"
                                    class="form-control form-control-user @error('region') is-invalid @enderror"
                                    name="region" required autocomplete="Region" id="Region" aria-describedby="region"
                                    value="{{ $user->country ?? old('region') }}" placeholder="Enter Your Region">
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label ml-2">Upload Photos</label>
                                <input id="avatar" type="file"
                                    class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-text mt-2 ml-2">Format file png,jpg,jepg</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection