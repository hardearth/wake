<aside class="lesson-sidebar bg-light-3">
    <div class="px-30 sm:px-20 pb-30 sm:pb-20">
        <!-- <form class="lesson-sidebar-search" action="post">
            <input type="text" placeholder="Search">
            <button class="" type="submit">
                <i class="icon-search text-20"></i>
            </button>
        </form> -->

        <div class="accordion -block-2 text-left js-accordion mt-30">
            @foreach($course->modules as $moduleMenu)
                <div class="accordion__item {{$module && $module->id==$moduleMenu->id?'is-active':''}}">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                        <div class="d-flex items-center">
                            <div class="accordion__icon">
                                <div class="icon" data-feather="chevron-down"></div>
                                <div class="icon" data-feather="chevron-up"></div>
                            </div>
                            <span class="text-17 fw-500 text-dark-1">{{$moduleMenu->name}}</span>
                        </div>
                    </div>
                    <div
                        class="accordion__content" {!! $module && $module->id==$moduleMenu->id?'style="max-height: 328px;"':'' !!}>
                        <div class="accordion__content__inner px-30 py-30">
                            <div class="y-gap-30">
                                @foreach($moduleMenu->lessons as $lessonMenu)
                                    <div class="">
                                        <div class="d-flex">
                                            <div
                                                class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                                <div class="icon-play text-9"></div>
                                            </div>

                                            <div class="">
                                                <div>
                                                    @if($lesson && $lesson->id==$lessonMenu->id)
                                                        <b>{{__($lessonMenu->name)}}</b>
                                                    @else
                                                        {{__($lessonMenu->name)}}
                                                    @endif
                                                </div>
                                                <div class="d-flex x-gap-20 items-center pt-5">
                                                    @if($lesson && $lesson->id==$lessonMenu->id)
                                                        &nbsp;&nbsp;{{$lessonMenu->duration_label}}
                                                    @else
                                                        <a href="{{route('user.course.lesson',[$course->slug,$lessonMenu->id])}}"
                                                           class="text-14 lh-1 text-purple-1 underline">{{__('Ver')}}</a>
                                                        <a href="{{route('user.course.lesson',[$course->slug,$lessonMenu->id])}}"
                                                           class="text-14 lh-1 text-purple-1 underline">{{$lessonMenu->duration_label}}</a>
                                                    @endif

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
            <div class="accordion__item">
                <div class="accordion__button py-20 px-30 bg-light-4">
                    <div class="d-flex items-center">
                        <div class="accordion__icon">
                            <div class="icon" data-feather="chevron-down"></div>
                            <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">{{__('Cierre')}}</span>
                    </div>
                </div>
                <div
                    class="accordion__content">
                    <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-30">

                            <div class="">
                                <div class="d-flex">
                                    <div
                                        class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                        <div class="icon-play text-9"></div>
                                    </div>
                                    <div class="">
                                        <div>
                                            {{__('Valoración')}}
                                        </div>
                                        <div class="d-flex x-gap-20 items-center pt-5">
                                            <a href="{{route('user.course.feedback',$course->slug)}}"
                                               class="text-14 lh-1 text-purple-1 underline">{{__('Ver')}}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
