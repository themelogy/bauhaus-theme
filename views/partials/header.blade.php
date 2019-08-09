<!-- Sidebar Menu-->
<div class="menu">
    <span class="close-menu icon-cross2 right-boxed"></span>
    <div class="menu-lang right-boxed">
        @include('components.language')
    </div>

    {!! Menu::get('header', \Themes\Bauhaus\Presenter\HeaderMenuPresenter::class) !!}

    <div class="menu-footer right-boxed">
        @include('components.socials')
        <div class="copy">@lang('themes::theme.footer.copyrights')</div>
    </div>
</div>
<!-- Navbar -->

<header class="navbar navbar-2 boxed {{ $header_class ?? null }}">
    <div class="navbar-bg"></div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="brand" href="@homepage">
        <img class="brand-img" alt="{{ setting('theme::company-name') }}" src="{{ Theme::url('images/logos/logo-bt.svg') }}">
        <img class="brand-img-white" alt="{{ setting('theme::company-name') }}" src="{{ Theme::url('images/logos/logo-bt.svg') }}">

    </a>
    @if(isset($header_socials))
        @include('components.socials', ['class'=>'hidden-xs'])
    @endif
</header>
