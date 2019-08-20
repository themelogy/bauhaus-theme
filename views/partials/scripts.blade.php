@stack('styles')
@stack('css-inline')

{!! Theme::script('js/vendors-min.js?v='.$version) !!}
@stack('plugins')

{!! Theme::script('plugins/lazyload.min.js?v='.$version) !!}
<script>
    $(".lazy").lazyload({
        effect : "fadeIn"
    });
</script>

{!! Theme::script('js/scripts.min.js?v='.$version) !!}

@stack('scripts')
@stack('js-inline')

@include('partials.analytics')
