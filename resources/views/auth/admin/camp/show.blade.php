@extends('layouts.auth.main')
@section('title','Dashboard Show Product ')
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
                <h6 class="m-0 font-weight-bold text-primary">Show Product</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    {{-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="..."> --}}
                    @include('components.flash-message')
                </div>
                <div class="row">
                    <div class="col-md-4 pt-md-2">

                    </div>
                    <div class="col-md-12">
                        <form class="user">
                            {{-- Name --}}
                            <div class=" form-group">
                                <label for="Name" class="form-label ml-2">Name Product</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="Name" id="Name" aria-describedby="Name"
                                    placeholder="Create Your FullName" value="{{ $product->name ?? old('name') }}"
                                    readonly>
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
                                    value="{!!  $product->description ?? old('description') !!}" readonly>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('products.edit', $product->id) }}" type="button"
                                        class="btn btn-success btn-user btn-block">
                                        Edit
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('products.index') }}" type="button"
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