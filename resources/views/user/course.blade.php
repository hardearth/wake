<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.partials.educrat.styles')
    <title>{{env('app_name')}}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
<!-- preloader start -->
<div class="preloader js-preloader">
    <div class="preloader__bg"></div>
</div>
<!-- preloader end -->


<main class="main-content  ">

    <header data-anim="fade" data-add-bg="" class="header -type-1 js-header">


        <div class="header__container">
            <div class="row justify-between items-center">

                <div class="col-auto">
                    <div class="header-left">
                        <div class="header__logo">
                            <a data-barba href="{{route('user.home')}}">
                                <img src="/assets/educrat/img/general/logo.svg" alt="logo">
                            </a>
                        </div>

                        <div class="header__explore text-green-1 ml-60 xl:ml-30 lg:d-none">
                            <a href="#" class="d-flex items-center">
                                <i class="icon icon-explore mr-15"></i>
                                Explore
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-auto lg:d-none">
                    <div class="text-20 lh-1 text-white fw-500">{{$course->name}}</div>
                </div>


                <div class="col-auto">
                    <div class="header-right d-flex items-center">
                        <div class="header-right__buttons">
                            <a href="#" class="button -sm -rounded -white text-dark-1">Back to Course</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>


    <div class="content-wrapper  js-content-wrapper">

        <aside class="lesson-sidebar bg-light-3">
            <div class="px-30 sm:px-20">
                <form class="lesson-sidebar-search" action="post">
                    <input type="text" placeholder="Search">
                    <button class="" type="submit">
                        <i class="icon-search text-20"></i>
                    </button>
                </form>

                <div class="accordion -block-2 text-left js-accordion mt-30">
                    @foreach($course->modules as $module)
                        <div class="accordion__item">
                            <div class="accordion__button py-20 px-30 bg-light-4">
                                <div class="d-flex items-center">
                                    <div class="accordion__icon">
                                        <div class="icon" data-feather="chevron-down"></div>
                                        <div class="icon" data-feather="chevron-up"></div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">{{$module->name}}</span>
                                </div>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner px-30 py-30">
                                    <div class="y-gap-30">
                                        @foreach($module->lessons as $lesson)
                                            <div class="">
                                                <div class="d-flex">
                                                    <div
                                                        class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                                        <div class="icon-play text-9"></div>
                                                    </div>

                                                    <div class="">
                                                        <div>{{__($lesson->name)}}</div>
                                                        <div class="d-flex x-gap-20 items-center pt-5">
                                                            <a href="#"
                                                               class="text-14 lh-1 text-purple-1 underline">{{__('Ver')}}</a>
                                                            <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>

        <section class="layout-pt-lg layout-pb-lg lg:pt-40">
            <div class="container">
                <div class="row justify-end">
                    <div class="col-xxl-8 col-xl-7 col-lg-8">
                        @if($course->video)
                            <div class="relative pt-40">
                                <div style="padding:56.25% 0 0 0;position:relative;">
                                    <iframe
                                        src="{{$course->video}}?h=22a613731e&title=0&byline=0&portrait=0"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                        frameborder="0"
                                        allow="autoplay; fullscreen; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <script src="https://player.vimeo.com/api/player.js"></script>
                            </div>
                        @endif
                        <div class="mt-60 lg:mt-40">
                            <h4 class="text-18 fw-500">{{__('Descripción')}}</h4>
                            <p class="mt-30">
                                {{$course->description}}
                            </p>
                            <div class="mt-60">
                                <h4 class="text-20 mb-30">What you'll learn</h4>
                                <div class="row x-gap-100 justfiy-between">
                                    <div class="col-md-6">
                                        <div class="y-gap-20">

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Become a UX designer.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>You will be able to add UX designer to your CV</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Become a UI designer.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Build &amp; test a full website design.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Create your first UX brief &amp; persona.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>How to use premade UI kits.</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="y-gap-20">

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Create quick wireframes.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Downloadable exercise files</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Build a UX project from beginning to end.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>Learn to design websites &amp; mobile phone apps.</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>All the techniques used by UX professionals</p>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div
                                                    class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                                    <i class="icon-check text-6"></i>
                                                </div>
                                                <p>You will be able to talk correctly with other UX design.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-60">
                                <h4 class="text-20">Requirements</h4>
                                <ul class="ul-list y-gap-15 pt-30">
                                    <li>You will need a copy of Adobe XD 2019 or above. A free trial can be downloaded
                                        from Adobe.
                                    </li>
                                    <li>No previous design experience is needed.</li>
                                    <li>No previous Adobe XD skills are needed.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-60 lg:mt-40">
                            <div class="blogPost -comments">
                                <div class="blogPost__content">
                                    <h2 class="text-20 fw-500">
                                        Reviews
                                    </h2>

                                    <ul class="comments__list mt-30">
                                        <li class="comments__item">
                                            <div class="comments__item-inner md:direction-column">
                                                <div class="comments__img mr-20">
                                                    <div class="bg-image rounded-full js-lazy"
                                                         data-bg="/assets/educrat/img/avatars/1.png"></div>
                                                </div>

                                                <div class="comments__body md:mt-15">
                                                    <div class="comments__header">
                                                        <h4 class="text-17 fw-500 lh-15">
                                                            Ali Tufan
                                                            <span class="text-13 text-light-1 fw-400">3 Days ago</span>
                                                        </h4>

                                                        <div class="stars"></div>
                                                    </div>

                                                    <h5 class="text-15 fw-500 mt-15">The best LMS Design</h5>
                                                    <div class="comments__text mt-10">
                                                        <p>This course is a very applicable. Professor Ng explains
                                                            precisely each algorithm and even tries to give an intuition
                                                            for mathematical and statistic concepts behind each
                                                            algorithm. Thank you very much.</p>
                                                    </div>

                                                    <div class="comments__helpful mt-20">
                                                        <span
                                                            class="text-13 text-purple-1">Was this review helpful?</span>
                                                        <button class="button text-13 -sm -purple-1 text-white">Yes
                                                        </button>
                                                        <button class="button text-13 -sm -light-7 text-purple-1">No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="comments__item">
                                            <div class="comments__item-inner md:direction-column">
                                                <div class="comments__img mr-20">
                                                    <div class="bg-image rounded-full js-lazy"
                                                         data-bg="/assets/educrat/img/avatars/1.png"></div>
                                                </div>

                                                <div class="comments__body md:mt-15">
                                                    <div class="comments__header">
                                                        <h4 class="text-17 fw-500 lh-15">
                                                            Ali Tufan
                                                            <span class="text-13 text-light-1 fw-400">3 Days ago</span>
                                                        </h4>

                                                        <div class="stars"></div>
                                                    </div>

                                                    <h5 class="text-15 fw-500 mt-15">The best LMS Design</h5>
                                                    <div class="comments__text mt-10">
                                                        <p>This course is a very applicable. Professor Ng explains
                                                            precisely each algorithm and even tries to give an intuition
                                                            for mathematical and statistic concepts behind each
                                                            algorithm. Thank you very much.</p>
                                                    </div>

                                                    <div class="comments__helpful mt-20">
                                                        <span
                                                            class="text-13 text-purple-1">Was this review helpful?</span>
                                                        <button class="button text-13 -sm -purple-1 text-white">Yes
                                                        </button>
                                                        <button class="button text-13 -sm -light-7 text-purple-1">No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="respondForm pt-30">
                                <h3 class="text-20 fw-500">
                                    Write a Review
                                </h3>

                                <div class="mt-30">
                                    <h4 class="text-16 fw-500">What is it like to Course?</h4>
                                    <div class="d-flex x-gap-10 pt-10">
                                        <div class="icon-star text-14 text-yellow-1"></div>
                                        <div class="icon-star text-14 text-yellow-1"></div>
                                        <div class="icon-star text-14 text-yellow-1"></div>
                                        <div class="icon-star text-14 text-yellow-1"></div>
                                        <div class="icon-star text-14 text-yellow-1"></div>
                                    </div>
                                </div>

                                <form class="contact-form respondForm__form row y-gap-30 pt-30" action="#">
                                    <div class="col-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Title</label>
                                        <input type="text" name="title" placeholder="Great Courses">
                                    </div>
                                    <div class="col-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Content</label>
                                        <textarea name="comment" placeholder="Message" rows="8"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit"
                                                class="button -md -purple-1 text-white">
                                            Submit Review
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</main>
@include('layouts.partials.educrat.scripts')
</body>

</html>
