@php
        view()->composer('partials.header',\Themes\Bauhaus\Presenter\MenuModify::class);
        $version = 109;
@endphp
<!DOCTYPE HTML>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    @include('partials.metadata')
</head>
<body>
<div class="animsition">
    @if(isset($boxed))<div class="wrapper boxed">@endif
        <div class="click-capture"></div>
        @include('partials.header')
        @includeWhen(!isset($footer), 'partials.footer')
        @yield('content')
        @includeWhen(isset($footer), 'partials.footer')
    @if(isset($boxed))</div>@endif
</div>
@include('partials.scripts')
</body>
</html>
