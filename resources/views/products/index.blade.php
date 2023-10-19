<x-layout>
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <x-products-filtration-bar/>
                        @foreach($products as $product)
                            <x-one-product class="col-md-4" :name="$product->title" :img="$product->image" :price="$product->price"
                                           :rate="$product->reviews_avg_rate"/>
                        @endforeach
                    </div>
                    <!-- Pagination Start -->
                    <div class="col-lg-8">
                        {{$products->links('pagination::bootstrap-5')}}
                    </div>
                    <!-- Pagination Start -->
                </div>
                <!-- Side Bar Start -->
                <x-products-page-side-bar :categories="$categories" :products="$products"/>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
</x-layout>
