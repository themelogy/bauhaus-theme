@stack('styles')
@stack('css-inline')

{!! Theme::script('js/vendors-min.js?v=1') !!}
@stack('plugins')

{!! Theme::script('js/scripts.min.js?v=1') !!}

@stack('scripts')
@stack('js-inline')

<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script>
    $("div.lazy").lazyload({
        effect : "fadeIn"
    });
</script>

@include('partials.analytics')
