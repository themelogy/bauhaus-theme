(function ($) {
    'use strict';
    /*-------------------------------------------------------------------------------
     Project detail gallery
     -------------------------------------------------------------------------------*/
    var gR = $("#gallery_horizontal"), w = $(window);

    function initGalleryhorizontal() {
        var a = $(window).height(),
            b = $("header").outerHeight(),
            c = $(".gallery_horizontal"),
            d = $("footer").outerHeight();

        if (gR.find(".owl-stage-outer").length) {
            gR.trigger("destroy.owl.carousel").removeClass('owl-carousel owl-theme');
            gR.find('.owl-stage-outer').children().unwrap();
        }

        if (w.width() > 768) {
            gR.addClass('gallery_horizontal');
            c.find("img").css({
                height: a - b - (a / 3)
            });
        } else {
            gR.removeClass('gallery_horizontal');
        }

        gR.addClass('owl-carousel owl-theme');
        gR.owlCarousel({
            dots: false,
            margin: 10,
            items: 1,
            smartSpeed: 250,
            loop: true,
            center: true,
            nav: true,
            video: true,
            lazyLoad: true,
            navText: ["", ""],
            onInitialized: function () {
                if (w.width() > 768) {
                    gR.find(".owl-stage").css({
                        height: a - b - (a / 3),
                        overflow: "hidden"
                    });
                }
            },
            responsive: {
                0: {
                    items: 1,
                    autoHeight: true
                },
                768: {
                    items: 2,
                    autoHeight: true
                },
                1024: {
                    items: 3,
                    autoWidth: true
                },
                1200: {
                    items: 3,
                    autoWidth: true
                },
                1600: {
                    items: 4,
                    autoWidth: true
                }
            }
        });
    }

    if (gR.length) {
        initGalleryhorizontal();
        w.on("resize.destroyhorizontal", function () {
            setTimeout(initGalleryhorizontal, 500);
        });
        gR.on('loaded.owl.lazy', function (event) {
            $(this).find('.owl-item.active img').one('load', function () {
                gR.trigger('refresh.owl.carousel');
            });
            $(this).find('.owl-stage-outer').css('height', $('.owl-item.active img').height());
        });
    }

    if ($('.lightgallery').length > 0) {
        $(".lightgallery").lightGallery({
            selector: ".lightgallery, a.popup-image",
            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
            download: false,
            counter: false
        });
    }

    if ($('#rev_slider').length > 0) {
        if (typeof $.fn.revolution !== 'undefined') {
            $("#rev_slider").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                dottedOverlay: "",
                delay: 7000,
                autoHeight: 'on',
                minHeight: 380,
                navigation: {
                    arrows: {
                        style: "uranus",
                        enable: true
                    },
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
                        enable: false,
                        hide_onmobile: true,
                        direction: "horizontal",
                        container: 'layergrid',
                        h_align: "right",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 0,
                        space: 5
                    }
                },
                parallax: {
                    type: "scroll",
                    origo: "slidercenter",
                    speed: 300,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 47, 48, 49, 50, 51, 55],
                    disable_onmobile: 'on'
                },
                responsiveLevels: [2048, 1600, 1260, 992],
                gridwidth: [1370, 1100, 900, 700],
                gridheight: [800, 800, 500, 300],
                lazyType: "smart",
                shadow: 0,
                spinner: "spinner4",
                stopLoop: "on",
                stopAfterLoops: 0,
                shuffle: "off",
                fullScreenAlignForce: "on",
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
                    disableFocusListener: false
                }
            });
        }

        $('.slider-prev').on('click', function () {
            $(".rev_slider").revprev();
        });

        $('.slider-next').on('click', function () {
            $(".rev_slider").revnext();
        });
    }
})(jQuery);
