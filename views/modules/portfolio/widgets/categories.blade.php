<ul>
    @foreach($categories as $category)
    <li><a href="{{ $category->url }}">{{ $category->title }}</a></li>
    @endforeach
</ul>
