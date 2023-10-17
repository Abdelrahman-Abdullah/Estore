{{--@dd($products)--}}
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
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>

                        <x-main-header-categories class="col-md-6" :categories="$categories"/>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            @foreach($products as $product)
                                    <x-one-product :name="$product->title" :img="$product->image" :price="$product->price" />
                                    @break($loop->iteration == 3)
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
</x-layout>
