@extends('layouts.auth.main')
@section('title','Dashboard Edit Camps ')
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
                <h6 class="m-0 font-weight-bold text-primary">Edit Camps</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                </div>
                <div class="row">
                    <div class="col-md-4 pt-md-2">
                        @if (!empty($camp->image))
                        <img src="{{ asset('/storage/camps/'.$camp->image) }}"
                            class="img-profile rounded-circle mx-auto d-block" srcset="" width="290px" height="190px"
                            title="profile">
                        @else
                        <img src="{{ asset('assets/images/banner.png') }}" class="img-profile  mx-auto d-block"
                            srcset="" width="320px" height="250px">
                        @endif
                    </div>
                    <div class="col-md-8 ">
                        <form class="user" method="POST" action="{{ route('camps.update',$camp->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            {{-- Title --}}
                            <div class=" form-group">
                                <label for="Title" class="form-label ml-2">Title Camps</label>
                                <input type="text"
                                    class="form-control form-control-user @error('title') is-invalid @enderror"
                                    name="title" required autocomplete="Title" id="Title" aria-describedby="Title"
                                    placeholder="Create Your Title Camps" value="{{ $camp->title ?: old('title') }}">
                                @error('title')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Price --}}
                            <div class=" form-group">
                                <label for="Price" class="form-label ml-2">Price Camps</label>
                                <input type="text"
                                    class="form-control form-control-user @error('price') is-invalid @enderror"
                                    name="price" required autocomplete="Price" id="Price" aria-describedby="Price"
                                    placeholder="Create Your Price Camps" value="{{ $camp->price ?: old('price') }}">
                                @error('price')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Level --}}
                            <div class=" form-group">
                                <label for="Level" class="form-label ml-2">Level Camps</label>
                                <select name="level" class="form-control @error('level') is-invalid @enderror"
                                    id="level">
                                    <option value="Basic" {{ old('level'), $camp->level =='Basic' ? 'selected' : ''
                                        }}>Basic
                                    </option>
                                    <option value="Proficient" {{ old('level'), $camp->level =='Proficient' ? 'selected'
                                        : '' }}>
                                        Proficient
                                    </option>
                                    <option value="Expert" {{ old('level') , $camp->level =='Expert' ? 'selected' : ''
                                        }}>Expert
                                    </option>
                                </select>
                                @error('level')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Desc --}}
                            <div class=" form-group">
                                <label for="Description" class="form-label ml-2">Description Camps</label>
                                <textarea type="text" class="form-control  @error('desc') is-invalid @enderror"
                                    name="desc" required autocomplete="Description" id="Description" cols="0" rows="5"
                                    aria-describedby="Description"
                                    placeholder="Edit Your Description Camps">{{ $camp->desc ?: old('desc') }}</textarea>
                                @error('desc')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Photos --}}
                            <div class="form-group">
                                <label for="" class="form-label ml-2">Upload Photos</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-text mt-2 ml-2">Format file png,jpg,jepg</div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Submit
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('camps.index') }}" type="button"
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