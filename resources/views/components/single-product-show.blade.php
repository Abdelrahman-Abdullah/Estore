<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="{{asset('img/product-1.jpg')}}" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title"><h2>{{$product->title}}</h2></div>
                                <div class="ratting">
                                    @if(isset($product->reviews_avg_rate))
                                        @for($i = 0 ; $i < floor($product->reviews_avg_rate); $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>${{$product->price}}</p>
                                </div>

                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="quantity d-flex">
                                        <h4>Quantity:</h4>
                                        <div>
                                            <span class="btn-minus"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="1" name="quantity" min="1">
                                            <span class="btn-plus"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                    @csrf
                                    <div class="action mt-4">
                                        <button class="btn" type="submit"><i class="fa fa-shopping-cart"></i> Add to
                                            Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews
                                    ({{$product->reviews->count()}})</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    {{$product->description}}
                                </p>
                            </div>
                            <div id="reviews" class="container tab-pane fade">
                                @foreach($product->reviews as $review)
                                    <div class="reviews-submitted">
                                        <div class="reviewer">{{ucwords($review->user->first_name)}} -
                                            <span>{{$review->created_at->diffForHumans()}}</span></div>
                                        <div class="ratting">
                                            @if(isset($review->rate))
                                                @for($i = 0 ; $i < floor($review->rate); $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            @endif
                                        </div>
                                        <p>
                                            {{$review->body}}
                                        </p>
                                    </div>
                                @endforeach
                                {{--                                TODO:: Add Product Reviews Where Logged-In User Can Add Review--}}
                                @auth
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <x-products-page-side-bar :categories="$categories" :products="$latestProducts"/>
            <!-- Side Bar End -->
        </div>
    </div>
</div>

