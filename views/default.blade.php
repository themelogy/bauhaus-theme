@extends('layouts.master', ['boxed'=>true, 'footer'=>true, 'footer_socials'=>true])

@section('content')
    @component('components.title')
        {!! $page->title !!}
    @endcomponent

    <div class="content">
        <div class="page-inner">
            <section class="section about-info">
                <div class="container">
                    {!! $page->body !!}
                </div>
            </section>
        </div>
    </div>
@stop
