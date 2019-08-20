
/*-------------------------------------------------------------------------------
  Sliders
-------------------------------------------------------------------------------*/
if($('#rev_slider').length>0) {
  if (typeof $.fn.revolution !== 'undefined') {

    $("#rev_slider").revolution({
      sliderType: "standard",
      sliderLayout: "fullscreen",
      dottedOverlay: "none",
      delay: 7000,
      navigation: {
        keyboardNavigation: "off",
        keyboard_direction: "horizontal",
        onHoverStop: "off",
        touch: {
          touchenabled: "on",
          swipe_threshold: 75,
          swipe_min_touches: 1,
          swipe_direction: "horizontal",
          drag_block_vertical: false
        },
        bullets: {
          enable: true,
          hide_onmobile: true,

          direction: "horizontal",
          container: 'layergrid',
          h_align: "right",
          v_align: "bottom",
          h_offset: 30,
          v_offset: 110,
          space: 12
        }
      },
      responsiveLevels: [2048, 1600, 1260, 992],
      gridwidth: [1370, 1100, 900, 700],
      gridheight: [800],
      lazyType: "smart",
      shadow: 0,
      spinner: "off",
      stopLoop: "on",
      stopAfterLoops: 0,
      shuffle: "off",
      autoHeight: "on",
      fullScreenAlignForce: "on",
      fullScreenOffsetContainer: "",
      fullScreenOffset: "",
      disableProgressBar: "on",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
        simplifyAll: "off",
        nextSlideOnWindowFocus: "off",
        disableFocusListener: false,
      }
    });
  }
}



$('.slider-prev').on('click', function(){
  $(".rev_slider").revprev();
});

$('.slider-next').on('click', function(){
  $(".rev_slider").revnext();
});





