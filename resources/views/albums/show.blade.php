@extends('layouts.app')

@section('content')

    <!-- Hero -->
    <div class="navbar-transparent px-md-0 img pb-md-5 navbar-wrap bg-transparent" style="background-image: url({!! asset('/storage/svg/album.svg') !!}); height: 400px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1 class="mb-4"><span>Album - {!! $album->name !!}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Delete Button -->
    @auth
        @if(Auth::user()->Admin() || Auth::id() === $album->user_id)
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('albums.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('albums.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Albums -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="image-wrap">
                        <img src="{!! $album->albumPics() !!}" alt="{!! $album->name !!}" class="rounded img-fluid image image-2 image-full">
                        <div class="text">
                            <a href="{!! $album->pathProfile() !!}">
                                <div class="img" style="background-image: url({!! $album->userPics() !!});"></div>
                                <span class="position">{!! $album->user['username'] !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">{!! __('album.album') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $album->name !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('album.desc') !!}</span>
                        <div class="blockquote">
                            <p>
                                {!! $album->desc !!}
                            </p>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">{!! __('album.cat') !!}</span>
                        <div class="blockquote">
                            <a href="{!! $album->pathAlbumCategory() !!}">
                                <img src="{!! $album->albumCategoryPics() !!}" alt="{!! $album->category['name'] !!}" class="image img-fluid img-2" style="width: 25%;">
                            </a>
                        </div>
                    </div>
                    <div class="typo">
                        <span class="typo-note">Tags</span>
                        <div class="blockquote">
                            @forelse($album->tags as $tag)
                                <a href="/tag/tags/{{ $tag }}">
                                    <span>#{!! $tag->normalized !!} </span>
                                </a>
                            @empty
                                <span> #</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Button -->
    @auth
        @if(Auth::id() === $album->user_id)
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('images.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth


    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
        <!-- Page Content-->
        <div class="container pb-3 mb-1">
            <div class="row">
                <!-- Poduct Gallery-->
                <div class="col-md-6">
                    <div class="product-gallery">
                        <div class="product-carousel owl-carousel gallery-wrapper">
                            @forelse($album->images as $image)
                                <div class="gallery-item" data-hash="{!! $image->id !!}"><a href="{!! $image->imagePics() !!}" data-size="1000x667"><img src="{!! $image->imagePics() !!}" alt="{!! $image->name !!}"></a></div>
                                @empty
                            @endforelse
                        </div>
                        <ul class="product-thumbnails">
                            @forelse($album->images as $image)
                                <li class="active"><a href="#{!! $image->id !!}"><img src="{!! $image->imagePics() !!}" alt="{!! $image->name !!}"></a></li>
                                @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Product Info-->
                <div class="col-md-6">
                    @forelse($album->images as $image)
                        @auth
                            @if(Auth::user()->Admin() || Auth::id() === $album->user_id)
                        @endauth
                                <a href="{!! $image->pathTitle() !!}">
                                    <h2 class="padding-top-1x text-normal">{!! $image->name !!}</h2>
                                </a>
                                @else
                                    <h2 class="padding-top-1x text-normal">{!! $image->name !!}</h2>
                            @endif
                        <div class="pt-1 mb-2"><span class="text-medium">{!! __('album.desc') !!} : </span> {!! $image->desc !!}</div>
                        <hr class="mb-3">
                        @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <!-- Albums -->
    <section class="ftco-section" id="typography">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="typo">
                        <span class="typo-note">Comment</span>
                        <div class="blockquote">
                            @comments(['model' => $album])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
