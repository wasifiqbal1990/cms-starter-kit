@extends('layouts.rise.frontend.app')

@section('content')
    <div class="page-content bg-white">
        <!-- Slider Banner -->
        <!-- Main Slider -->
        <div class="owl-slider owl-carousel owl-theme owl-btn-center-lr dots-none">
            <div class="item slide-item">
                <div class="slide-item-img"><img src="{{imgPath('img/slider/main-slider/slide1.jpg')}}" class="" alt=""/></div>
                <div class="slide-content">
                    <div class="slide-content-box container">
                        <div class="slide-content-area">
                            <h2 class="slider-title">{{$sections['slider']->Media->first()->custom_properties['heading']}}</h2>
                            <p>{{$sections['slider']->Media->first()->custom_properties['description']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-item">
                <div class="slide-item-img"><img src="{{imgPath('img/slider/main-slider/slide2.jpg')}}" class="" alt=""/></div>
                <div class="slide-content">
                    <div class="slide-content-box container">
                        <div class="slide-content-area">
                            <h2 class="slider-title">RISE SCHOOL OF ACCOUNTANCY</h2>
                            <p>which is globally recognized by the ICAP is making its ways by achieving medals and certificates. Signature Qualification that empowers to lead. Leader of the Future.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Banner -->
        <div class="content-block">
            <div class="section-full bg-gray content-inner-2">
                <div class="container">
                    <div class="row">
                        <div class="courses-carousel owl-carousel owl-btn-center-lr owl-btn-3 col-md-12 p-lr0">
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/1.png')}}" alt=""/>
                                    <h2 class="title">Faculty</h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/2.png')}}" alt=""/>
                                    <h2 class="title">Campuses</h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/3.png')}}" alt=""/>
                                    <h2 class="title">Libraries</h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/4.png')}}" alt=""/>
                                    <h2 class="title">Computer Lab</h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/5.png')}}" alt=""/>
                                    <h2 class="title">Girls Room</h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="courses-bx">
                                    <img src="{{imgPath('img/icon/6.png')}}" alt=""/>
                                    <h2 class="title">Testing System</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us -->
            <div class="section-full bg-white content-inner-2" style="background-image:url({{imgPath('images/pattern/pt1.png')}});">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">{{$sections['second']->title}}</h2>
                        <p class="ext">{{$sections['second']->short_description}}</p>
                    </div>
                    <div class="row align-items-center about-bx2">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <!-- Main Slider -->
                            <div class="owl-slider owl-carousel owl-theme owl-btn-center-lr dots-none">
                                @foreach($sections['third']->Media as $media )
                                <div class="item slide-item">
                                    <div class="slide-item-img">
                                        <img src="{{$media->getUrl()}}" class="" alt=""/>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Slider Banner -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="about-box">
                                <h3 class="title"> {{$sections['third']->title}} </h3>
                                <p class="ext">{{$sections['third']->short_description}}</p>
                                <p>{{$sections['third']->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-full bg-gray content-inner-2 about-bx">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">{{$sections['fourth']->title}}</h2>
                    </div>
                    <div class="courses-carousel-2 owl-carousel owl-btn-center-lr owl-btn-3">
                       @foreach($sections['fourth']->Media as $media)
                        <div class="item">
                            <div class="courses-bx-2">
                                <img src="{{$media->getUrl()}}" alt=""/>
                                <div class="info">
                                    <h2 class="title"><a href="">{{$media->custom_properties['heading']}}</a></h2>
                                    <p>{{$media->custom_properties['description']}}</p>
                                    <button name="submit" type="submit" value="Submit" class="btn"> <span>Submit</span> </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="section-full content-inner-2 bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="action-box">
                                <div class="head">
                                    <h4 class="title">Notifications</h4>
                                </div>
                                <div class="action-area marquee1">
                                    <ul>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                        <li><a href="">Lorem ipsum, or lipsum as.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="action-box">
                                <div class="head">
                                    <h4 class="title">Events</h4>
                                </div>
                                <div class="action-area">
                                    <ul class="event-bx">
                                        <li><a href="">New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.</a></li>
                                        <li><a href="">New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.</a></li>
                                        <li><a href="">New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="action-box">
                                <div class="head">
                                    <h4 class="title">Blogs / Articles</h4>
                                </div>
                                <div class="action-area">
                                    <ul class="blog-artical">
                                        <li>
                                            <a href="">
                                                <div class="date">
                                                    <span>10</span>
                                                    <strong>Jan</strong>
                                                </div>
                                                <h5 class="title">Preparation Strategy for ACCA-CA.</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <div class="date">
                                                    <span>21</span>
                                                    <strong>AUG</strong>
                                                </div>
                                                <h5 class="title">Preparation Strategy for ACCA-CA.</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <div class="date">
                                                    <span>06</span>
                                                    <strong>Mar</strong>
                                                </div>
                                                <h5 class="title">Preparation Strategy for ACCA-CA.</h5>
                                            </a>
                                        </li>
                                    </ul>
                                    <a href="" class="btn btn-sm">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-full content-inner bg-white" style="background-image:url({{imgPath('images/background/bg1.jpg')}})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 student-bx">
                            <div class="section-head">
                                <h2 class="title">Testimonials</h2>
                                <div class="dlab-separator bg-primary"></div>
                            </div>
                            <div class="client-carousel owl-carousel owl-theme owl-none">
                                <div class="item">
                                    <div class="client-box">
                                        <div class="testimonial-text">
                                            <p>What we are today is what we represent tommorow. This feeling makes me proud and enhance me to make some enthusiastic move in my career with Rise.</p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic radius">
                                                <img src="{{imgPath('img/logo/03.jpg')}}" width="100" height="100" alt="">
                                            </div>
                                            <h5 class="testimonial-name m-t0 m-b5">Tipu Ansari</h5>
                                            <span>Rise Student</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="section-head">
                                <h2 class="title">Board of Directors</h2>
                                <div class="dlab-separator bg-primary"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src={{imgPath('img/team/6.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Amjad Bhatti</a></h4>
                                            <span>Director</span>
                                            <p>He is a renowned educationalist in the field of accountancy, the founder and CEO of Rise School of Accountancy.</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src="{{imgPath('img/team/4.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Naveed Ansari</a></h4>
                                            <span>Director Academics/Principal Garden Town Campus</span>
                                            <p>He is Principal at Garden Town Campus, Rise School of Accountancy.</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src="{{asset('img/team/1.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Adnan Rauf</a></h4>
                                            <span>Director & Faculty</span>
                                            <p>He is Principal at Garden Town Campus, Rise School of Accountancy.</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src="{{asset('img/team/2.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Name</a></h4>
                                            <span>Director Audit & Accounts</span>
                                            <p>He completed his articles from A. F. Ferguson & Co., (a member firm of PriceWaterhouseCoopers).</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src="{{asset('img/team/3.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Muhammad Asif</a></h4>
                                            <span>Director Audit & Accounts</span>
                                            <p>He completed his articles from A. F. Ferguson & Co., (a member firm of PriceWaterhouseCoopers).</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team-box">
                                        <div class="media"><img src="{{asset('img/team/5.jpg')}}" alt=""> </div>
                                        <div class="team-info">
                                            <h4 class="title"><a href="">Tanveer Ansari</a></h4>
                                            <span>Director Business Development/Principal Gulberg Campus</span>
                                            <p>He had been serving in Multinational and national organization in senior marketing positions.</p>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-full bg-white content-inner-2 enquiry-area" style="background-image:url(img/slider/form-img.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="enquiry-bx">
                                <div class="head">
                                    <h2 class="title">Quick Enquiry</h2>
                                    <p>Please fill the below form.</p>
                                </div>
                                <div class="dzFormMsg"></div>
                                <form method="post" class="dzForm" action="">
                                    <input type="hidden" value="Contact" name="dzToDo" >
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="dzName" type="text" required class="form-control" placeholder="Your Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="dzEmail" type="email" class="form-control" required  placeholder="Your Email Id" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <textarea name="dzMessage" rows="4" class="form-control" required placeholder="Your Message..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group recaptcha-box">
                                                <div class="input-group">
                                                    <div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                    <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button name="submit" type="submit" value="Submit" class="btn"> <span>Submit</span> </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
