<div class="rev_slider_wrapper" style="padding: 0; margin: 0;">
    <div id="rev_slider" class="rev_slider tp-overflow-hidden fullscreenbanner">
        <ul>
            @foreach($slides as $slide)
            <!-- Slide 1 -->
            <li  data-transition="fade"  data-slotamount="6" data-masterspeed="1000" data-fsmasterspeed="1000">

                <!-- Main image-->

                <img data-lazyload="{{ $slide->present()->firstImage(1600,null,'resize',75) }}" data-bgparallax="5"  alt="{{ $slide->title }}" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                <div class="slider-title tp-caption tp-resizeme category" style="padding: 20px 0;"
                     data-x="['left']" data-hoffset="['250', '250','250','50']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['30']"
                     data-textAlign="['left']"
                     data-fontsize="['80', '75','70','65']"
                     data-lineheight="['75','70', '65','60']"
                     data-height="auto"
                     data-width="['750', '700', '650', '600']"
                     data-whitespace="normal"
                     data-transform_idle="o:1;"
                     data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-start="500"
                     data-splitin="none"
                     data-splitout="none"
                     data-responsive_offset="on"
                     data-elementdelay="0.05">{!! $slide->sub_title !!}
                </div>


                <!-- Layer 6 -->
                <div class="slider-title tp-caption proje"
                     data-x="['left']" data-hoffset="['255', '255','255','50']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['155']"
                     data-textAlign="['left']"
                     data-fontsize="['17']"
                     data-lineheight="['20']"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="x:[155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-start="1000"
                     data-splitin="none"
                     data-splitout="none"
                     data-responsive_offset="on"
                     data-elementdelay="0.05"><a href="{{ $slide->present()->link->url }}" class="link-arrow" style="font-weight: 300">{{ $slide->title }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@push('styles')
    {!! Theme::style('plugins/rev-slider/css/settings.css') !!}
@endpush

@push('scripts')
    {!! Theme::script('plugins/rev-slider/js/jquery.revolution.min.js?v=109') !!}
    {!! Theme::script('js/rev-slider-init.js?v=109') !!}
@endpush
