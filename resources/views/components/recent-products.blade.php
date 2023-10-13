@props(['latestProducts'])
<!-- Recent Products Start-->
<x-products-grab title="Recent Products">
    @foreach($latestProducts as $latestProduct)
        <!-- One Recent Product Start-->
        <x-one-product :name="$latestProduct->title" :img="$latestProduct->image" :price="$latestProduct->price" rate="5"/>
        <!-- One Recent Product End-->
    @endforeach
{{--    <x-one-product name="Product Name" img="img/product-7.jpg" price="99" rate="5"/>--}}
{{--    <x-one-product name="Product Name" img="img/product-8.jpg" price="99" rate="5"/>--}}
{{--    <x-one-product name="Product Name" img="img/product-9.jpg" price="99" rate="5"/>--}}
{{--    <x-one-product name="Product Name" img="img/product-10.jpg" price="99" rate="5"/>--}}
</x-products-grab>
<!-- Recent Products End-->
