<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{imgPath('img/logo/favicon.png')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">

    <!-- PAGE TITLE HERE -->
    <title>RISE ABOVE THE REST</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
    <script src="{{jsPath('rise/js/html5shiv.min.js')}}"></script>
    <script src="{{cssPath('rise/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{cssPath('css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{cssPath('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{cssPath('css/main.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{cssPath('css/skin/skin-1.css')}}">
    @stack('css')
</head>
<body id="bg">
<div class="page-wraper">
    <div id="loading-area">
        <h1 class="ml4">
            <span class="letters letters-1">Rise</span>
            <span class="letters letters-2">School of</span>
            <span class="letters letters-3">Accountancy</span>
        </h1>
    </div>
    <div class="action-area marquee-head marquee">
        <ul>
            @foreach($notifications as $notification)
                <li><a href="{{$notification->url}}">{{$notification->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- header -->
    <header class="site-header header mo-left">
        <!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
                        <a href="index.php" class="dez-page"><img src="{{imgPath('img/logo/rise-logo.png')}}" alt=""></a>
                    </div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <div class="logo-header mostion">
                            <a href="index.php" class="Rise School"><img src="{{imgPath('img/logo/rise-logo.png')}}" alt=""></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#">About <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="mission.php">Mission</a></li>
                                    <li><a href="vision.php">Vision</a></li>
                                    <li><a href="gallery.php">Our Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Faculty <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="board-of-directors.php">Board of Directors</a></li>
                                    <li><a href="faculty-member.php">Faculty Member</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Department <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="departments.php">Information Technology</a></li>
                                    <li><a href="departments.php">Marketing</a></li>
                                    <li><a href="departments.php">Human Resources (HR)</a></li>
                                    <li><a href="departments.php">Quality Assurance</a></li>
                                    <li><a href="departments.php">Coordination</a></li>
                                    <li><a href="departments.php">Admin</a></li>
                                    <li><a href="departments.php">Online Classes</a></li>
                                </ul>
                            </li>
                            <li><a href="#">CA <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="elugibility-criteria.php">Elugibility Criteria</a></li>
                                    <li><a href="course-structure.php">Course Structure</a></li>
                                    <li><a href="examination.php">Examination</a></li>
                                    <li><a href="profisional-body.php">Profisional Body</a></li>
                                    <!--li><a href="distinctive-features.php">Distinctive Features</a></li-->
                                    <!--li><a href="fee-structure.php">Fee Structure</a></li-->
                                    <li><a href="batches-schedule.php">Batches Schedule</a></li>
                                    <li><a href="pcsc.php">PCSC</a></li>
                                    <!--li><a href="cfap.php">CFAP</a></li-->
                                </ul>
                            </li>
                            <li><a href="#">Our Courses <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="acca.php">ACCA</a></li>
                                    <li><a href="cia.php">CIA</a></li>
                                    <li><a href="cma.php">CMA (USA)</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Admissions Open</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li style="margin-left: 50px; background-color: #ec1e28;"><a href="register.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
