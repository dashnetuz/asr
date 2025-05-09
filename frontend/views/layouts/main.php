<?php
/** @var $content */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Setting;
use yii\helpers\Url;

$setting = Setting::findOne(1);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= $setting && $setting->favicon ? Html::encode($setting->favicon) : '/template/assets/images/logos/favicon.png' ?>" type="image/png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--Header Section start-->
<header class="main_header_area position-absolute w-100">

    <div class="header-content text-white">
        <div class="container">
            <div class="header-content-inner py-2">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="social-links ">
                            <ul class="m-0 p-0">
                                <li class="d-inline">
                                    <a href="#">
                                        <i class="fa fa-facebook border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <i class="fa fa-twitter border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <i class="fa fa-google border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <i class="fa fa-instagram border-social rounded-circle text-center"></i>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <i class="fa fa-youtube-play border-social rounded-circle text-center "></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-event-info text-end">
                            <ul class="m-0 p-0">
                                <li class="px-2 border-end border-lightgrey border-opacity-50 d-inline">
                                    <i class="fa fa-phone pe-1"></i>
                                    <small>+998 90 005 97 99</small>
                                </li>
                                <li class=" px-2 d-inline ">
                                    <i class="fa fa-clock-o pe-1"></i>
                                    <small>Mon - Fri: 9:00 - 18:00</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="header_menu " id="header_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-2">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="navbar-brand m-0">
                            <img src="<?= $setting->logo_bottom ?>" alt="Logo" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 ">
                        <div class="collapse navbar-collapse justify-content-center" id="bs-example-navbar-collapse-1">
                            <ul class="navbar-nav align-items-center" id="responsive-menu">
                                <li class="nav-item ">
                                    <a class="nav-link px-2 my-4 py-0 text-white" aria-current="page" href="<?= Url::to(['/']) ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="#">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle px-2 my-4 py-0 text-white" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu bg-lightgrey p-0 rounded">
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Sponsors</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Gallery</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Pricing</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0" href="#">Faq</a>
                                        </li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Testimonials</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Product List</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Product Single</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0" href="#">404
                                                Error</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Search Result</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle px-2 my-4 py-0 text-white" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        News
                                    </a>
                                    <ul class="dropdown-menu bg-lightgrey p-0 rounded">
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">News List</a></li>
                                        <li><a class="dropdown-item py-3 px-6 text-capitalize black border-0"
                                               href="#">News Single</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 my-4 py-0 text-white" href="#">Other views</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="menu-search text-end">
                            <a href="#search1" class="mt_search">
                                <i class="fa fa-search fa-lg me-5 text-white"></i>
                            </a>
                            <a class="btn btn3" href="#">Login with INHA<i class="fa fa-long-arrow-right ms-4"></i></a>
                        </div>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </nav>
        </div>
        <div id="search1">
            <button type="button" class="close">×</button>
            <form>
                <input class="form-control form-control-lg rounded text-white" placeholder="Search...">
            </form>
            <button type="button" class="btn"><i class="fa fa-search text-white" aria-hidden="true"></i></button>
        </div>

    </div>
    <!-- Navigation Bar Ends -->
</header>
<!-- Header section ends -->

<!-- Bannner section starts -->
<section class="banner position-relative pb-0">
    <div class="overlay">
    </div>
    <div class="container">
        <div class="inner-banner position-relative text-white ">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="banner-left text-center pb-lg-5 p-md-0">
                        <div class="banner-image">
                            <img src="<?= $setting->logo ?>" alt="banner-image" class="w-50"><br>
                        </div>
                        <div class="countdown">
                            <div id="countdown"
                                 class="countdown-inner d-flex w-100 bg-white p-2 rounded-5 justify-content-center box-shadow position-relative z-2">
                                <div class="time m-auto py-4 ">
                                    <span id="days" class="lh-1 h1 fw-bold"></span><br>
                                    <small class="text-secondary">Days</small>
                                </div>

                                <div class="time  m-auto py-4">
                                    <span id="hours" class="lh-1 h1 fw-bold"></span><br>
                                    <small class="text-secondary">Hours</small>
                                </div>

                                <div class="time  m-auto py-4">
                                    <span id="minutes" class="lh-1 h1 fw-bold"></span><br>
                                    <small class="text-secondary">Minutes</small>
                                </div>

                                <div class="time  m-auto py-4">
                                    <span id="seconds" class="lh-1 h1 fw-bold"></span><br>
                                    <small class="text-secondary">Seconds</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="banner-right  ms-2 text-center text-lg-start pb-8">
                        <div class="banner-title pb-3">
                            <h4 class="text-white pb-3">UPCOMING NEW <span class="pink">EVENT</span> 2025</h4>
                            <h1 class="text-white">STARTUP <span class="pink">GLOBAL</span> SITE</h1>
                        </div>
                        <div class="banner-event-info pb-3">
                            <ul class="m-0 ps-0 d-sm-flex justify-content-center justify-content-lg-start list-unstyled">
                                <li class="pe-2 border-end border-1 border-lightgrey">
                                    <i class="fa  fa-calendar-o pe-1"></i> 22-24 MAY 2025
                                </li>
                                <li class="ps-2">
                                    <i class="fa  fa-map-marker pe-1"></i>TASHKENT, UZB
                                </li>
                            </ul>
                        </div>
                        <div class="event-discription">
                            <p class="pb-4 m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deserunt distinctio eum expedita facere id in ipsam, itaque necessitat.</p>
                            <div class="banner-button">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <a class="btn me-3 my-1 w-100" href="#">LOG IN with INHA</a>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <a class="btn btn2 my-1 w-100" href="#">VIEW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wave overflow-hidden position-absolute w-100 z-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
             class="d-block position-relative">
            <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
          c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
          c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
        </svg>
    </div>
</section>
<!--Banner Section end-->

<!--Overview Section start-->
<section class="overview pb-0">
    <div class="container">
        <div class="inner-overview pb-10 position-relative border-dashed-bottom-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="overview-left text-center text-lg-start">
                        <div class="overview-title pb-4">
                            <p class="mb-1 pink">OVERVIEW</p>
                            <h2 class="mb-2">GET THE LATEST INFO ABOUT <span class="pink">ASR.GOV.UZ</span></h2>
                            <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.</P>
                            <p class="mb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.</p>
                        </div>
                        <div class="overview-event-info pb-6 g-4 text-start position-absolute">
                            <div class="row justify-content-around ">
                                <div class="col-lg-6 col-md-6">
                                    <a>
                                        <div class="event-info-box align-items-center d-flex p-4 rounded bg-white box-shadow my-2">
                                            <div class="event-info-icon text-center ">
                                                <i class="fa fa-map-marker  text-white bg-pink rounded-circle me-3"></i>
                                            </div>
                                            <div class="location-info">
                                                <h5 class="mb-1">WHERE</h5>
                                                <small>Birmingham City Park Hall, London, UK</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a>
                                        <div class="event-info-box align-items-center d-flex p-4 rounded bg-white box-shadow my-2">
                                            <div class="event-info-icon text-center">
                                                <i class="fa fa-calendar-o  text-white bg-pink rounded-circle me-3"></i>
                                            </div>
                                            <div class="time-info">
                                                <h5 class="mb-1">WHEN</h5>
                                                <small>Wednesday To Thursday <br> Apr, 21-25, 2024</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="overview-img">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 p-0 ">
                                <div class="container-img-left mb-2">
                                    <div class="img-left-1 float-end w-lg-80">
                                        <img class="mb-2 w-100 rounded" src="/app/images/group/1.jpg" alt="group-image">
                                    </div>
                                    <div class="img-left-2">
                                        <img src="/app/images/group/2.jpg" alt="group-image" class="w-100 rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="container-img-right w-lg-75">
                                    <img src="/app/images/group/3.jpg" alt="group-image" class="w-100 rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Overview Section end-->

<!--Partners Section start-->
<section class="partners">
    <div class="container">
        <div class="partner-inner">
            <div class="partner-title text-center pb-6 w-lg-60 m-auto">
                <p class="mb-1 pink">OUR PARTNERS</p>
                <h2 class="mb-1">SPONSERS AND <span class="pink">PARTNERS</span></h2>
                <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                    id est laborum.</p>
            </div>
            <div class="partner-img pb-6">
                <div class="row row-cols-1 row-cols-lg-5 row-cols-md-5 ">
                    <div class="col p-0 border-end border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/1.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-sm-0">
                        <div class="p-2 partner-img-box text-center ">
                            <img src="/app/images/icon/2.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/3.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/4.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/5.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-top border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/3.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-top border-sm-0">
                        <div class="p-2 partner-img-box text-center">
                            <img src="/app/images/icon/4.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-top border-sm-0">
                        <div class="p-2 partner-img-box text-center ">
                            <img src="/app/images/icon/5.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-end border-top border-sm-0">
                        <div class="p-2 partner-img-box text-center ">
                            <img src="/app/images/icon/1.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                    <div class="col p-0 border-top border-0 border-sm-0">
                        <div class="p-2 partner-img-box text-center border-sm-0">
                            <img src="/app/images/icon/2.png" alt="partner-img" class="opacity-75 w-lg-75 w-md-100 w-40">
                        </div>
                    </div>
                </div>
            </div>
            <div class="partner-button text-center">
                <a class="btn" href="#">VIEW MORE SPONSERS</a>
            </div>
        </div>
    </div>
</section>
<!--Partners Section end-->

<!--Features Section start-->
<section class="feature text-white position-relative z-0 start-0">
    <div class="overlay z-n1">
    </div>
    <div class="container">
        <div class="feature-inner">
            <div class="counter text-center border-bottom border-white border-opacity-25">
                <div class="inner-counter mb-7">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 p-2 ">
                            <div class="counter-box p-2 border-end border-white border-opacity-25">
                                <h1 class="text-white m-0"><span class="num" data-val="50"></span><span>+</span></h1>
                                <p>Speakers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 p-2">
                            <div class="counter-box p-2 border-end border-white border-opacity-25">
                                <h1 class="text-white m-0"><span class="num" data-val="850"></span><span>+</span></h1>
                                <p>Attendence</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 p-2">
                            <div class="counter-box p-2 border-end border-white border-opacity-25">
                                <h1 class="text-white m-0"><span class="num" data-val="10"></span><span>+</span></h1>
                                <p>Workshops</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 p-2">
                            <div class="p-2">
                                <h1 class="text-white m-0"><span class="num" data-val="300"></span><span>+</span></h1>
                                <p class="mb-0">Journalist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-lists pt-8">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded text bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-address-book-o text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info ">
                                    <h5 class="text-white mb-2">LIVE STREAMING</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded  bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-comments text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h5 class="text-white mb-2">FIRESIDE CHATS</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-desktop text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h5 class="text-white mb-2">NETWORKING</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-cogs text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h5 class="text-white mb-2">HIGH VALUE LEARNING</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-gift text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h5 class="text-white mb-2">EXICITING GIVEAWAYS</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box py-7 px-6 rounded bg-black bg-opacity-25">
                            <a>
                                <div class="feature-box-icon mb-4">
                                    <i class="fa fa-graduation-cap text-white bg-pink rounded-circle text-center"></i>
                                </div>
                                <div class="feature-box-info">
                                    <h5 class="text-white mb-2">1-ON-1 SESSIONS</h5>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Features Section end-->

<!--Speakers Section Start-->
<section class="speakers">
    <div class="container">
        <div class="speaker-inner">
            <div class="speaker-title text-center p-2">
                <div class="row align-items-center ">
                    <div class="col-lg-6">
                        <div class="title-content  text-lg-start mb-2">
                            <p class="mb-1 pink">EVENT SPEAKERS</p>
                            <h2 class="mb-1">MEET OUR <span class="pink">SPEAKERS</span></h2>
                            <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="speaker-button text-lg-end">
                            <a class="btn my-2" href="#">VIEW MORE SPEAKERS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sepaker-list text-center text-white">
                <div class="row">
                    <div class=" col-lg-3 col-md-6 p-2">
                        <div class="speaker-box  position-relative overflow-hidden text-white">
                            <img class="speaker-image rounded w-100" src="/app/images/speakers/1.jpg" alt="speaker-image">
                            <div class="box-content position-absolute bottom-0 z-1">
                                <h6 class="speaker-title d-block text-white pb-1"><a href="#">GERARDO AMBROSE</a>
                                </h6>
                                <span class="speaker-post d-block pb-2">Marketing Expert</span>
                                <ul class="social-link pb-2 ps-0">
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-6 p-2">
                        <div class="speaker-box position-relative overflow-hidden">
                            <img class="speaker-image rounded w-100" src="/app/images/speakers/2.jpg" alt="speaker-image">
                            <div class="box-content position-absolute bottom-0 z-1">
                                <h6 class="speaker-title d-block text-white pb-1"><a href="#">GERARDO AMBROSE</a>
                                </h6>
                                <span class="speaker-post d-block pb-2">Marketing Expert</span>
                                <ul class="social-link pb-2 ps-0 position-relative">
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded d-block me-1"><i
                                                    class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="speaker-box position-relative overflow-hidden">
                            <img class="speaker-image rounded w-100" src="/app/images/speakers/3.jpg" alt="speaker-image">
                            <div class="box-content position-absolute bottom-0 z-1">
                                <h6 class="speaker-title d-block text-white pb-1"><a href="#">GERARDO AMBROSE</a>
                                </h6>
                                <span class="speaker-post d-block pb-2">Marketing Expert</span>
                                <ul class="social-link pb-2 ps-0">
                                    <li class="d-inline-block"><a href=" " class="rounded  d-block me-1"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    <li class="d-inline-block"><a href=" " class="rounded  d-block me-1"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li class="d-inline-block"><a href=" " class="rounded  d-block me-1"><i
                                                    class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="speaker-box position-relative overflow-hidden">
                            <img class="speaker-image rounded w-100" src="/app/images/speakers/4.jpg" alt="speaker-image">
                            <div class="box-content position-absolute bottom-0 z-1">
                                <h6 class="speaker-title d-block text-white pb-1"><a href="#">GERARDO AMBROSE</a>
                                </h6>
                                <span class="speaker-post d-block pb-2">Marketing Expert</span>
                                <ul class="social-link pb-2 ps-0">
                                    <li class="d-inline-block"><a href="#" class="rounded  d-block me-1"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded  d-block me-1"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li class="d-inline-block"><a href="#" class="rounded  d-block me-1"><i
                                                    class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Speakers Section end-->

<!--Ticketbook Section start-->
<section class="ticket position-relative">
    <div class="overlay">
    </div>
    <div class="container">
        <div class="ticket-inner w-lg-75 mx-auto text-center position-relative text-white">
            <div class="ticket-title">
                <h5 class="text-white mb-1">LET'S DO IT HURRY</h5>
                <h1 class="text-white mb-2">HAVEN'T BOOKED YOUR SEAT YET?
                    <span class="spin pink d-inline-block">G</span><span class="spin pink d-inline-block">E</span><span
                            class="spin pink d-inline-block">T</span> <span class="spin pink d-inline-block">T</span><span
                            class="spin pink d-inline-block">I</span><span class="spin pink d-inline-block">C</span><span
                            class="spin pink d-inline-block">K</span><span class="spin pink d-inline-block">E</span><span
                            class="spin pink d-inline-block">T</span>
                </h1>
            </div>
            <div class="ticket-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                    pulvinar dapibus leo.</p>
                <div class="ticket-button">
                    <a class="btn btn1" href="#">GET TICKETS NOW</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Ticketbook Section end-->

<!--Schedules Section start-->
<section class="schedules">
    <div class="container">
        <div class="schedule-inner">
            <div class="schedule-title text-center mb-6 w-lg-60 mx-auto">
                <p class="mb-1 pink">OUR SCHEDULES</p>
                <h2 class="mb-1">FOLLOW <span class="pink">EVENT</span> SCHEDULES</h2>
                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                    mattis, pulvinar dapibus leo.</p>
            </div>
            <div class="schedule-list-outer">
                <div class="schedule-list-top mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="schedule-day text-center text-sm-start py-6 position-relative ps-2 z-1">
                                <h4 class="pink mb-2">1ST DAY</h4>
                                <h6 class="mb-2">APRIL 23, 2024</h6>
                                <P>William Mathew Theater<br>
                                    2390 NW 2nd Ave, Miami, FL 33127</P>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="schedule-list  text-center text-sm-start">
                                <div class=" schedule-list-box bg-lightgrey   border border-white border-2 rounded px-6 py-4 mb-5">
                                    <div class="schedule-box-title">
                                        <h5 class="mb-2"><a href="#" class="black">REGISTRATION & BREAKFAST</a></h5>
                                    </div>
                                    <div class="schedule-box-info">
                                        <p class="mb-2"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                                luctus nec ullamcorper mattis, pulvinar dapibus leo, luctus nec ullamcorper mattis, pulvinar
                                                dapibus leo.</small></p>
                                        <ul class="mb-2 p-0">
                                            <li class="d-inline"><i class="fa fa-clock-o pink me-2" aria-hidden="true"></i><small>08:30 -
                                                    09:30 AM</small></li>
                                            <li class="d-inline"><i class="fa fa-thumb-tack pink mx-2"
                                                                    aria-hidden="true"></i><small>Exploration Hall</small></li>
                                        </ul>
                                    </div>
                                    <div class="schedule-box-bio d-md-flex">
                                        <div class="schedule-bio-image ">
                                            <img src="/app/images/team/1.jpg" alt="team-image" class="me-2 rounded-circle">
                                        </div>
                                        <div class="schedule-bio-info">
                                            <p class="mt-1 mb-0"><a href="#" class="pink">JESUS HOLLAND</a></p>
                                            <small>Host & Speaker</small>
                                        </div>
                                    </div>
                                </div>
                                <div class=" schedule-list-box bg-white border-lightgrey border border-2 rounded px-6 py-4">
                                    <div class="schedule-box-title">
                                        <h5 class="mb-2"><a href="#" class="black">SPEED: MARKETING MASTER!</a></h5>
                                    </div>
                                    <div class="schedule-box-info">
                                        <p class="mb-2"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                                luctus nec ullamcorper mattis, pulvinar dapibus leo, luctus nec ullamcorper mattis, pulvinar
                                                dapibus leo.</small></p>
                                        <ul class="mb-2 p-0">
                                            <li class="d-inline"><i class="fa fa-clock-o pink me-2" aria-hidden="true"></i><small>08:30 -
                                                    09:30 AM</small></li>
                                            <li class="d-inline"><i class="fa fa-thumb-tack pink mx-2"
                                                                    aria-hidden="true"></i><small>Exploration Hall</small></li>
                                        </ul>
                                    </div>
                                    <div class="schedule-box-bio d-md-flex">
                                        <div class="schedule-bio-image">
                                            <img src="/app/images/team/2.jpg" alt="team-image" class="me-2 rounded-circle">
                                        </div>
                                        <div class="schedule-bio-info">
                                            <p class="mt-1 mb-0"><a href="#" class="pink">NELSON KETY</a></p>
                                            <small>Host & Speaker</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="schedule-title-bottom">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="schedule-day text-center position-relative text-sm-start py-6 ps-2 z-1">
                                <h4 class=" pink mb-2">2ND DAY</h4>
                                <h6 class="mb-2">APRIL 24, 2024</h6>
                                <P>William Mathew Theater<br>
                                    2390 NW 2nd Ave, Miami, FL 33127</P>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="schedule-list text-center text-sm-start">
                                <div class=" schedule-list-box bg-lightgrey   border border-white border-2 rounded px-6 py-4 mb-5">
                                    <div class="schedule-box-title">
                                        <h5 class="mb-2"><a href="#" class="black">REGISTRATION & BREAKFAST</a></h5>
                                    </div>
                                    <div class="schedule-box-info">
                                        <p class="mb-2"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                                luctus nec ullamcorper mattis, pulvinar dapibus leo, luctus nec ullamcorper mattis, pulvinar
                                                dapibus leo.</small></p>
                                        <ul class="mb-2 p-0">
                                            <li class="d-inline"><i class="fa fa-clock-o pink me-2" aria-hidden="true"></i><small>08:30 -
                                                    09:30 AM</small></li>
                                            <li class="d-inline"><i class="fa fa-thumb-tack pink mx-2"
                                                                    aria-hidden="true"></i><small>Exploration Hall</small></li>
                                        </ul>
                                    </div>
                                    <div class="schedule-box-bio d-md-flex">
                                        <div class="schedule-bio-image">
                                            <img src="/app/images/team/3.jpg" alt="team-image" class="me-2 rounded-circle">
                                        </div>
                                        <div class="schedule-bio-info">
                                            <p class="mt-1 mb-0"><a href="#" class="pink">PEELRS HELM</a></p>
                                            <small>Host & Speaker</small>
                                        </div>
                                    </div>
                                </div>
                                <div class=" schedule-list-box bg-white border-lightgrey border border-2 rounded px-6 py-4 mb-5">
                                    <div class="schedule-box-title">
                                        <h5 class="mb-2"><a href="#" class="black">EXPLORATIONS OF NEW APPROACHES</a></h5>
                                    </div>
                                    <div class="schedule-box-info">
                                        <p class="mb-2"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                                luctus nec ullamcorper mattis, pulvinar dapibus leo, luctus nec ullamcorper mattis, pulvinar
                                                dapibus leo.</small></p>
                                        <ul class="mb-2 p-0">
                                            <li class="d-inline"><i class="fa fa-clock-o pink me-2" aria-hidden="true"></i><small>08:30 -
                                                    09:30 AM</small></li>
                                            <li class="d-inline"><i class="fa fa-thumb-tack pink mx-2"
                                                                    aria-hidden="true"></i><small>Exploration Hall</small></li>
                                        </ul>
                                    </div>
                                    <div class="schedule-box-bio d-md-flex">
                                        <div class="schedule-bio-image">
                                            <img src="/app/images/team/1.jpg" alt="team-image" class="me-2 rounded-circle">
                                        </div>
                                        <div class="schedule-bio-info">
                                            <p class="mt-1 mb-0 pink"><a href="#" class="pink">JESUS HOLLAND</a></p>
                                            <small>Host & Speaker</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-button mt-6">
                                    <a class="btn" href="#">VIEW MORE DETAILS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Schedules Section end-->

<!--Pricing Section start-->
<section class="price bg-lightgrey">
    <div class="container">
        <div class="price-inner text-center">
            <div class="price-title mb-7 w-lg-60 m-auto">
                <p class="mb-1 pink">PRICING TABLE</p>
                <h2 class="mb-1">EXPLORE FLEXIBLE <span class="pink">PRICING</span> PLANS</h2>
                <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                    id est laborum.</p>
            </div>
            <div class="price-options g-2 pb-6">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="ticket-box">
                            <div class="ticket-box-inner bg-white position-relative rounded-bottom-5">
                                <img src="/app/images/pattern/1.png" alt="pattern" class="w-100 pattern position-absolute rounded-top">
                                <div class="ticket-title">
                                    <h4 class="pt-6  mb-1">BASIC TICKET</h4>
                                    <p>Stander Package</p>
                                </div>
                                <div class="ticket-price bg-white py-6">
                                    <div class="ticket-price-inner d-flex justify-content-center align-items-start black fw-bold">
                                        <span class="me-1 mb-0 currency">$</span>
                                        <span class="me-1 m-0 dollor">19</span>
                                        <span class="me-1 mb-0 cents">99</span>
                                    </div>
                                    <p class="m-0">Person</p>
                                </div>
                                <div class="benifit-list bg-white px-5">
                                    <ul class="m-auto p-0 list-unstyled">
                                        <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                            <p class="my-1"><small>Second Balcony Seat</small></p>
                                        </li>
                                        <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                            <p class="my-1"><small>Snack & software</small></p>
                                        </li>
                                        <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                            <p class="my-1"><small>Certificates</small></p>
                                        </li>
                                        <li class="pt-2 border border-0 text-capitalize lh-1">
                                            <p class="my-1"><small>Private access</small></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ticket-button  m-auto p-6">
                                    <a class="btn" href="#">PURCHASE</a>
                                    <p class="mt-4"><small>*Please read our term and condition before order ticket</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="ticket-box-inner bg-white position-relative rounded-bottom-5">
                            <img src="/app/images/pattern/2.png" alt="pattern" class="w-100 pattern position-absolute rounded-top">
                            <div class="ticket-title py-6 bg-pink text-white ">
                                <h4 class="text-white  mb-1">SILVER TICKET</h4>
                                <p>Pro Package</p>
                            </div>
                            <div class="ticket-price bg-white py-6">
                                <div class="ticket-price-inner d-flex justify-content-center align-items-start fw-bold">
                                    <span class="me-1 mb-0 currency pink">$</span>
                                    <span class="me-1 m-0 dollor pink">39</span>
                                    <span class="me-1 mb-0 cents pink">99</span>
                                </div>
                                <p class="m-0">Person</p>
                            </div>
                            <div class="benifit-list bg-white">
                                <ul class=" m-auto p-0 list-unstyled">
                                    <li class="pb-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Second Balcony Seat</small></p>
                                    </li>
                                    <li class="py-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Snack & software</small></p>
                                    </li>
                                    <li class="py-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Certificates</small></p>
                                    </li>
                                    <li class="py-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Private access</small></p>
                                    </li>
                                    <li class="pt-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Printed material</small></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="partner-button  m-auto p-6">
                                <a class="btn" href="#">PURCHASE</a>
                                <p class="mt-4"><small>*Please read our term and condition before order ticket</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="ticket-box-inner  bg-white position-relative rounded-bottom-5">
                            <img src="/app/images/pattern/1.png" alt="pattern" class="w-100 pattern position-absolute rounded-top">
                            <div class="ticket-title">
                                <h4 class="pt-6 mb-1">GOLDEN TICKET</h4>
                                <p>Enterprise Package</p>
                            </div>
                            <div class="ticket-price bg-white py-6">
                                <div class="ticket-price-inner d-flex justify-content-center align-items-start black fw-bold">
                                    <span class="me-1 mb-0 currency">$</span>
                                    <span class="me-1 m-0 dollor">199</span>
                                    <span class="me-1 mb-0 cents">99</span>
                                </div>
                                <p class="m-0">Person</p>
                            </div>
                            <div class="benifit-list bg-white px-5">
                                <ul class=" m-auto p-0 list-unstyled">
                                    <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                        <p class="my-1"><small>Second Balcony Seat</small></p>
                                    </li>
                                    <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                        <p class="my-1"><small>Snack & software</small></p>
                                    </li>
                                    <li class="py-2 text-capitalize lh-1  border-dashed-bottom-1">
                                        <p class="my-1"><small>Certificates</small></p>
                                    </li>
                                    <li class="pt-2 border border-0 text-capitalize lh-1">
                                        <p class="my-1"><small>Private access</small></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="partner-button  m-auto p-5">
                                <a class="btn" href="#">PURCHASE</a>
                                <p class="mt-4"><small>*Please read our term and condition before order ticket</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="m-0">All prices exclude 25% VAT. For more details, view our <a class="pink">Terms & Policy</a></p>
        </div>
    </div>
</section>
<!--Pricing Section end-->

<!--Gallery Section end-->
<section class="gallery">
    <div class="container">
        <div class="galler-inner">
            <div class="section-title text-center">
                <div class="row align-items-center ">
                    <div class="col-lg-6 pb-2">
                        <div class="title-content  text-lg-start">
                            <p class="mb-1 pink">EVENT GALLERY</p>
                            <h2 class="mb-1">WAS AN AMAGING <span class="pink">GALLERY</span></h2>
                            <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="speaker-button text-lg-end">
                            <a class="btn" href="#">VIEW MORE SHOTS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallerybox pt-4">
                <div id="selector1" class="grid row">
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/4.jpg">
                        <a><img src="/app/images/thumbnail/4.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/7.jpg">
                        <a><img src="/app/images/thumbnail/7.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/6.jpg">
                        <a><img src="/app/images/thumbnail/6.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/7.jpg">
                        <a><img src="/app/images/thumbnail/7.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/6.jpg">
                        <a><img src="/app/images/thumbnail/6.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item grid-item col-lg-4 col-md-6 px-1 mb-2" data-src="/app/images/group/1.jpg">
                        <a><img src="/app/images/thumbnail/1.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Gallery Section end-->

<!--Testimonials Section start-->
<section class="testimonial bg-lightgrey">
    <div class="container">
        <div class="section-title w-lg-60 m-auto text-center pb-5">
            <p class="mb-1  pink">OUR TESTIMONIALS</p>
            <h2 class="mb-1">WHAT PEOPLES'S SAYS ABOUT <span class="pink">ASR.GOV.UZ</span></h2>
            <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </p>
        </div>
        <div class="slider testimonial-slide">
            <div class="box1 mx-4 p-6 rounded bg-white">
                <div class="testimonial-content position-relative">
                    <i class="fa fa-quote-left position-absolute" aria-hidden="true"></i>
                    <p class="my-6 position-relative w-md-75 m-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="testimonial-bio d-flex align-items-center">
                    <img src="/app/images/speakers/1.jpg" alt="" class="bio-img me-5 rounded-circle float-start">
                    <div>
                        <p class="mb-1 fw-semibold black">DANIEL FRANKIE</p>
                        <p>Manager</p>
                    </div>
                </div>
            </div>
            <div class="box2 mx-4 p-6 rounded bg-white">
                <div class="testimonial-content position-relative">
                    <i class="fa fa-quote-left position-absolute" aria-hidden="true"></i>
                    <p class="my-6 position-relative w-md-75 ms-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="testimonial-bio d-flex align-items-center">
                    <img src="/app/images/speakers/4.jpg" alt="" class="bio-img me-5 rounded-circle float-start">
                    <div>
                        <p class="mb-1 fw-semibold black">EMANUEL KELTON</p>
                        <p>Planner</p>
                    </div>
                </div>
            </div>
            <div class="box3 mx-4 p-6 rounded bg-white">
                <div class="testimonial-content position-relative">
                    <i class="fa fa-quote-left position-absolute" aria-hidden="true"></i>
                    <p class="my-6 position-relative w-md-75 ms-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="testimonial-bio d-flex align-items-center">
                    <img src="/app/images/speakers/2.jpg" alt="" class="bio-img me-5 rounded-circle float-start">
                    <div>
                        <p class="mb-1 fw-semibold black">ROYLOR HENK</p>
                        <p>Director</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonials Section end-->

<!--FAQ Section start-->
<section class="faq pb-0 overflow-visible d-block position-relative z-1">
    <div class="overlay bg-blue opacity-25 z-n1">
    </div>
    <div class="container">
        <div>
            <div class="row">
                <div class="col-lg-6 px-4 mb-2">
                    <div class="faq-general">
                        <div class="section-title pb-3 text-center text-lg-start">
                            <p class="mb-1 pink">GENERAL QUESTIONS</p>
                            <h2 class="mb-2 text-white">FREQUENT ASKED <span class="pink">QUESTIONS!!</span></h2>
                            <p class="text-white">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.</p>
                        </div>
                        <div class="faq-accordion p-4 mb-5 bg-white rounded">
                            <div class="accordion accordion-faq" id="accordionFlushExample">
                                <div class="accordion-item ">
                                    <p class="accordion-header p-4">
                                        <button class="accordion-button collapsed fw-semibold p-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            GLOBAL SEARCH ENGINE OPTIMIZATION
                                        </button>
                                    </p>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body bg-lightgrey p-6">Phasellus quis diam sed ligula sagittis tempus
                                            malesuada sed eros. Quisque elementum, diam et pellentesque volutpat, ligula diam suscipit
                                            ligula, sit amet hendrerit arcu ipsum eu nulla. Morbi sed molestie nulla, ac viverra turpis.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <p class="accordion-header p-4">
                                        <button class="accordion-button collapsed  fw-semibold p-0" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                                aria-controls="flush-collapseTwo">
                                            WE OWN AND SHAPE OUR FUTURE
                                        </button>
                                    </p>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body bg-lightgrey p-6">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's
                                            accordion body. Let's imagine this being filled with some actual content.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <p class="accordion-header p-4">
                                        <button class="accordion-button collapsed fw-semibold p-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            HOW LONG DO I GET SUPPORT & UPDATES?
                                        </button>
                                    </p>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body bg-lightgrey p-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum, arcu a accumsan vulputate, leo diam sodales mi, et bibendum mi nunc at lorem. Etiam ut nisi hendrerit,</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  align-self-center px-4">
                    <div class="faq-form bg-white rounded shadow-lg p-6 mb-mi">
                        <div class="form-title mb-4">
                            <p class="mb-1 pink">TICKET BOOK</p>
                            <h2 class="mb-2">LET'S RESERVE A <span class="pink">SEAT</span></h2>
                            <p class="m-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                        </div>
                        <div class="form-content justify-content-between">
                            <form>
                                <input type="text" placeholder="Full Name" class="mb-5">
                                <div class=" row justify-content-around">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="phone-no">
                                            <input type="tel" placeholder="Phone No." class="mb-5">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="emai">
                                            <input type="email" placeholder="Email Address" class="mb-5" required>
                                        </div>
                                    </div>
                                </div>
                                <textarea placeholder="How may we help you?" rows="4" class="mb-5"></textarea>
                                <button class="btn mb-5" id="sub-btn">SEND MESSAGE</button>
                            </form>
                            <small>*Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero hic facere, minima impedit ea
                                quasi nemo odio.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--FAQ Section end-->

<!--Direction Section start-->
<section class="direction pb-0">
    <div class="container">
        <div class="section-title text-center pb-2 w-lg-60 m-auto">
            <p class="mb-1  pink">REACH US</p>
            <h2 class="mb-1">GET DIRECTION TO THE <span class="pink">EVENT HALL</span></h2>
            <p class="mb-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id est laborum.
            </p>
        </div>
        <div class="direction-content">
            <div class="direction-info">
                <div class="row">
                    <div class="col-lg-5 col-md-5 px-1">
                        <div class="p-6 d-flex text-white w-100 h-100 rounded bg-pink ">
                            <div class="justify-content-center align-self-center ms-6">
                                <h5 class="text-white pb-2">EVENT VENUE:</h5>
                                <p class="pb-5 m-0">Tashkent</p>
                                <h5 class="text-white pb-2">ADDRESS:</h5>
                                <p class="pb-5 m-0">Tashkent</p>
                                <h5 class="text-white pb-2">RECEPTION INFO:</h5>
                                <p class="pb-5 m-0">Booking: (+998) 900059799</p>
                                <a>Get Directions</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 px-1 py-2">
                        <iframe height="400" class="rounded w-100"
                                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
            <div class="location-gallery">
                <div id="selector" class="row pt-1 justify-content-center">
                    <div class="item col-lg-4 col-md-6 p-1" data-src="/app/images/group/4.jpg">
                        <a><img src="/app/images/thumbnail/4.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item col-lg-4 col-md-6 p-1" data-src="/app/images/group/7.jpg">
                        <a><img src="/app/images/thumbnail/7.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                    <div class="item col-lg-4 col-md-6 p-1" data-src="/app/images/group/1.jpg">
                        <a><img src="/app/images/thumbnail/1.jpg" class="w-100 rounded" alt="VR Presentation and conference"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Direction Section end-->

<!--Blog Section start-->
<section class="blog">
    <div class="container">
        <div class="blog-inner">
            <div class="row align-items-center">
                <div class="col-lg-6  ">
                    <div class="blog-title text-center text-lg-start p-2">
                        <p class="mb-1 pink">RECENT NEWS</p>
                        <h2 class="mb-1">READ MY <span class="pink">NEWS </span>TO KNOW MORE</h2>
                        <p class="mb-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
                <div class="col-lg-6  p-2">
                    <div class="blog-button text-center text-lg-end">
                        <a class="btn" href="#">VIEW MORE</a>
                    </div>
                </div>
            </div>
            <div class="blog-content">
                <div class="row">
                    <div class=" col-lg-4 p-4 pb-0">
                        <div class="blog-box border border-1 rounded pb-2 text-center ">
                            <a href="#"><img class="blog-img rounded rounded-bottom-0 w-100 h-auto" src="/app/images/group/6.jpg" alt="blog-img"></a>
                            <h5 class="p-4"><a href="#" class="black">THE TOP MUSIC FESTIVAL IN NEW YORK CITY</a></h5>
                            <P class="p-4 pt-0 m-0 border-bottom"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do</small></P>
                            <div class="pt-2">
                                <span class="px-4  border-end ">May 3, 2025 </span><span class="px-4">No Comments </span>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4  p-4 pb-0">
                        <div class="blog-box border border-1 rounded pb-2 text-center">
                            <a href="#"><img class="blog-img rounded w-100 rounded-bottom-0 h-auto" src="/app/images/group/7.jpg" alt="blog-img"></a>
                            <h5 class="p-4"><a href="#" class="black">LIVE INTERVIEWS FROM CONFERENCE</a></h5>
                            <P class="p-4 pt-0 m-0 border-bottom"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do</small></P>
                            <div class="pt-2">
                                <span class="px-4  border-end ">April 3, 2023 </span><span class="px-4">No Comments </span>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 p-4 pb-0 ">
                        <div class="blog-box border border-1 rounded pb-2 text-center">
                            <a href="#"><img class="blog-img rounded rounded-bottom-0 w-100 h-auto" src="/app/images/group/4.jpg" alt="blog-img"></a>
                            <h5 class="p-4"><a href="#" class="black">REGISTRATION FOR OPENING WORKSHOP</a></h5>
                            <P class="p-4 pt-0 m-0 border-bottom"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do</small></P>
                            <div class="pt-2">
                                <span class="px-4  border-end ">April 3, 2023 </span><span class="px-4">No Comments </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Section end-->



<!--Footer Section start-->
<footer class="pt-9 text-center text-white position-relative z-1">
    <div class="overlay z-n1 start-0"></div>
    <div class="container">
        <div class="footer-content w-lg-50 m-auto">
            <div class="footer-logo mb-4 pt-1">
                <a href="<?= Url::to(['/']) ?>">
                    <img src="<?= $setting && $setting->logo_bottom ? Html::encode($setting->logo_bottom) : '/template/assets/images/logos/logo.svg' ?>" class="w-100" alt="footer-logo"></a>
            </div>
            <div class="footer-disciption border-bottom border-white border-opacity-25 m-auto mb-6">
                <p class=" mb-6">Yangi Oʻzbekistonning taraqqiyot strategiyasini amalga oshirishni samarali tashkil etish</p>
                <div class="footer-socials pb-6">
                    <ul class="m-0 p-0">
                        <li class="d-inline me-2">
                            <a class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="d-inline me-2">
                            <a class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="d-inline me-2">
                            <a class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                        <li class="d-inline me-2">
                            <a class="d-inline-block rounded-circle bg-white  bg-opacity-25">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright pb-6 pt-1">
            <small>Copyright &#169;2025 Dashnet. All Rights Reserved Copyright</small>
        </div>
    </div>
</footer>
<!--Footer Section end-->

<!--Bacl-to-top Button start-->
<div id="back-to-top">
    <a href="#" class="bg-pink position-relative align-items-center rounded-circle d-block"></a>
</div>
<!--Bacl-to-top Button end-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
