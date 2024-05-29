<div class="mySwiper my-10">
    <div class="swiper-wrapper">
        @foreach($courses as $course)

            <div class="swiper-slide swiper-slide-visible swiper-slide-next" style="width: 296.333px; ;" role="group"
                 aria-label="">
                <div data-anim-child="slide-up delay-1" class="is-in-view">


                        <a href="{{route('public.course',$course->slug)}}"  class="coursesCard -type-1  rounded-8">
                        <div class="relative">
                            <div class="coursesCard__image overflow-hidden rounded-top-8">
                                @if($course->image)
                                    <img class="w-1/1 "
                                         src="{{$course->course_src_image}}"
                                         alt="image">
                                @else
                                    <img class="w-1/1"
                                         src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                         alt="image">
                                @endif
                                <div class="coursesCard__image_overlay rounded-top-8"></div>
                            </div>
                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                            </div>
                        </div>

                    </a>
                    <div class="h-100 pt-15 pb-10" style="background-color: white; padding: 15px; border-radius: 0 0 15px 15px !important;">
                        <a href="{{route('public.course',$course->slug)}}"  class="coursesCard -type-1  rounded-8">
                            <div class="d-flex items-center valoration-courses">
                                <div
                                    class="text-14 lh-1  {{$course->avgRating()>=1?'text-purple-2':''}} mr-10">{{$course->avgRating()}}</div>
                                <div class="d-flex x-gap-5 items-center">
                                    <div
                                        class="icon-star text-11 {{floor($course->avgRating())>=1?'text-purple-2':'text-dark-7'}}"></div>
                                    <div
                                        class="icon-star text-11 {{floor($course->avgRating())>=2?'text-purple-2':'text-dark-7'}}"></div>
                                    <div
                                        class="icon-star text-11 {{floor($course->avgRating())>=3?'text-purple-2':'text-dark-7'}}"></div>
                                    <div
                                        class="icon-star text-11 {{floor($course->avgRating())>=4?'text-purple-2':'text-dark-7'}}"></div>
                                    <div
                                        class="icon-star text-11 {{floor($course->avgRating())>=5?'text-purple-2':'text-dark-7'}}"></div>
                                </div>
                            </div>

                            <div class="text-17 lh-15 fw-500 text-dark-1">
                                {{$course->list_categories->first()?->name}}
                            </div>
                            <div
                                class="text-16 lh-15 fw-700 text-dark-1 mt-5 ">{{$course->name}}</div>

                            <div class="d-flex-new x-gap-10 items-center pt-10">


                                <div class="d-flex-new items-center ">
                                    <div class="mr-8">
                                        <img
                                            src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                            alt="icon">
                                    </div>
                                    <div
                                        class="text-14 lh-1">{{$course->duration_label}}</div>
                                </div>

                                <div class="d-flex-new items-center ">
                                    <div class="mr-8">
                                        <img
                                            src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                            alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">
                                        {{$course->lessons()->count()}} {{__('Lecciones')}}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="coursesCard-footer mt-10">
                            <a data-barba
                               href="{{route('cart.add.item',[$course->slug,'checkout'])}}"
                               class="button -sm -purple-2 text-white text-15">{{__('Comprar USD')}}
                                &nbsp<span> ${{number_format($course->price,2)}}</span></a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
<script>
    var mySwiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        // grabCursor: true,
        centeredSlides: true,
        // freeMode: true,

        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 20,
            stretch: 10,
            depth: 100,
            modifier: 1,
            slideShadows: true,
            scale: 1,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
@section('styles')
    <style>
        .mySwiper {
            margin: 0 auto;
            width: 400px !important;
        }

        div.mySwiper > .swiper-slide {
            background: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }


    </style>
@endsection
