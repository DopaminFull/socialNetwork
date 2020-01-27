@extends('layouts.app')
@section('title' , 'Sign Up')
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
                                    <p>Cdma,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                </div><!--cm-logo end-->
                                <img src="images/cm-main-img.png" alt="">
                            </div><!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">

                                <div class="sign_in_sec current" id="tab-1">

                                    <h3>Sign up</h3>
                                    <div class="signup-tab mt-1">
                                        <ul>
                                            <li data-tab="tab-3" class="current" id="user"><a href="#" title="">User</a></li>
                                            <li data-tab="tab-4" id="company"><a href="#" title="" >Company</a></li>
                                        </ul>
                                    </div><!--signup-tab end-->
                                    <!-- User sign up -->
                                    <div class="dff-tab current" id="tab-3">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <!-- Name -->
                                                <div class="col-lg-12 no-pdd">
                                                  @error('name')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Full Name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </span>
                                                </div>
                                                <!-- Email -->

                                                <div class="col-lg-12 no-pdd">
                                                    @error('email')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email...">
                                                        <i class="far fa-envelope-open"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    @error('password')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">

                                                    <div class="sn-field">
                                                        <input type="password" name="password_confirmation" placeholder="Repeat Password" class="form-control">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="type" value="user">
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Join us</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div><!--dff-tab end-->
                                    <!--company sign up-->
                                    <div class="dff-tab" id="tab-4">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    @error('companyName')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input type="text" name="companyName" class="form-control @error('companyName') is-invalid @enderror" placeholder="Company Name">
                                                        <i class="la la-building"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <select name="typ">
                                                            <option value="agent">Agent</option>
                                                            <option value="garage">Garage</option>
                                                        </select>
                                                        <i class="la la-dropbox"></i>
                                                        <span><i class="fa fa-ellipsis-h"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    @error('companyEmail')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input type="text" name="companyEmail" class="form-control @error('companyEmail') is-invalid @enderror" placeholder="Email...">
                                                        <i class="la la-building"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    @error('companyPassword')
                                                    <div class="alert alert-danger" role="alert">
                                                        <span style="font-size: 9px">{{$message}}</span>
                                                    </div>
                                                    @enderror
                                                    <div class="sn-field">
                                                        <input type="password" name="companyPassword" placeholder="Password" class="form-control">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">

                                                    <div class="sn-field">
                                                        <input type="password" name="c_password_confirmation" placeholder="Repeat Password" class="form-control">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="type" value="company">
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Join us</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div><!--dff-tab end-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div><!--signin-pop end-->
            </div><!--signin-popup end-->
    @endsection
@section('js')
    <script >
        if('{{old('type')}}'==='company'){
           $('#company').addClass('current');
           $('#user').removeClass('current');
            $('#tab-4').addClass('current');
            $('#tab-3').removeClass('current');
        }
    </script>
    @endsection
