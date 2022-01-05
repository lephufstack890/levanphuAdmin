@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email">
                                    <i class="fas fa-user"></i>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                                    <i class="fas fa-key"></i>
                                    <i onclick="myfunction()" class="far fa-eye"></i>
                                    <i onclick="myfunction()" class="far fa-eye-slash"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="offset-md-4 d-md-flex">
                                    <div class="w-50 checkbox-wrap-input">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="w-50 form__forgotpassword">
                                        @if (Route::has('password.request'))
                                            <a class="forgotpassword" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var x = true;
        function myfunction(){
            if(x){
                document.getElementById('password').type = "text";
                $('.fa-eye').show(100);
                $('.fa-eye-slash').hide(100);
                x=false;
            }else{
                document.getElementById('password').type = "password";
                $('.fa-eye').hide(100);
                $('.fa-eye-slash').show(100);
                x=true;
            }
        }
    </script>
@endsection
