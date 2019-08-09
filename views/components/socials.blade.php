<div class="social-list {{ $class ?? null }}">
    @foreach(
        [
        'facebook'  => 'icon ion-social-facebook',
        'instagram' => 'icon ion-social-instagram-outline',
        'twitter'   => 'icon ion-social-twitter',
        'linkedin'  => 'icon ion-social-linkedin',
        'whatsapp'  => 'icon ion-social-whatsapp',
        'vimeo'     => 'icon ion-social-vimeo',
        'youtube'   => 'icon ion-social-youtube',
        'dribble'   => 'icon ion-social-dribble-outline'
        ] as $sk => $sv)
        @if(!empty(setting('theme::'.$sk)))
            @php
                $skprefix = '';
                $value = '';
                switch ($sk) {
                    case 'email':
                        $skprefix = 'mailto://';
                        $value    = $skprefix.setting('theme::'.$sk);
                        break;
                    case 'whatsapp':
                        $skprefix = 'https://wa.me/';
                        $value    = $skprefix.intval(preg_replace('/[^0-9]+/', '', setting('theme::'.$sk)));
                        break;
                    case 'telegramm':
                        $skprefix = 'https://t.me/';
                        $value    = $skprefix.setting('theme::'.$sk);
                        break;
                    case 'viber':
                        $skprefix = 'viber://chat?number=';
                        $value    = $skprefix.'<+'.intval(preg_replace('/[^0-9]+/', '', setting('theme::'.$sk))).'>';
                        break;
                    default:
                        $value = setting('theme::'.$sk);
                }
            @endphp
            <a rel="nofollow" target="_blank" href="{{ $value }}" class="{{ $sv }}"></a>
        @endif
    @endforeach
</div>
