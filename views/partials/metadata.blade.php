{!! seo_helper()->render() !!}

<!-- Favicons -->
<link rel="shortcut icon" href="{{ Theme::url('images/logos/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ Theme::url('images/logos/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Theme::url('images/logos/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Theme::url('images/logos/apple-touch-icon-114x114.png') }}">

<script async>
    WebFontConfig = { google: {
            families: ['Playfair+Display:400,400i,700,700i:latin-ext', 'Libre+Baskerville:400i:latin-ext'
            ]
        }};
    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

@stack('head-styles')
{!! Theme::style("css/style.css?v=10") !!}
