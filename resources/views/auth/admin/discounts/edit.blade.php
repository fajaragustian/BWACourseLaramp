@extends('layouts.auth.main')
@section('title','Dashboard Update Discount ')
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
                <h6 class="m-0 font-weight-bold text-primary"> Code Discount Event {{ $discount->name }}</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @include('components.flash-message')
                </div>
                <div class="row">
                    <div class="col-md-4 pt-md-2">

                    </div>
                    <div class="col-md-12">
                        <form class="user" method="POST" action="{{ route('discounts.update', $discount->id ) }}">
                            @csrf
                            @method('PATCH')
                            {{-- Name --}}
                            <div class=" form-group">
                                <label for="Name" class="form-label ml-2">Name Discounts</label>
                                <input type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="Name" id="Name" aria-describedby="Name"
                                    placeholder="Create Your Discounts" value="{{old('name') ?: $discount->name}}">
                                @error('name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Code --}}
                            <div class=" form-group">
                                <label for="Code" class="form-label ml-2">Code Discounts</label>
                                <input type="text"
                                    class="form-control form-control-user @error('code') is-invalid @enderror"
                                    name="code" required autocomplete="Code" id="Code" aria-describedby="Code"
                                    placeholder="Create Your Code Discount" value="{{old('code') ?: $discount->code}}">
                                @error('code')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Percentage --}}
                            <div class=" form-group">
                                <label for="Percentage" class="form-label ml-2">Percentage Discounts</label>
                                <input type="number"
                                    class="form-control form-control-user @error('percentage') is-invalid @enderror"
                                    name="percentage" required autocomplete="Percentage" id="Percentage"
                                    aria-describedby="Percentage" placeholder="Create Your Percentage Discount"
                                    value="{{old('percentage') ?: $discount->percentage}}" max="100" min="1">
                                @error('percentage')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Description --}}
                            <div class=" form-group">
                                <label for="Description" class="form-label ml-2">Description</label>
                                <textarea class="form-control  @error('description') is-invalid @enderror"
                                    name="description" required id="Description" cols="0"
                                    rows="2">{{ old('description') ?: $discount->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Save
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('discounts.index') }}" type="button"
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
