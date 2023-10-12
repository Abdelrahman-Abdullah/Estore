@props(['name' , 'img' , 'price' , 'rate'])
<div class="col-lg-3">
    <div class="product-item">
        <div class="product-title">
            <a href="#">{{$name}}</a>
            <div class="ratting">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="product-image">
            <a href="product-detail.html">
                {{-- TODO::Change this to use the img prop--}}
                <img src="{{$img}}" alt="Product Image">
            </a>
            <div class="product-action">
                <a href="#"><i class="fa fa-cart-plus"></i></a>
                <a href="#"><i class="fa fa-heart"></i></a>
                <a href="#"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="product-price">
            <h3><span>$</span>{{$price}}</h3>
            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
        </div>
    </div>
</div>
