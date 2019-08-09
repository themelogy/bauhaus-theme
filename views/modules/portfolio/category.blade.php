@extends('layouts.master', ['footer'=>true, 'boxed'=>true, 'footer_socials'=>true])

@section('content')

    @component('components.page-title')
        {{ $category->title }}
    @endcomponent

    <div class="content">
        <div class="projects">
            <div class="grid-items js-isotope js-grid-items">
                @foreach($portfolios as $portfolio)
                    @include('portfolio::_portfolio')
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('plugins')
    {!! Theme::script('js/isotope.pkgd.min.js') !!}
    {!! Theme::script('js/imagesloaded.pkgd.min.js') !!}
@endpush
