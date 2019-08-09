@stack('styles')
@stack('css-inline')

{!! Theme::script('js/jquery.min.js') !!}
{!! Theme::script('js/animsition.min.js') !!}
{!! Theme::script('js/bootstrap.min.js') !!}
{!! Theme::script('js/smoothscroll.js') !!}
{!! Theme::script('js/wow.min.js') !!}
{!! Theme::script('js/jquery.stellar.min.js') !!}
{!! Theme::script('js/owl.carousel.min.js') !!}
{!! Theme::script('js/jquery.pagepiling.js') !!}
@stack('plugins')

{!! Theme::script('js/scripts.js') !!}

@stack('scripts')
@stack('js-inline')

@include('partials.analytics')
