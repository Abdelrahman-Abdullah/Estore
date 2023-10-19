@props(['categories','product','latestProducts'])
<x-layout>
    <x-single-product-show :categories="$categories" :product="$product" :latestProducts="$latestProducts" />
    <x-brands/>
</x-layout>
