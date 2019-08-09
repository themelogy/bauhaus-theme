@if(isset($list))
    <ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
        <li><a href="{{ url($locale) }}"{!! $locale == locale() ? ' class="active"' : '' !!}>{{ strtoupper($locale) }}</a></li>
    @endforeach
    </ul>
    @else
    @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
        <a href="{{ url($locale) }}"{!! $locale == locale() ? ' class="active"' : '' !!}>{{ $locale }}</a>
    @endforeach
@endif
