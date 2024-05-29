<a href="{{route('user.course.lesson',$course->slug)}}">
    <div class="relative">
        @if($course->image)
            <img class="w-1/1 rounded-8" src="{{$course->course_src_image}}" alt="image" style="width: 325px;">
        @else
            <img class="w-1/1 rounded-8" src="{{asset('assets/educrat/img/coursesCards/1.png')}}" alt="image">
        @endif
        <!-- <button class="absolute-button" data-el-toggle=".js-more-1-toggle">
                                  <span class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                    <i class="icon-menu-vertical"></i>
                                  </span>
        </button>

        <div class="toggle-element -dshb-more js-more-1-toggle">
            <div class="px-25 py-25 bg-white -dark-bg-dark-2 shadow-1 border-light rounded-8">
                <a href="#" class="d-flex items-center">
                    <div class="icon-share"></div>
                    <div class="text-17 lh-1 fw-500 ml-12">Share</div>
                </a>

                <a href="#" class="d-flex items-center mt-20">
                    <div class="icon-bookmark"></div>
                    <div class="text-17 lh-1 fw-500 ml-12">Favorite</div>
                </a>
            </div>
        </div> -->
    </div>

    <div class="pt-15">
        <div class="d-flex y-gap-10 justify-between items-center">
            <div class="text-14 lh-1">{{$course->name}}</div>

            <div class="d-flex items-center">
                <div class="text-14 lh-1 {{$course->avgRating()>=1?'text-yellow-1':''}} mr-10">{{$course->avgRating()}}</div>
                <div class="d-flex x-gap-5 items-center">
                    <div class="icon-star text-11 {{floor($course->avgRating())>=1?'text-yellow-1':'text-dark-7'}}"></div>
                    <div class="icon-star text-11 {{floor($course->avgRating())>=2?'text-yellow-1':'text-dark-7'}}"></div>
                    <div class="icon-star text-11 {{floor($course->avgRating())>=3?'text-yellow-1':'text-dark-7'}}"></div>
                    <div class="icon-star text-11 {{floor($course->avgRating())>=4?'text-yellow-1':'text-dark-7'}}"></div>
                    <div class="icon-star text-11 {{floor($course->avgRating())>=5?'text-yellow-1':'text-dark-7'}}"></div>
                </div>
            </div>
        </div>

        <h3 class="text-16 fw-500 lh-15 mt-10">{{$course->title}}</h3>
        <span class="d-flex" style="text-overflow: ellipsis; max-height: 300px">
            @if(strlen($course->description)<=200)

            @else
                {{substr($course->description,0,200)}} ...
            @endif
        </span>
    </div>
</a>
