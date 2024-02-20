@extends('layouts.auth.main')
@section('title','Dashboard Show Users ')
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
                <h6 class="m-0 font-weight-bold text-primary">Show Account Users</h6>
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
                        {{-- Name --}}
                        <div class=" form-group">
                            <label for="Name" class="form-label ml-2">Full Name</label>
                            <input type="text" class="form-control form-control-user" name=" name" autocomplete="Name"
                                id="Name" aria-describedby="Name" value="{{ $user->name }}" readonly>
                        </div>
                        {{-- Email --}}
                        <div class=" form-group">
                            <label for="Email" class="form-label ml-2">Email</label>
                            <input type="email" class="form-control form-control-user" name="email" autocomplete="Email"
                                id="Email" aria-describedby="Email" value="{{ $user->email }}" readonly>
                        </div>
                        {{-- Username --}}
                        <div class=" form-group">
                            <label for="Username" class="form-label ml-2">Username</label>
                            <input type="text" class="form-control form-control-user" name="username" required
                                autocomplete="Username" id="Username" aria-describedby="Username"
                                value="{{ $user->name }}" readonly>
                        </div>
                        {{-- Working --}}
                        <div class=" form-group">
                            <label for="Working" class="form-label ml-2">Working</label>
                            <input type="text" class="form-control form-control-user " name="working" required
                                autocomplete="Working" id="Working" aria-describedby="Working"
                                value="{{ $user->working }}" readonly>

                        </div>
                        {{-- University --}}
                        <div class=" form-group">
                            <label for="University" class="form-label ml-2">University</label>
                            <input type="text" class="form-control form-control-user" name="university"
                                autocomplete="University" id="University" aria-describedby="university"
                                value="{{ $user->university }}" readonly>
                        </div>
                        {{-- Phone --}}
                        <div class=" form-group">
                            <label for="Phone" class="form-label ml-2">Phone</label>
                            <input type="number" class="form-control form-control-user" name="phone"
                                autocomplete="Phone" id="Phone" aria-describedby="phone" value="{{ $user->phone}}"
                                readonly>
                        </div>
                        {{-- Country --}}
                        <div class=" form-group">
                            <label for="Country" class="form-label ml-2">Country</label>
                            <input type="text" class="form-control form-control-user" name="country" required
                                autocomplete="Country" id="Country" aria-describedby="country"
                                value="{{ $user->country }}" readonly>
                        </div>
                        {{-- Region --}}
                        <div class=" form-group">
                            <label for="region" class="form-label ml-2">Region</label>
                            <input type="text" class="form-control form-control-user" name="region"
                                autocomplete="Region" id="Region" aria-describedby="Region" value="{{ $user->region }}"
                                readonly>
                        </div>
                        {{-- Roles --}}
                        <div class=" form-group">
                            <label for="roles[]" class="form-label ml-2">Select Role</label>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <input type="text" class="form-control form-control-user" name="roles[]"
                                autocomplete="roles[]" id="roles[]" aria-describedby="roles[]" value="{{ $v }}"
                                readonly>
                            @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('users.edit', $user->id) }}" type="button"
                                    class="btn btn-success btn-user btn-block">
                                    Edit
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('users.index') }}" type="button"
                                    class="btn btn-primary btn-user btn-block">
                                    Back
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection