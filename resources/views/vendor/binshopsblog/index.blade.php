@extends("layouts.educrat",['title'=>$title])
@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection
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

@section("content")

    <!-- <div class='col-sm-12 binshopsblog_container'>
        @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
        <div class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                    <div class="text-success-2 lh-1 fw-500">Estas logueado como administrador del blog.</div>   <a href='{{route("binshopsblog.admin.index")}}'
                       class='btn border  btn-outline-primary btn-sm '>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        Ir al panel de administración</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-success-2 size-20"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
        @endif -->
        <section class="page-header -type-1">
        <div class="container">
          <div class="page-header__content">
            <div class="row justify-center text-center">
              <div class="col-auto">
                <div data-anim="slide-up delay-1">

                  <h1 class="page-header__title">Noticias</h1>

                </div>

                <div data-anim="slide-up delay-2">

                  <p class="page-header__text">Enterate de lo nuevo con nuestro blog de noticias.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
          <div class="row">
            <div class="col-lg-9">
              <div class="row y-gap-30">
                    @forelse($posts as $post)
                         @include("binshopsblog::partials.index_loop")
                    @empty
                        <div class="col-md-12">
                            <div class='alert alert-danger'>No hay ningun Articulo actualmente!</div>
                        </div>
                    @endforelse

              </div>


            </div>

            <div class="col-lg-3">

              <div data-anim="slide-up delay-3" class="sidebar -blog">
                <div class="sidebar__item">
                  <h5 class="sidebar__title">Categorías</h5>
br
                  <div class="sidebar-content -list">
                        <ul class="binshops-cat-hierarchy">
                            @if($categories)
                                @include("binshopsblog::partials._category_partial", [
                                'category_tree' => $categories,
                                'name_chain' => $nameChain = "",
                                'routeWithoutLocale' => $routeWithoutLocale
                                ])
                            @else
                                <span>{{__('No hay categorías disponibles')}}</span>
                            @endif
                        </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- @if($category_chain)
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse($category_chain as $cat)
                                        / <a href="{{$cat->categoryTranslations[0]->url($locale)}}">
                                            <span
                                                class="cat1">{{$cat->categoryTranslations[0]['category_name']}}</span>
                                        </a>
                                    @empty @endforelse
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(isset($binshopsblog_category) && $binshopsblog_category)
                            <h2 class='text-center'> {{$binshopsblog_category->category_name}}</h2>

                            @if($binshopsblog_category->category_description)
                                <p class='text-center'>{{$binshopsblog_category->category_description}}</p>
                            @endif

                        @endif
                    </div>
                </div>

                @if (config('binshopsblog.search.search_enabled') )
                    @include('binshopsblog::sitewide.search_form')
                @endif
                <div class="row">
                    <div class="col-md-12 text-center">
                        @foreach($lang_list as $lang)
                            <a href="{{route("binshopsblog.index" , $lang->locale)}}">
                                <span>{{$lang->name}}</span>
                            </a>
                @endforeach
        -->
      </section>

@endsection
