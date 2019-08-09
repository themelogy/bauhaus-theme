<ul class="filter js-filter">
    <li class="active"><a href="#" data-filter="*">@lang('themes::theme.buttons.all')</a></li>
    @foreach($categories as $category)
    <li><a href="#" data-filter=".{{ $category->slug }}">{{ $category->title }}</a></li>
    @endforeach
</ul>
