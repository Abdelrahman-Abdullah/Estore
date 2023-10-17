<div class="col-md-12">
    <div class="product-view-top">
        <div class="row">
            <div class="col-md-4">
                <div class="product-search">
                    <form action="/products" method="get">
                        {{-- To Merege Search With Prices During Filter --}}
                        @if(request()->has('min_price', 'max_price'))
                            <input type="hidden" name="min_price" value="{{request('min_price')}}">
                            <input type="hidden" name="max_price" value="{{request('max_price')}}">
                        @endif
                        <input type="text" name="search" placeholder="Search By Name" value="{{ request('search') }}">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-short">
                    <div class="dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">Product short by {{ucfirst(request('sort'))}}</div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/products?sort=newest" class="dropdown-item">Newest</a>
                            <a href="/products?sort=popular" class="dropdown-item">Popular</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-price-range">
                    <div class="dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form action="/products" method="get" class="p-4">
                                {{-- To Merege Prices With Search During Filter --}}
                                @if(request('search'))
                                    <input type="hidden" name="search" value="{{request('search')}}">
                                @endif
                                <label for="min_price">Min Price:</label>
                                <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}" min="0">
                                <br><br>
                                <label for="max_price">Max Price:</label>
                                <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}" min="0">
                                <br><br>
                                <button type="submit" class="px-4 py-1 btn">Search</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
