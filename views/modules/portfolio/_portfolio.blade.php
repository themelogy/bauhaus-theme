<div class="grid-item {{ $portfolio->categories()->get()->implode('slug', ' ') }} js-isotope-item js-grid-item">
    <div class="project-item item-shadow">
        <img alt="{{ $portfolio->title }}" class="img-responsive" src="{{ $portfolio->present()->firstImage(426,300,'fit',70) }}">
        <div class="project-hover">
            <div class="project-hover-content">
                <h3 class="project-title">{{ $portfolio->title }}</h3>
                <h4 class="project-cat">{!! $portfolio->present()->categories() !!}</h4>
            </div>
        </div>
        <a href="{{ $portfolio->url }}" class="link-arrow">@lang('themes::theme.buttons.project') <i class="icon ion-ios-arrow-right"></i></a>
    </div>
</div>
