@if(isset($footer))
    @if(isset($footer_boxed))<div class="container-fluid boxed">@endif
    <footer id="footer" class="footer section">
        <div class="footer-flex">
            <div class="flex-item">
                <a class="brand pull-left" href="#">
                    <img alt="{{ setting('core::site-name') }}" src="{!! Theme::url('images/logos/logo-bt.svg') !!}">
                </a>
            </div>
            <div class="flex-item">
                <div class="inline-block"><p><small>{!! str_replace('.', '.<br/>', trans('themes::theme.footer.copyrights')) !!}</small></p></div>
            </div>
            <div class="flex-item">
                {!! Menu::get('footer', \Themes\Bauhaus\Presenter\FooterMenuPresenter::class) !!}
            </div>
            <div class="flex-item">
                @portfolioCategories('categories')
            </div>
            <div class="flex-item">
                @include('components.language', ['list'=>true])
            </div>
            <div class="flex-item">
                @if(isset($footer_socials))
                @include('components.socials')
                @endif
            </div>
        </div>
    </footer>
    @if(isset($footer_boxed))</div>@endif
@else
    <div class="copy-bottom boxed {{ $footer_class ?? '' }}"><small>@lang('themes::theme.footer.copyrights')</small></div>
    <div class="lang-bottom boxed {{ $footer_class ?? '' }}">
        <div class="menu-lang">
            @include('components.language')
        </div>
    </div>
@endif
