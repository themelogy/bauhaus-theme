@php
    $theme = isset($theme) ? $theme : 'minima';
    $layout = 'vendor/jssocials/dist/jssocials-theme-'. $theme .'.css';
@endphp
<div id="share" class="{{ $theme }}"></div>

@push('scripts')
{!! Theme::script('vendor/jssocials/dist/jssocials.min.js') !!}
{!! Theme::style('vendor/jssocials/dist/jssocials.css') !!}
{!! Theme::style($layout) !!}
@endpush

@push('js-inline')
<script>
    $(document).ready(function () {
        $("#share").jsSocials({
            shareIn: "popup",
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "pinterest", "whatsapp"]
        });
    });
</script>
@endpush
