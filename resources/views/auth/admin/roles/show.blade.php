@extends('layouts.auth.main')
@section('title','Dashboard Manage Roles')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Roles</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            Add New Role
                        </div>
                    </div>
                </div>
                @include('components.flash-message')
                <div class="row mt-2">
                    <div class="col-md-12 pt-md-12">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $role->name }}" readonly>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="permission"
                                    class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                <div class="col-lg-6">
                                    <div class="col-md-6" style="line-height: 35px;">
                                        @if ($role->name=='Super Admin')
                                        <span class="text-light badge bg-primary">All</span>
                                        @else
                                        @forelse ($rolePermissions as $permission)
                                        <span class="text-light badge bg-primary">{{ $permission->name }}</span>
                                        @empty
                                        @endforelse
                                        @endiF
                                        @if ($errors->has('permission'))
                                        <span class="text-warning">{{ $errors->first('permission')
                                            }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <div class="my-3  d-flex justify-content-center">
                                        <a href="{{ route('roles.edit', $role->id) }}" type="button"
                                            class="col-md-4 my-4  mx-3 btn btn-success">Edit</a>
                                        <a class="col-md-4 my-4 mx-3 btn btn-primary" href="{{ route('roles.index') }}">
                                            Back</a>
                                    </div>
                                </div>
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection