@extends('layouts.educrat')
@section ('banner')
    <section class="banner-header-courses masthead -type-1 bg-header-courses js-mouse-move-container">
        <div class="masthead__bg">
        </div>
        <div class="container">
          <div data-anim-wrap class="row y-gap-50 justify-between items-end">
            <div class="col-xl-6 col-lg-6 col-sm-10 order-2 order-sm-1">
              <div class="masthead__content text-center">
                <h1 data-anim-child="slide-up" class="masthead__title">
                    {{__('Sin texto')}}
                </h1>
                <!-- <div class="mt-40" data-anim-child="slide-up">
                    <ul class="count-offert section-launch text-white ">
                        <li>30</li>
                        <li>14</li>
                        <li>50</li>
                        <li>10</li>
                    </ul>
                </div> -->
                <p data-anim-child="slide-up delay-1" class="masthead__text text-24 mt-40">
                      {{__('Sin texto, Sin texto  Sin texto  Sin texto Sin texto  ')}}
                </p>
                <div data-anim-child="slide-up delay-2" class="masthead__buttons row x-gap-10 y-gap-10">

                </div>
              </div>
            </div>
            <div data-anim-child="slide-up delay-5 " class="col-lg-6 order-1 order-sm-2">
             </div>
            </div>
          </div>
        </div>
      </section>
@endsection
@section('content')
    <!-- <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="#">Home</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="#">All courses</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="#">User Experience Design</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="#">User Interface</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">About Us</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at a reasonable price.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between items-center">
                <div class="col-lg-6 pr-50 sm:pr-15">
                    <div class="composition -type-8">
                        <div class="-el-1"><img src="{{asset('assets/educrat/img/about-1/1.png')}}" alt="image"></div>
                        <div class="-el-2"><img src="{{asset('assets/educrat/img/about-1/2.png')}}" alt="image"></div>
                        <div class="-el-3"><img src="{{asset('assets/educrat/img/about-1/3.png')}}" alt="image"></div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <h2 class="text-30 lh-16">Welcome to Educrat Enhance your skills with best Online courses</h2>
                    <p class="text-dark-1 mt-30">You can start and finish one of these popular courses in under a day – for free! Check out the list below.. Take the course for free</p>
                    <p class="pr-50 lg:pr-0 mt-25">Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt egetnvallis a cras semper auctonvallis a cras semper aucto. Neque convallis a cras semper auctor. Liberoe convallis a cras semper atincidunt egetnval</p>
                    <div class="d-inline-block">
                        <a href="courses-list-1.html" class="button -md -purple-1 text-white mt-30">Start Learning For Free </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">How it works?</h2>

                        <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 justify-between pt-60 lg:pt-40">

                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{asset('assets/educrat/img/home-3/works/1.svg')}}" alt="image">
                            <div class="side-badge">
                                <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">01</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">Browse courses from our expert contributors.</div>
                    </div>
                </div>


                <div class="col-auto xl:d-none">
                    <div class="pt-30">
                        <img src="{{asset('assets/educrat/img/misc/lines/1.svg')}}" alt="icon">
                    </div>
                </div>


                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{asset('assets/educrat/img/home-3/works/2.svg')}}" alt="image">
                            <div class="side-badge">
                                <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">02</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">Purchase quickly and securely.</div>
                    </div>
                </div>


                <div class="col-auto xl:d-none">
                    <div class="pt-30">
                        <img src="{{asset('assets/educrat/img/misc/lines/2.svg')}}" alt="icon">
                    </div>
                </div>


                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{asset('assets/educrat/img/home-3/works/3.svg')}}" alt="image">
                            <div class="side-badge">
                                <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">03</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">That’s it! Start learning right away.</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="section-bg layout-pt-lg layout-pb-md">
        <div class="section-bg__item -full -height-half bg-dark-5"></div>

        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title text-white">Start your Learning Journey Today!</h2>
                        <p class="sectionTitle__text text-white">Lorem ipsum dolor sit amet, consectetur.</p>
                    </div>
                </div>
            </div>

            <div data-anim-wrap class="row y-gap-30 justify-between pt-60 lg:pt-50">

                <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{asset('assets/educrat/img/home-5/learning/1.svg')}}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Learn with Experts</h5>
                            <p class="coursesCard__text text-14 mt-10">Grursus mal suada faci lisis that ipsum ameti consecte.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-2" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{asset('assets/educrat/img/home-5/learning/2.svg')}}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Learn Anything</h5>
                            <p class="coursesCard__text text-14 mt-10">Grursus mal suada faci lisis that ipsum ameti consecte.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-3" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{asset('assets/educrat/img/home-5/learning/3.svg')}}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Flexible Learning</h5>
                            <p class="coursesCard__text text-14 mt-10">Grursus mal suada faci lisis that ipsum ameti consecte.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-4" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{asset('assets/educrat/img/home-5/learning/4.svg')}}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Industrial Standart</h5>
                            <p class="coursesCard__text text-14 mt-10">Grursus mal suada faci lisis that ipsum ameti consecte.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Testimonials</h2>

                        <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

                    </div>

                </div>
            </div>

            <div class="row justify-center pt-60">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="overflow-hidden js-testimonials-slider">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration to say this Educrat experience was transformative–both professionally and personally. This workshop will long remain a high point of my life.</div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration to say this Educrat experience was transformative–both professionally and personally. This workshop will long remain a high point of my life.</div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration to say this Educrat experience was transformative–both professionally and personally. This workshop will long remain a high point of my life.</div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration to say this Educrat experience was transformative–both professionally and personally. This workshop will long remain a high point of my life.</div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration to say this Educrat experience was transformative–both professionally and personally. This workshop will long remain a high point of my life.</div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="pt-60 lg:pt-40">
                            <div class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">

                                <div class="col-auto">
                                    <div class="pagination__item is-active">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/1.png')}}" alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/2.png')}}" alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/3.png')}}" alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/4.png')}}" alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/5.png')}}" alt="image">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-xl-5 col-lg-6 col-md-9 lg:order-2">
                    <h3 class="text-45 md:text-30 lh-12"><span class="text-purple-1">Learn</span> new skills when<br class="lg:d-none"> and where you like.</h3>
                    <p class="mt-20">Use the list below to bring attention to your product’s key<br class="lg:d-none"> differentiator.</p>
                    <div class="d-inline-block mt-30">
                        <a href="signup.html" class="button -md -dark-1 text-white">Join Free</a>
                    </div>
                </div>

                <div class="col-lg-6 lg:order-1">
                    <div class="composition -type-3">
                        <div class="-el-1">
                            <div class="bg-dark-1 py-50 px-30 rounded-8">
                                <div class="y-gap-20 pt-25">

                                    <div class="d-flex items-center">
                                        <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Hand-picked authors</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Easy to follow curriculum</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Free courses</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Money-back guarantee</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="-el-2">
                            <img class="w-1/1" src="{{asset('assets/educrat/img/home-6/learn/1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <img class="w-1/1" src="{{asset('assets/educrat/img/home-2/about/1.png')}}" alt="image">
                </div>

                <div class="col-xl-4 offset-xl-1 col-lg-6">
                    <h3 class="text-24 lh-1">Become an Instructor</h3>
                    <p class="mt-20">Join millions of people from around the world learning together. Online learning is as easy and natural as chatting.</p>
                    <div class="d-inline-block mt-20">
                        <a href="instructors-become.html" class="button -md -outline-purple-1 text-purple-1">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-4 offset-xl-1 order-lg-1 col-lg-6 order-2">
                    <h3 class="text-24 lh-1">Become a Student</h3>
                    <p class="mt-20">Join millions of people from around the world learning together. Online learning is as easy and natural as chatting.</p>
                    <div class="d-inline-block mt-20">
                        <a href="signup.html" class="button -md -outline-dark-2 text-dark-2">Apply Now</a>
                    </div>
                </div>

                <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1">
                    <img class="w-1/1" src="{{asset('assets/educrat/img/home-2/about/2.png')}}" alt="image">
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center">
                <div class="col text-center">
                    <p class="text-lg text-dark-1">Trusted by the world’s best</p>
                </div>
            </div>

            <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/1.svg')}}" alt="clients image">
                    </div>
                </div>

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/1.svg')}}" alt="clients image">
                    </div>
                </div>

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/2.svg')}}" alt="clients image">
                    </div>
                </div>

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/3.svg')}}" alt="clients image">
                    </div>
                </div>

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/4.svg')}}" alt="clients image">
                    </div>
                </div>

                <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{asset('assets/educrat/img/clients/5.svg')}}" alt="clients image">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
