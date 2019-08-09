<div class="scroll-wrap">
    <div class="bg-changer">
        @foreach($portfolios as $portfolio)
        <div class="section-bg" style="background-image: url('{{ $portfolio->present()->firstImage(1920,null,'resize',80)  }}')"></div>
        @endforeach
    </div>
    <div class="scrollable-content">
        <div class="vertical-centred">
            <div class="boxed boxed-inner">
                <div class="vertical-title hidden-xs hidden-sm"><span>@lang('themes::portfolio.title.our works')</span></div>
                <div class="boxed">
                    <div class="container">
                        <div class="intro">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="title-uppercase text-white text-shadow">@lang('themes::portfolio.title.what we do')</h2>
                                    <div class="row-project-box row">
                                        @foreach($portfolios as $portfolio)
                                        <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                                            <a href="{{ $portfolio->url }}" class="project-box">
                                                <div class="project-box-inner">
                                                    <h5>{{ $portfolio->title }}</h5>
                                                    <div class="project-category">{!! strip_tags($portfolio->present()->categories()) !!}</div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a href="{{ route('portfolio.index') }}" class="h5 link-arrow text-white">@lang('themes::portfolio.title.other projects') <i class="icon icon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
