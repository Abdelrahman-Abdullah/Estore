<x-layout>
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab"
                           role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i
                                class="fa fa-shopping-bag"></i>Orders</a>
                        <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i
                                class="fa fa-credit-card"></i>Payment Method</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i
                                class="fa fa-user"></i>Account Details</a>
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn border border-1 w-100 text-end"><i
                                    class="fa fa-sign-out-alt"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    @if(session('message'))
                        <x-success-message/>
                    @endif
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel"
                             aria-labelledby="dashboard-nav">
                            <h3>Dashboard</h3>
                            <br/>
                            <h4>
                                Welcome back <strong class="text-success">{{auth()->user()->first_name}}</strong>
                            </h4>
                            <p>
                                Here You Can Control Your Orders And Your Personal Information
                            </p>
                            @if(session('success'))
                                <x-success-message/>
                            @endif

                            @if(session('error'))
                                <x-error-message/>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(auth()->user()->orders as $order)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$order->created_at->diffForHumans()}}</td>
                                            <td>${{$order->total_price}}</td>
                                            <td class="{{$order->status == 'paid' ? 'text-success' : 'text-danger'}}">{{ucwords($order->status)}}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Orders Yet</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>Payment Method</h4>
                            <p>
                                All Payment Method Done With <a href="https://stripe.com/" target="_blank">Stripe</a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Account Details</h4>
                            <form action="{{route('user.updateProfile')}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First Name"
                                               name="first_name"
                                               value="{{auth()->user()->first_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Last Name"
                                               name="last_name"
                                               value="{{auth()->user()->last_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Mobile"
                                               name="mobile"
                                               value="{{auth()->user()->mobile}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Email"
                                               name="email"
                                               disabled
                                               value="{{auth()->user()->email}}">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>

                            <h4>Password change</h4>
                            <form action="{{route('user.updateProfile')}}" method="POSt">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password"
                                               name="current_password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="password" placeholder="New Password"
                                               name="new_password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="password" placeholder="Confirm Password"
                                               name="new_password_confirmation">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
