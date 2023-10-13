@props(['latestProducts'])
<!-- Recent Products Start-->
<x-products-grab title="Recent Products">
    @foreach($latestProducts as $latestProduct)
        <!-- One Recent Product Start-->
        <x-one-product :name="$latestProduct->title" :img="$latestProduct->image" :price="$latestProduct->price" />
        <!-- One Recent Product End-->
    @endforeach
</x-products-grab>
<!-- Recent Products End-->
