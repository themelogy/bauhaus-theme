@stack('styles')
@stack('css-inline')

{!! Theme::script('js/vendors-min.js?v=10') !!}
@stack('plugins')

{!! Theme::script('plugins/lazyload.min.js') !!}
<script>
    $(".lazy").lazyload({
        effect : "fadeIn"
    });
</script>

{!! Theme::script('js/scripts.min.js?v=10') !!}

@stack('scripts')
@stack('js-inline')

@include('partials.analytics')
