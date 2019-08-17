@extends('layouts.master', ['footer'=>true, 'footer_boxed'=>true, 'footer_socials'=>true])

@section('content')
    <div class="wrapper">
    <div class="content">
        <div class="resize-carousel-holder lightgallery">
            <div id="gallery_horizontal" class="owl-carousel owl-theme gallery_horizontal project-details">
                @foreach($portfolio->present()->images(null,740,'resize',60,'watermark.png') as $image)
                    <div class="owl-item">
                        <a class="popup-image slider-zoom" data-src="{{ $image }}" data-sub-html="{{ $portfolio->title }}"><i class="fa fa-expand"></i></a>
                        <img class="owl-lazy" data-src="{{ $image }}" alt="{{ $portfolio->title }} {{ $loop->iteration }}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <section class="section section-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="project-detail">
                            <h1 class="title h-line md-m-bot-50">{{ $portfolio->title }}</h1>
                            @if($portfolio->brand()->exists())
                            @if($brandImage = $portfolio->brand->present()->firstImage(70,null,'resize',100))
                                <div class="brand-image m-bot-20">
                                    <img src="{{ $brandImage }}" alt="{{ $portfolio->title }} Logo" />
                                </div>
                            @endif
                            @endif
                            @if(!empty($portfolio->description))
                                <div class="description">{!! $portfolio->description !!}</div>
                            @endif
                            @if(@$portfolio->settings->tech_desc->{locale()})
                                <h4 class="title m-bot-10 m-top-20">{{ trans('themes::portfolio.title.tech_desc') }}</h4>
                                <div class="description">{!! @$portfolio->settings->tech_desc->{locale()} !!}</div>
                            @endif
                            <ul class="detail-list">
                                @if(!empty(@$portfolio->settings->location))
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.location') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">{!! nl2br($portfolio->settings->location) !!}</div>
                                    </li>
                                @endif
                                <li class="row">
                                    <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.year') }}<span class="hidden-xs">:</span></div>
                                    <div class="col-md-10 col-xs-12">{{ $portfolio->start_at->formatLocalized('%Y') }}</div>
                                </li>
                                @if($portfolio->categories()->exists())
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.category') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">
                                            {!! $portfolio->categories->map(function($category){
                                                    $link = '<a class="label label-info" href="'.$category->url.'">'.$category->title.'</a>';
                                                    return $link;
                                                })->implode(' ') !!}
                                        </div>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->area_size))
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.area_size') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">{{ $portfolio->settings->area_size }}</div>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->describe->tr))
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.describe') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">{{ $portfolio->settings->describe->{locale()} }}</div>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->partner))
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.partner') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">{{ $portfolio->settings->partner }}</div>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->employer->tr))
                                    <li class="row">
                                        <div class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.employer') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12">{{ $portfolio->settings->employer->{locale()} }}</div>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->website))
                                    <li class="row">
                                        <div class="col-md-2 text-bold col-xs-12">{{ trans('themes::portfolio.title.website') }}<span class="hidden-xs">:</span></div>
                                        <div class="col-md-10 col-xs-12"><a target="_blank" href="{{ $portfolio->website }}">{{ $portfolio->website }}</a> </div>v
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->video))
                                    <li class="row">
                                        <div class="col-md-2 text-bold col-xs-12">{{ trans('themes::portfolio.title.video') }} </div>
                                        <div class="col-md-10 col-xs-12"><span class="hidden-xs">:</span>
                                                <a class="play-1 btn btn-bordered" href="{{ $portfolio->settings->video }}"><i class="fa fa-play"></i></a>
                                            </div>
                                    </li>
                                @endif
                                @if(@$portfolio->present()->file)
                                    <li class="row">
                                        <div class="col-md-2 text-bold col-xs-12">{{ trans('themes::portfolio.title.file') }} </div>
                                        <div class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> <a class="download-btn btn btn-bordered" target="_blank" href="{{ $portfolio->present()->file }}"><i class="fa fa-download"></i></a> </div>
                                    </li>
                                @endif
                            </ul>
                            <div class="detail-meta m-top-20">
                                {{--<span class="hidden-xs text-bold pull-left m-top-10 m-rgt-10">{{ trans('themes::portfolio.title.share') }} </span>--}}
                                <div class="pull-left">
                                    @include('components.share', ['theme'=>'plain'])
                                </div>
                            </div>
                            <div class="detail-tags">
                                @if(count($portfolio->tags)>0)
                                    <ul class="list-inline">
                                        @foreach($portfolio->tags as $tag)
                                            <li><a class="text-white" href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection

@push('css-inline')
    <style>
        .download-btn {
            padding: 5px 7px 5px 9px;
            border-radius: 20px;
        }
    </style>
@endpush

@push('head-styles')
    {!! Theme::style('vendor/lightgallery/dist/css/lightgallery.min.css') !!}
    {!! Theme::style('vendor/owl.carousel/dist/assets/owl.carousel.min.css') !!}
@endpush

@push('scripts')
    {!! Theme::script('vendor/lightgallery/dist/js/lightgallery.min.js') !!}
    {!! Theme::script('vendor/owl.carousel/dist/owl.carousel.min.js') !!}
    @if(@$portfolio->settings->video)
        {!! Theme::script('vendor/youtubeurl/jquery.yu2fvl.css') !!}
        {!! Theme::script('vendor/youtubeurl/jquery.yu2fvl.min.js') !!}
        <script> $('.play-1').yu2fvl({minPaddingX: 200, minPaddingY: 200}); </script>
    @endif
    {!! Theme::script('js/project-detail.js') !!}
@endpush
