@extends('layouts.master', ['header_class'=>'navbar-white', 'footer_class'=>'white', 'header_socials'=>true])

@section('content')
    <div class="pagepiling">
        <div class="pp-scrollable text-white section section-1">
            @themeSlide('anasayfa')
        </div>

        <div class="pp-scrollable text-white section section-2">
            @portfolioLatest(8, 'settings->show_home')
        </div>

        <div class="pp-scrollable section section-4">
            @portfolioBrands(50)
        </div>

        <div class="pp-scrollable section section-6">
            @location('merkez')
        </div>
    </div>
@endsection
