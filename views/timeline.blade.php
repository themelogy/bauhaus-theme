@extends('layouts.master', ['boxed'=>true, 'footer'=>true, 'footer_socials'=>true])

@section('content')
    @component('components.title')
        {!! $page->title !!}
    @endcomponent

    <div class="content">
        <div class="page-inner">
            <section class="section about-info">
                <div class="container">
                    <div class="timeline">
                        {!! $page->body !!}
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop

@push('scripts')
{!! Theme::script('plugins/jquery.nicescroll.min.js') !!}
@endpush

@push('js-inline')
<script>
    $(".timeline").niceScroll('.wrap', {
        cursorcolor: '#00adee'
    });
</script>
@endpush
