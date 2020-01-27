<header class="fixed-top">
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="{{ route('home') }}" title=""><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <Search></Search>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}" title="">
                            <span><img src="{{ asset('images/icon1.png') }}" alt=""></span>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#" title="" class="not-box-openm">
                            <span><img src="{{ asset('images/icon6.png') }}" alt=""></span>
                            Messages
                        </a>
                        <div class="notification-box msg" id="message">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="{{ asset('images/resources/ny-img1.png') }}" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <div class="view-all-nots">
                                    <a href="messages.html" title="">View All Messsages</a>
                                </div>
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                    <li>
                        <Notification :auth="{{auth()->user()}}"></Notification>
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class=" menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info w-75">
                    <img src={{"https://randomuser.me/api/portraits/men/".Auth::id().".jpg"}} alt=""
                        style="height:30px ; width:30px">
                    <a href="#" title=""></a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss" id="users">
                    <h3>
                        <i class="fas fa-user-circle mr-2"></i>
                        Hi <a href="{{ route('profile', ['user' => Auth::id()]) }}"
                            title="">{{ auth()->user()->fullName() }}</a>
                    </h3>
                    <h3>Setting</h3>
                    <ul class="us-links">
                        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                        <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Logout</button>
                    </form>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>