<!-- Featured Products Start -->
<x-products-grab title="Featured Product" class="product-slider-3">
    @foreach($featuredProducts as $featuredProduct)
        <!-- One Featured Product Start-->
        <x-one-product :name="$featuredProduct->title" :img="$featuredProduct->image"
                       :price="$featuredProduct->price" :rate="$featuredProduct->reviews_avg_rate"/>
        <!-- One Featured Product End-->
    @endforeach

</x-products-grab>
<!-- Featured Products End -->
