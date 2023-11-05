<x-layout>
    <div class="wishlist-page">
        <div class="container-fluid">
            <div class="wishlist-page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            @if(!count($cartProducts) > 0)
                                <div class="alert alert-success">You have 0 products
                                    in Cart.
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    @foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{asset($cartProduct['image'])}}" alt="Image"></a>
                                                    <p>{{$cartProduct['name']}}e</p>
                                                </div>
                                            </td>
                                            <td>${{$cartProduct['price']}}</td>
                                            <td>{{$cartProduct['quantity']}}</td>
                                            <td>${{$cartProduct['totalPrice']}}</td>
                                            <td>
                                                <form action="{{route('cart.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                           value="{{$cartProduct['id']}}">
                                                    <button class="wishlistBtn" type="submit"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <div class="w-100 text-center">
                                <form action="{{route('checkout.create')}}" method="post">
                                    @csrf
                                <button class="btn mt-4 px-5" type="submit"><a
                                        href="{{route('checkout.create')}}">Checkout</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
