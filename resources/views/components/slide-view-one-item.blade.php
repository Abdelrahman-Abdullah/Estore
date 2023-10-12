@props(['img'])
{{--Start Show Item--}}
<div {{$attributes->merge(['class' => 'category-item ch-400'])}}>
    <img src="{{asset($img)}}"/>
    {{--TODO:: Link--}}
    <a class="category-name" href="">
        <p>Some text goes here that describes the image</p>
    </a>
</div>
{{--End Show Item--}}
