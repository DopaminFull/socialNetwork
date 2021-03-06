@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="wrapper bg-white">


    <section class="cover-sec">
        <img src="{{ $user->getCover() }}" alt=""  id="coverPicture" data-toggle="modal" data-target="#imagePicker">
    </section>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img src="{{$user->getAvatar()}}"
                                             id="profilePicture" data-toggle="modal" data-target="#imagePicker">
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-hr">
                                            @if(!$user->isMe())
                                            <li>
                                                <Follow :user="{{$user}}" :auth="{{auth()->user()}}"
                                                    :is_following="{{auth()->user()->follows($user->id)?'true':'false'}}">
                                                </Follow>
                                            </li>
                                            @endif
                                        </ul>
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b>{{$user->followings->count()}}</b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b>{{$user->followers->count()}}</b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Suggestions</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('images/resources/s1.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div>
                                    <!--suggestions-list end-->
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->client->full_name }}</h3>
                                    <div class="tab-feed">
                                        <ul>
                                            <li data-tab="feed-dd" class="active">
                                                <a href="#" title="">

                                                    <span> <i class="fas fa-home"></i> Home</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd">
                                                <a href="#" title="">

                                                    <span><i class="fas fa-info"></i> Info</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">

                                                    <span><i class="far fa-folder-open"></i> Media</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{"https://randomuser.me/api/portraits/men/".$user->id.".jpg"}}"
                                                        alt="" style="width:50px ; height:50px">
                                                    <div class="usy-name">
                                                        <h3>{{$user->fullName()}}</h3>
                                                        <span><img src="{{asset('images/clock.png')}}" alt="">3 min
                                                            ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Edit Post</a></li>
                                                        <li><a href="#" title="">Unsaved</a></li>
                                                        <li><a href="#" title="">Unbid</a></li>
                                                        <li><a href="#" title="">Close</a></li>
                                                        <li><a href="#" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">


                                            </div>
                                            <div class="job_descp mt-3">


                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                                    luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                                    magna sit amet Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit. Ipsa laudantium odio repudiandae veniam.

                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com mt-4 w-100">

                                                    <li><a href="#" class="com"><i class="fas fa-heart"></i> Likes
                                                            54</a></li>
                                                    <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                            Comments 15</a></li>
                                                    <li class="float-right"><a href="#" class="com "><i
                                                                class="fas fa-eye"></i>Views 50</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <!--post-bar end-->
                                        <!--post-bar end-->
                                        <div class="process-comm">
                                            <div class="spinner">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                        <!--process-comm end-->
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3>Overview</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
                                            aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec
                                            urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo
                                            viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac
                                            magna convallis bibendum. Quisque laoreet augue eget augue fermentum
                                            scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor
                                            neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                                    </div>
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        <h3>Portfolio</h3>
                                        <div class="gallery_pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="{{ asset('images/resources/pf-img1.jpg') }}" alt="">
                                                        <a href="#" title=""><img
                                                                src="{{ asset('images/all-out.png') }}" alt=""></a>
                                                    </div>
                                                    <!--gallery_pt end-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--gallery_pf end-->
                                    </div>
                                    <!--portfolio-gallery-sec end-->
                                </div>
                                <!--product-feed-tab end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            @if(!$user->isMe())
                            <div class="right-sidebar">
                                <div class="message-btn">
                                    <a href="#" title=""><i class="fa fa-envelope"></i> Message</a>
                                </div>
                            </div>
                            @endif
                            <!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>


    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    <li><a href="help-center.html" title="">Help Center</a></li>
                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="forum.html" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="{{ asset('images/copy-icon2.png') }}" alt="">Copyright 2019</p>
                <img class="fl-rgt" src="{{ asset('images/logo2.png') }}" alt="">
            </div>
        </div>
    </footer>
    <!--footer end-->


    <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form>
                <input type="text" name="pf-name" placeholder="Portfolio Name">
                <div class="file-submit">
                    <input type="file" name="file">
                </div>
                <div class="pf-img">
                    <img src="{{ asset('images/resources/np.png') }}" alt="">
                </div>
                <input type="text" name="website-url" placeholder="htp://www.example.com">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
</div>

@if($user->isMe())
        <!-- Modal upload profile pictures -->
        <div class="modal fade" id="imagePicker" tabindex="-1" role="dialog" aria-labelledby="imagePickerCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pick image</h5>
                    </div>
                    <div class="modal-body">
                        <div id="imgToCropContainer" style="width: 800px;height: 250px;">
                            <img id="croppedImg" src="">
                        </div>
                        <input type="file" id="pickImg" class="form-control"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="float-right" id="uploadProfile">Upload</button>
                        <button type="button" class="float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endif

@endsection

@if($user->isMe())
    @section('css')
        <link rel="stylesheet" type="text/css" href={{asset("css/cropperjs.css")}}>
    @endsection
    @section('js')
    <script>

        $(()=>{

            // Global vars
            var cropper;
            var type;
            var ratio;

            // Register clicks
            $('#uploadProfile').click(upload);
            $('#coverPicture').click(()=>{
                type = 'cover';
                ratio = 4.2;
                setUpReaderCropper();
            });
            $('#profilePicture').click(()=>{
                type = 'avatar';
                ratio = 1.1;
                setUpReaderCropper();
            });

            // Set up image input file
            $('#pickImg').on('change', function(e){
                setUpReaderCropper();
            });

            function setUpReaderCropper() {
                const reader = new FileReader();
                reader.onload = function(){
                    const img = new Image();
                    img.src = reader.result;
                    img.id = 'croppedImg';                  // Remember we're give it the same ID, so we can reference it later
                    img.width = 1270;
                    img.height = 720;
                    img.display = 'block';
                    img.maxWidth = 100;
                    $('#imgToCropContainer').empty();       // Clear the container
                    $('#imgToCropContainer').append(img);   // Then append it

                    // init Cropper
                    image = document.querySelector('#croppedImg');
                    if(cropper)
                        cropper.reset();

                    cropper = new Cropper(image, {
                        aspectRatio: ratio,
                        scalable: false,
                        background: false,
                        cropBoxResizable: false,
                        movable: false,
                        dragMode: 'move',
                        crop(event) {},
                    });
                };

                reader.readAsDataURL($('#pickImg').prop('files')[0]);
            }

            // Handle upload click
            function upload() {
                const width = type == 'avatar' ? 160 : 1200;
                const height = type == 'avatar' ? 160 : 170;
                const base64 = cropper.getCroppedCanvas({imageSmoothingQuality:'medium', width: width, height: height})
                                      .toDataURL('image/jpeg');
                const block = base64.split(';');
                const contentType = block[0].split(':')[1];
                const realData = block[1].split(',')[1];
                const img = BlobUtil.base64StringToBlob(realData, contentType);
                const config = {
                    header : {
                        'Content-Type' : 'multipart/form-data'
                    }
                };
                const data = new FormData();
                data.append('img', img);
                data.append('type', type);
                console.log('type is: '+type);

                axios.post('{{ route('uploadprofile') }}', data, config)
                     .then(res=>{window.location.reload()})
                     .catch(err=>console.error(err));
            }

        });
    </script>
@endsection
@endif
