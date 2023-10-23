<x-layout>
    <div class="wishlist-page">
        <div class="container-fluid">
            <div class="wishlist-page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            @if(!$userWishlistProducts->count() > 0)
                                <div class="alert alert-success">You have {{$userWishlistProducts->count()}} products
                                    in wishlist
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Add to Cart</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    @foreach($userWishlistProducts as $userProduct)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{asset($userProduct->image)}}" alt="Image"></a>
                                                    <p>{{$userProduct->title}}e</p>
                                                </div>
                                            </td>
                                            <td>${{$userProduct->price}}</td>
                                            <td>
                                                <button class="btn-cart">Add to Cart</button>
                                            </td>
                                            <td>
                                                <button class="wishlistBtn" data-product-name="{{$userProduct->title}}"
                                                        data-in-wishlist="true"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
