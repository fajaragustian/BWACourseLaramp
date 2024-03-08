@extends('layouts.frontend.main')
@section('title','Skill Sphere')
@section('content')

<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-12">
                <div class="row">
                    <div class="col-lg-6 col-12 copywriting">
                        <p class="story">
                            LEARN FROM EXPERT
                        </p>
                        <h1 class="header">
                            Start your career <span class="text-purple"> as a professional <br>mobile </span>technician
                        </h1>
                        <p class="support">
                            Launch your career as a skilled mobile technician <br> with our specialized bootcamp.
                            Explore our expert-led courses today!
                        </p>
                        <p class="cta">
                            <a href="#" class="btn btn-master btn-primary-custom">
                                Join Today
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-6 col-12 text-center">
                        <a href="#">
                            <img src="{{ asset('/assets/images/banner.png') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row brands">
            <div class="col-lg-12 col-12 text-center">
                <img src="{{ asset('/assets/images/brands1.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<section class="benefits" id="benefits">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    OUR SUPER BENEFITS
                </p>
                <h2 class="primary-header">
                    Learn Faster & Better
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('/assets/images/ic_globe.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Enhanced Skills
                    </h3>
                    <p class="support">
                        Becoming more proficient in <br> phone repair and maintenance.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('/assets/images/ic_globe-1.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Industry Recognition
                    </h3>
                    <p class="support">
                        Acknowledgment from experts, validating your expertise as a <br> proficient phone technician.

                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('/assets/images/ic_globe-2.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Professional Advice
                    </h3>
                    <p class="support">
                        Receiving guidance and support from experts in understanding <br> and mastering the material.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('/assets/images/ic_globe-3.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Career Opportunities
                    </h3>
                    <p class="support">
                        Opening doors to new job opportunities or positions within <br> the mobile technician industry
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="steps">
    <div class="container">
        <div class="row item-step pb-70">
            <div class="col-lg-6 col-12 text-center">
                <img src="{{ asset('/assets/images/step1.png') }}" class="cover" alt="">
            </div>
            <div class="col-lg-6 col-12 text-left copywriting">
                <p class="story">
                    Advancing Career
                </p>
                <h2 class="primary-header">
                    Kickstart Journey
                </h2>
                <p class="support">
                    Invest in your future success with our career-focused training, designed to equip you with the
                    skills and confidence to
                    thrive in today's competitive job market.
                    Learn from anyone around the <br> world and get a new skills
                </p>
                <p class="mt-5">
                    <a href="#" class="btn btn-master btn-secondary me-3">
                        Learn More
                    </a>
                </p>
            </div>
        </div>
        <div class="row item-step pb-70">
            <div class="col-lg-6 col-12 text-left copywriting pl-150">
                <p class="story">
                    Increase Study Intensity
                </p>
                <h2 class="primary-header">
                    Complete The Project
                </h2>
                <p class="support">
                    To ensure project completion, it's crucial to elevate the intensity of your study sessions and focus
                    on <br> key objectives.
                </p>
                <p class="mt-5">
                    <a href="#" class="btn btn-master btn-secondary me-3">
                        View Demo
                    </a>
                </p>
            </div>
            <div class="col-lg-6 col-12 text-center">
                <img src="{{ asset('/assets/images/step2.png') }}" class="cover" alt="">
            </div>

        </div>
        <div class="row item-step">
            <div class="col-lg-6 col-12 text-center">
                <img src="{{ asset('/assets/images/step3.png') }}" class="cover" alt="">
            </div>
            <div class="col-lg-6 col-12 text-left copywriting">
                <p class="story">
                    Wrap Up The Bootcamp Journey
                </p>
                <h2 class="primary-header">
                    Big Demo Day
                </h2>
                <p class="support">
                    Wrap up your bootcamp experience with a sense of accomplishment, knowing you've grown both
                    personally and <br> professionally.
                </p>
                <p class="mt-5">
                    <a href="#" class="btn btn-master btn-secondary me-3">
                        Take Action
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="pricing mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 ">
                <div class="row ">
                    <div class="col-md-12 copywriting mt-5  mb-5 text-center">
                        <p class="story">
                            Discover Exclusive Deals
                        </p>
                        <h1 class="header text-light">
                            Unlock Incredible <span class="text-custom"> Offers in Our </span> Price List
                        </h1>
                        <p class="support">
                            Explore our enticing price list to discover a variety of attractive offers and competitive
                            prices. Find top-quality products at special prices that will tempt you to shop right away

                        </p>
                        <p class="cta">
                            <a href="#" class="btn btn-master btn-primary-custom">
                                Get Started
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="price mt-5" id="price">
    <div class="container mt-5">
        <div class="row">
            @foreach ($camp as $c)
            <div class="col-md-4 mb-4">
                <div class="card price-card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Basic</h3>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-primary">Rp {{ $c->price }}</h2>
                        <ul class="list-unstyled text-left">
                            <li><i class="fas fa-check-circle text-primary"></i> Basic Features</li>
                            <li><i class="fas fa-check-circle text-primary"></i> Limited Support</li>
                            <li><i class="fas fa-times-circle text-danger"></i> No Extra Services</li>
                        </ul>
                        <a href="{{ route('checkout',$c->slug )  }}" type="button" class="btn btn-primary">Purchase
                            Now</a>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    SUCCESS STUDENTS
                </p>
                <h2 class="primary-header">
                    We Really Love SkillSphere
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="row ">
                    <div class="col-lg-4 col-12 testimoni">
                        <div class="card border-0 item-review">
                            <div class="card-body text-center">
                                <img src="{{ asset('/template/auth/img/undraw_profile_1.svg') }}"
                                    class="img-fluid rounded-circle mb-3" width="168" height="168">
                                <h5 class="name mb-3">Beatrice</h5>
                                <p class="message">"Joining this bootcamp was the best decision I've ever made.
                                    It
                                    provided me with the necessary tools and resources to
                                    succeed in a competitive job market."</p>
                                <small class="text-muted">QA at Facebook</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card border-0 item-review">
                            <div class="card-body text-center">
                                <img src="{{ asset('/template/auth/img/undraw_profile_2.svg') }}" alt="Testimonial"
                                    class="img-fluid rounded-circle mb-3" width="168" height="168">
                                <h5 class="name mb-3">Dinar</h5>
                                <p class="message">"The bootcamp exceeded my expectations. I was able to network with
                                    industry professionals
                                    and secure job opportunities
                                    even before completing the program."</p>
                                <small class="text-muted">Mobile Technicion</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card border-0 item-review">
                            <div class="card-body text-center">
                                <img src="{{ asset('/template/auth/img/undraw_profile_3.svg') }}"
                                    class="img-fluid rounded-circle mb-3" width="168" height="168">
                                <h5 class="name mb-3">Leo</h5>
                                <p class="message">"Life-changing experience! The bootcamp equipped me with the skills
                                    and confidence to pursue my dream career."</p>
                                <small class="text-muted">Mobile Developer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-lg-12 col-12">
                        <p>
                            All Rights Reserved. Copyright SkillSphere.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection