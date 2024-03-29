@extends('layouts.frontend.main')
@section('title','Checkout')
@section('content')
<section class="checkout">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    YOUR FUTURE CAREER
                </p>
                <h2 class="primary-header">
                    Start Invest Today
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="item-bootcamp">
                            <img src="{{ asset('/assets/images/item_bootcamp.png') }}" alt="" class="cover">
                            <h1 class="package">
                                {{ $camp->title }}
                            </h1>
                            <p class="description">
                                {{ $camp->desc }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-6 col-12">
                        @include('components.flash-message')
                        <form action="{{ route('checkout.store', $camp->id) }}" class="basic-form" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Full Name</label>
                                <input name="name" type="text" {{--
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : ''  }}" --}}
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ Auth::user()->name ?: old('name') }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email Address</label>
                                <input name="email" type="email" readonly
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ Auth::user()->email ?: old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-4">
                                <label class="form-label">Working</label>
                                <input name="working" type="text"
                                    class="form-control @error('working') is-invalid @enderror"
                                    value="{{old('working') ?: Auth::user()->working }}" required>
                                @error('working')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-4">
                                <label class="form-label">Discount Code</label>
                                <input name="discount" type="text"
                                    class="form-control @error('discount') is-invalid @enderror"
                                    value="{{old('discount') ?: Auth::user()->discount }}">
                                @error('discount')
                                <span class=" invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-4">
                                <label class="form-label">Phone</label>
                                <input name="phone" type="number"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{old('phone') ?: Auth::user()->phone }}" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" mb-4">
                                <label class="form-label">Address</label>
                                <textarea name="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" required>{{old('address') ?: Auth::user()->address }}
                                </textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger ml-5 mt-2">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <button type="submit" class="w-100 btn btn-primary">Paynow</button>
                            <p class="text-center subheader mt-4">
                                <img src="{{ asset('/assets/images/ic_secure.svg') }}" alt=""> Your payment is secure
                                and encrypted.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection