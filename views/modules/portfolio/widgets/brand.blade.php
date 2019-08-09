<div class="scroll-wrap">
    <div class="scrollable-content">
        <div class="vertical-centred">
            <div class="boxed boxed-inner">
                <div class="vertical-title text-dark hidden-xs hidden-sm"><span>@lang('themes::portfolio.title.portfoy')</span></div>
                <div class="boxed">
                    <div class="container">
                        <div class="intro overflow-hidden">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="title-uppercase">@lang('themes::portfolio.title.who we worked with')</h2>
                                    <ul class="partners">
                                        @foreach($brands as $brand)
                                            <li class="partner">
                                                <img class="img-responsive" alt="{{ $brand->title }}" src="{{ $brand->present()->firstImage(null,150,'resize',100) }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
