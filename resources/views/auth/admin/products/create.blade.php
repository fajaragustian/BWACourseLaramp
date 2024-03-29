@extends('layouts.auth.main')
@section('title','Dashboard New Product ')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                </div>
                <div class="row">
                    <div class="col-md-4 pt-md-2">

                    </div>
                    <div class="col-md-12">
                        <form class="user" method="POST" action="{{ route('products.store') }}">
                            @csrf
                            {{-- Name --}}
                            <div class=" form-group">
                                <label for="Name" class="form-label ml-2">Name Product</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="Name" id="Name" aria-describedby="Name"
                                    placeholder="Create Your FullName" value="{{ old('name') }}">
                                @error('name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Email --}}
                            <div class=" form-group">
                                <label for="Description" class="form-label ml-2">Description</label>
                                <input type="text"
                                    class="form-control form-control-user @error('description') is-invalid @enderror"
                                    name="description" required autocomplete="Description" id="Email"
                                    aria-describedby="Description" placeholder="Create your Description Products "
                                    value="{{ old('description') }}">
                                @error('description')
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
