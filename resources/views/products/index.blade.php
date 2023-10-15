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
                        {{$products->withQueryString()->links('pagination::bootstrap-5')}}
                    </div>
                    <!-- Pagination Start -->
                </div>
                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets &
                                        Accessories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics &
                                        Accessories</a>
                                </li>
                            </ul>
                        </nav>
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
