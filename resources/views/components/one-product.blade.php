@props(['name' , 'img' , 'price' , 'rate'])
<div {{$attributes->merge(['class' => "col-lg-4"])}}>
    <div class="product-item">
        <div class="product-title">
            <a href="{{route('products.show' , $name)}}">{{$name}}</a>
            <div class="ratting">
                @if(isset($rate))
                    @for($i = 0 ; $i < floor($rate); $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                @endif
            </div>
        </div>
        <div class="product-image">
            <a href="{{route('products.show' , $name)}}">
                <img src="{{asset($img)}}" alt="Product Image">
            </a>
            <div class="product-action">
                <a href="#"><i class="fa fa-cart-plus"></i></a>
                    <button type="submit" class="btn btn-link wishlistBtn" data-product-name="{{$name}}" data-in-wishlist="false" >
                        <i class="fa fa-heart" id="heart"></i>
                    </button>
            </div>
        </div>
        <div class="product-price">
            <h3><span>$</span>{{$price}}</h3>
            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
        </div>
    </div>
</div>
