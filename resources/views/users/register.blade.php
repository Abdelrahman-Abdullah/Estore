<x-layout>
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-form">
                        <form action="{{route('user.store')}}" method="POST" class="row">
                            @csrf
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" name="first_name" type="text" placeholder="First Name">
                                <x-error-input name="first_name" />
                            </div>
                            <div class="col-md-6">
                                <label>Last Name"</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Last Name">
                                <x-error-input name="last_name" />
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="email" placeholder="E-mail">
                                <x-error-input name="email" />
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" name="mobile" type="text" placeholder="Mobile No">
                                <x-error-input name="mobile" />

                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                                <x-error-input name="password" />
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input class="form-control" name="password_confirmation" type="password"
                                       placeholder="Password">
                            </div>
                            <div class="col-md-12">
                                <x-form-main-btn class="col-md-4" name="Sign Up" />
                            </div>
                        </form>
                        @if(session('message'))
                            <x-success-message />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
