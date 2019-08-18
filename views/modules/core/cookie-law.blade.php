<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<style>.cc-message, .cc-btn { font-size:  11px !important; }</style>
<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#333132",
                    "text": "#fff"
                },
                "button": {
                    "background": "#4AACE8"
                }
            },
            "theme": "edgeless",
            "position": "bottom",
            "content": {
                "message": "{{ setting('core::cookie-law') ? strip_tags(setting('core::cookie-law')) : 'İstatistiksel amaçlarla ve odaklanmış pazarlamalar için bizler ve iş ortaklarımız çerez kullanırız. Bu web sitesine tıklarsanız veya devam ederseniz, çerezlerin kullanımı kabul etmiş sayılırsınız. Çerez kullanımımız hakkında daha fazla bilgi edinebilirsiniz' }}",
                "dismiss": '{{ trans('global.buttons.close') }}',
                "allow": " Tamam",
                "link": "{{ trans('themes::theme.buttons.click for more information') }}",
                "deny": "Hayır",
                "href": "{{ LaravelLocalization::getLocalizedUrl(locale(), url('cookie')) }}",
                "target": "_top"
            }
        })});
</script>