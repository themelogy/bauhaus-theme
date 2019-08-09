@extends('layouts.master', ['boxed'=>true, 'footer'=>true, 'footer_socials'=>true])

@section('content')

    @component('components.page-title')
        @lang('themes::portfolio.title.what we do')
    @endcomponent

    <div class="content">
        <div class="projects">
            <div class="container">
                <div class="filter-content-2">
                    @portfolioCategories('category-filter')
                </div>
            </div>
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
