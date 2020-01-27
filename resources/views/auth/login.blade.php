@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <div class="wrapper">

        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="images/cm-logo.png" alt="">
                                    <p>Workwise,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                </div><!--cm-logo end-->
                                <img src="images/cm-main-img.png" alt="">
                            </div><!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec mt-5">

                                <div class="sign_in_sec current" id="tab-1">

                                    <h3>Sign in</h3>
                                    @error('email')
                                        <div class="alert alert-danger mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    @if(session('success'))
                                        <div class="alert alert-success mb-3" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control text-dark @error('email') is-invalid @enderror">
                                                    <i class="la la-user"></i>
                                                </div><!--sn-field end-->
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                @error('password')
                                                <div class="alert alert-danger mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                                <div class="sn-field">
                                                    <input type="password" name="password" placeholder="Password" class="form-control text-dark @error('password') is-invalid @enderror">
                                                    <i class="la la-lock"></i>

                                                </div>


                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="remember" id="c1">
                                                        <label for="c1">
                                                            <span></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div><!--fgt-sec end-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Sign in</button>
                                            </div>
                                            <div class="col p-4 text-center">
                                                <a href="{{ route('register') }}">Don't have account?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--sign_in_sec end-->

                            </div><!--login-sec end-->
                        </div>
                    </div>
                </div><!--signin-pop end-->
            </div><!--signin-popup end-->
        </div>
    </div>
@endsection
