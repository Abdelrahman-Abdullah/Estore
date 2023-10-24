<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="/">
                        <img src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <form action="/products" method="get">
                        <input type="text" name="search" placeholder="Search By Name" value="{{ request('search') }}">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                @auth
                    <div class="user">
                        <a href="{{route('wishlist.index')}}" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>
                                (
                                    <span id="wishlistCount">
                                        {{$userWishlistProductsCount}}
                                    </span>
                                )
                            </span>
                        </a>
                        <a href="cart.html" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
