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
                        @include('components.flash-message')
                        <div class="mb-3">
                            Add New Role
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 pt-md-12">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="permission"
                                    class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                <div class="col-lg-6">
                                    <select class="form-select @error('permission') is-invalid @enderror" multiple
                                        aria-label="Permission" id="permission" name="permission[]" size="6">
                                        @forelse ($permission as $value)
                                        <option value="{{ $value->id }}" {{ in_array($value->id,
                                            old('permission') ?? []) ?
                                            'selected' : '' }}>
                                            {{ $value->name }}
                                        </option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @if ($errors->has('permission'))
                                    <span class="text-danger">{{ $errors->first('permission') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <div class="my-3  d-flex justify-content-center">
                                        <button class="col-md-4 my-4 mx-3 btn  btn-success" type="submit">
                                            Submit</button>
                                        <a href=" {{ route('roles.index') }}"
                                            class=" col-md-4 my-4 mx-3 btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection