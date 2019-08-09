{!! seo_helper()->render() !!}

<!-- Favicons -->
<link rel="shortcut icon" href="{{ Theme::url('images/logos/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ Theme::url('images/logos/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Theme::url('images/logos/apple-touch-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Theme::url('images/logos/apple-touch-icon-114x114.png') }}">

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Poppins:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400i" rel="stylesheet">

@stack('head-styles')
@if(App::environment()=='local')
    {!! Theme::style("css/style.css") !!}
@else
    <link rel="stylesheet" href="{{ elixir('css/style.min.css', 'themes/bauhaus') }}" />
@endif
