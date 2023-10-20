<x-layout>
    <div class="container bg-white mb-2 py-4">
        <div class="col-lg-12">
            <div class="login-form">
                <form action="{{route('user.login')}}" method="POST">
                    @csrf
                    <div class="col">
                        <div class="col-md-12">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="email" placeholder="E-mail">
                            <x-error-input name="email"/>
                        </div>
                        <div class="col-md-12">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Password">
                            <x-error-input name="password"/>
                        </div>
                        {{--                            TODO: Add remember me--}}
                        {{--                            <div class="col-md-12">--}}
                        {{--                                <div class="custom-control custom-checkbox">--}}
                        {{--                                    <input type="checkbox" class="custom-control-input" id="newaccount">--}}
                        {{--                                    <label class="custom-control-label" for="newaccount">Keep me signed in</label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        <div class="col-md-12">
                            <x-form-main-btn class="col-md-4" name="Sign In"/>
                        </div>
                        @if(session('message'))
                            <x-error-message />
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
