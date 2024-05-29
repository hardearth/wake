{{--Used on the index page (so shows a small summary--}}
{{--See the guide on binshops.com for how to copy these files to your /resources/views/ directory--}}
<div data-anim-child="slide-up delay-3" class="col-lg-4 col-md-6">
    <a href="{{$post->url($locale, $routeWithoutLocale)}}" class="blogCard -type-1">
        <div class="blogCard__image">
            <?=$post->image_tag("medium", true, 'blogCard -type-1 rounded-8'); ?>
        </div>
        <div class="blogCard__content mt-20">
        <div class="blogCard__category">CATEGORÍA</div>
        <h4 class="blogCard__title text-18 lh-15 fw-500 mt-5">{{$post->title}}</h4>
        <div class="blogCard__date mt-5">{{date('d M Y ', strtotime($post->post->posted_at))}}</div>
        <!-- <div class="blogCard__date mt-5">Autor: {{$post->post->author->name}}</div> -->
        </div>
    </a>
</div>

