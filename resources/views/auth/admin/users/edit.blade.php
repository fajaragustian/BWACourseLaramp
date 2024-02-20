@extends('layouts.auth.main')
@section('title','Dashboard Edit Users ')
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
                <h6 class="m-0 font-weight-bold text-primary">Edit Account Users</h6>
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
                        <form class="user" action="{{ route('users.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            {{-- Name --}}
                            <div class=" form-group">
                                <label for="Name" class="form-label ml-2">Full Name</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="Name" id="Name" aria-describedby="Name"
                                    placeholder="Create Your FullName" value="{{ $user->name ?? old('name') }}">
                                @error('name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Email --}}
                            <div class=" form-group">
                                <label for="Email" class="form-label ml-2">Email</label>
                                <input type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="Email" id="Email" aria-describedby="Email"
                                    placeholder="Create your Email " value="{{ $user->email ?? old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Username --}}
                            <div class=" form-group">
                                <label for="Username" class="form-label ml-2">Username</label>
                                <input type="text"
                                    class="form-control form-control-user @error('username') is-invalid @enderror"
                                    name="username" required autocomplete="Username" id="Username"
                                    aria-describedby="Username" placeholder="Enter Your Username"
                                    value="{{ $user->username ??  old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Working --}}
                            <div class=" form-group">
                                <label for="Working" class="form-label ml-2">Working</label>
                                <input type="text"
                                    class="form-control form-control-user @error('working') is-invalid @enderror"
                                    name="working" required autocomplete="Working" id="Working"
                                    aria-describedby="Working" placeholder="Enter Your Working"
                                    value="{{ $user->working ?? old('working') }}">
                                @error('working')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- University --}}
                            <div class=" form-group">
                                <label for="University" class="form-label ml-2">University</label>
                                <input type="text"
                                    class="form-control form-control-user @error('university') is-invalid @enderror"
                                    name="university" required autocomplete="University" id="University"
                                    aria-describedby="university" placeholder="Enter Your University"
                                    value="{{  $user->university  ?? old('university') }}">
                                @error('university')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Phone --}}
                            <div class=" form-group">
                                <label for="Phone" class="form-label ml-2">Phone</label>
                                <input type="number"
                                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                                    name="phone" required autocomplete="Phone" id="Phone" aria-describedby="phone"
                                    placeholder="Enter Your Number Phone" maxlength="15"
                                    value="{{ $user->phone ?? old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Country --}}
                            <div class=" form-group">
                                <label for="Country" class="form-label ml-2">Country</label>
                                <input type="text"
                                    class="form-control form-control-user @error('country') is-invalid @enderror"
                                    name="country" required autocomplete="Country" id="Country"
                                    aria-describedby="country" placeholder="Enter Your Country"
                                    value="{{ $user->country ?? old('country') }}">
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Region --}}
                            <div class=" form-group">
                                <label for="region" class="form-label ml-2">Region</label>
                                <input type="text"
                                    class="form-control form-control-user @error('region') is-invalid @enderror"
                                    name="region" required autocomplete="Region" id="Region" aria-describedby="Region"
                                    placeholder="Enter Your password" value="{{  $user->region ?? old('region') }}">
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class=" form-group">
                                <label for="Password" class="form-label ml-2">Password</label>
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="password" autocomplete="Password" id="Password" aria-describedby="password"
                                    placeholder="Enter Your Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Confirm Password --}}
                            <div class=" form-group">
                                <label for="confirm-password" class="form-label ml-2">Confirm Password</label>
                                <input type="password"
                                    class="form-control form-control-user @error('confirm-password') is-invalid @enderror"
                                    name="confirm-password" autocomplete="confirm-password" id="confirm-password"
                                    aria-describedby="confirm-password" placeholder="Enter Your Confirm Password">
                                @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Photos --}}
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

                            {{-- Roles --}}
                            <div class=" form-group">
                                <label for="roles[]" class="form-label ml-2">Select Role</label>
                                <select class="form-control multiple" multiple name="roles[]" size="3">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('roles[]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Submit
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('users.index') }}" type="button"
                                        class="btn btn-primary btn-user btn-block">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection