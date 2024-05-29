@extends("layouts.educrat",['title'=>$post->gen_seo_title()])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection

@section("content")

    @if(config("binshopsblog.reading_progress_bar"))
        <div id="scrollbar">
            <div id="scrollbar-bg"></div>
        </div>
    @endif

    <section data-anim-wrap class="mainSlider -type-1 js-mainSlider">


        <div class="container" style="padding: 150px 0 50px 0">
            <div class="row justify-center text-center">
                <div class='class="col-auto'>
                    
                    @include("binshopsblog::partials.show_errors")
                    @include("binshopsblog::partials.full_post_details")


                    @if(config("binshopsblog.comments.type_of_comments_to_show","built_in") !== 'disabled')
                        <div class="" id='maincommentscontainer'>
                            <h2 class='text-center' id='binshopsblogcomments'>Comments</h2>
                            @include("binshopsblog::partials.show_comments")
                        </div>
                    @else
                        {{--Comments are disabled--}}
                    @endif


                </div>
            </div>
        </div>
    </section>
@endsection

@section('blog-custom-js')
    <script src="{{asset('binshops-blog.js')}}"></script>
@endsection
