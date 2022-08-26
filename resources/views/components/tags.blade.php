@props(['tags'])

@php
    $tags = explode(',',$tags);
@endphp

<ul class="flex flex-wrap">
    @foreach ($tags as $tag)
        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2 mt-1">
            <a href="?tag={{ trim($tag) }}">{{ trim($tag) }}</a>
        </li>
    @endforeach
</ul>
