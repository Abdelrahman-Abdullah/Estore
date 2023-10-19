@props(['title'])

<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>{{$title}}</h1>
        </div>
        <div {{$attributes->merge(['class'=> "row align-items-center product-slider product-slider-4"])}}>
            {{$slot}}
        </div>
    </div>
</div>
