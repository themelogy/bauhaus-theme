@extends('layouts.master', ['footer'=>true, 'boxed'=>true, 'footer_socials'=>true])

@section('content')
    @component('components.title')
        @lang('themes::location.title.enjoy coffee with us')
    @endcomponent

    <div class="content">
        <div class="page-inner">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @location('merkez', 'contact-page')
                        </div>
                    </div>
                    @location('merkez', 'map')
                    <div class="row m-top-20">
                        <div class="col-md-12">
                            @include('contact::form')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
