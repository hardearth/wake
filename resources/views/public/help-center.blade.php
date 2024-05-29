@extends('layouts.educrat')
@section('content')
    <div class="content-wrapper  js-content-wrapper">


        <section data-anim="fade" class="breadcrumbs is-in-view">
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
        </section>


        <section class="page-header -type-1">
            <div class="container">
                <div class="page-header__content">
                    <div class="row justify-center text-center">
                        <div class="col-auto">
                            <div data-anim="slide-up delay-1" class="is-in-view">

                                <h1 class="page-header__title">How can we help you?</h1>

                            </div>

                            <div data-anim="slide-up delay-2" class="is-in-view">

                                <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at
                                    a reasonable price.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="layout-pb-lg">
            <div data-anim-wrap="" class="container animated">
                <div class="row justify-center text-center">
                    <div class="col-xl-6 col-lg-8">
                        <form class="form-single-field -help" action="post">
                            <input type="text" placeholder="Enter a question, topic or keyword">
                            <button class="button -purple-1 text-white" type="submit">
                                <i class="icon-search text-20 mr-15"></i>
                                Search
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row y-gap-30 justify-between pt-90 lg:pt-50">

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/1.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Getting Started</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/2.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Account / Profile</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/3.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Troubleshooting</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/4.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Purchase / Refunds</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/5.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Course Taking</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="py-40 px-45 rounded-16 bg-light-4">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="img/help-center/6.svg" alt="icon">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">Mobile General</h4>
                            <p class="mt-10">Lorem ipsum is placeholder text commonly used in site.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="layout-pt-lg layout-pb-lg bg-light-4">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">

                        <div class="sectionTitle ">

                            <h2 class="sectionTitle__title ">Frequently Asked Questions.</h2>

                            <p class="sectionTitle__text ">Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco</p>

                        </div>


                        <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">

                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus icon">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-minus icon">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">Do you offer discounts for students?</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus icon">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-minus icon">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span
                                        class="text-17 fw-500 text-dark-1">Do you offer special pricing for big teams?</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus icon">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-minus icon">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">What is the past experience of your teachers?</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus icon">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-minus icon">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">What is the course refund policy?</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus icon">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-minus icon">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span
                                        class="text-17 fw-500 text-dark-1">Do you offer discounts for non-profits?</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
