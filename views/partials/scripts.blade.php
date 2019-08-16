@stack('styles')
@stack('css-inline')

{!! Theme::script('js/vendors-min.js') !!}
@stack('plugins')

{!! Theme::script('js/scripts.min.js') !!}

@stack('scripts')
@stack('js-inline')

@include('partials.analytics')
