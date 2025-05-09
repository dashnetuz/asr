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






<!-- Start Preloader
============================================= -->
<div id="preloader">
    <div id="gixus-preloader" class="gixus-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="U" class="letters-loading">U</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="I" class="letters-loading">I</span><br>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="D" class="letters-loading">D</span>
                <span data-text-preloader="U" class="letters-loading">U</span>
                <span data-text-preloader="C" class="letters-loading">C</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="O" class="letters-loading">O</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
            </div>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader -->






<div id="page" class="hfeed site">

    <header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        <p class="main-title bhf-hidden" itemprop="headline"><a href="<?= Url::to(['/'])?>"
                                                                title="Unieducation &#8211; Business Consulting" rel="home">Unieducation &#8211;
                Business
                Consulting</a></p>
        <div data-elementor-type="wp-post" data-elementor-id="28" class="elementor elementor-28">
            <div class="elementor-element elementor-element-c980624 e-con-full e-flex e-con e-parent"
                 data-id="c980624" data-element_type="container">
                <div class="elementor-element elementor-element-ea0378b elementor-widget elementor-widget-gixus_header"
                     data-id="ea0378b" data-element_type="widget" data-widget_type="gixus_header.default">
                    <div class="elementor-widget-container">

                        <!-- Header -->
                        <header>
                            <!-- Start Navigation -->
                            <nav
                                    class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">
                                <div class="container d-flex justify-content-between align-items-center">

                                    <!-- Start Header Navigation -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                data-target="#navbar-menu">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <a class="navbar-brand" href="<?= Url::to(['/'])?>">
                                            <img src="/backend/web/uploads/<?= $setting->getLogoTranslate()?>" class="logo"
                                                 alt="Logo">
                                        </a>
                                    </div>
                                    <!-- End Header Navigation -->

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-menu">
                                        <!-- MegaMenu -->
                                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown"
                                            data-out="fadeOutUp">

                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    Pages </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="about-us/index.html">
                                                            About Us </a>
                                                    </li>
                                                    <li>
                                                        <a href="about-us-v2/index.html">
                                                            About Us Two </a>
                                                    </li>
                                                    <li>
                                                        <a href="team/index.html">
                                                            Team </a>
                                                    </li>
                                                    <li>
                                                        <a href="team-two/index.html">
                                                            Team Two </a>
                                                    </li>
                                                    <li>
                                                        <a href="daniyel-joe/index.html">
                                                            Team Details </a>
                                                    </li>
                                                    <li>
                                                        <a href="pricing/index.html">
                                                            Pricing </a>
                                                    </li>
                                                    <li>
                                                        <a href="faq/index.html">
                                                            FAQ </a>
                                                    </li>
                                                    <li>
                                                        <a href="contact/index.html">
                                                            Contact Us </a>
                                                    </li>
                                                    <li>
                                                        <a href="error-page.html">
                                                            Error Page </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    Projects </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="project-v1/index.html">
                                                            Project style one </a>
                                                    </li>
                                                    <li>
                                                        <a href="project-v2/index.html">
                                                            Project style two </a>
                                                    </li>
                                                    <li>
                                                        <a href="project-v3/index.html">
                                                            Project style three </a>
                                                    </li>
                                                    <li>
                                                        <a href="strategy-development/index.html">
                                                            Project Details </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    Services </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="services-v1/index.html">
                                                            Services Version One </a>
                                                    </li>
                                                    <li>
                                                        <a href="services-v2/index.html">
                                                            Services Version Two </a>
                                                    </li>
                                                    <li>
                                                        <a href="services-v3/index.html">
                                                            Services Version Three </a>
                                                    </li>
                                                    <li>
                                                        <a href="advanced-business-intelligence/index.html">
                                                            Services Details </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    Blog </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="blog-standard/index.html">
                                                            Blog Standard </a>
                                                    </li>
                                                    <li>
                                                        <a href="latest-blog/index.html">
                                                            Blog With Sidebar </a>
                                                    </li>
                                                    <li>
                                                        <a href="latest-blog-v2/index.html">
                                                            Blog Grid Two Column </a>
                                                    </li>
                                                    <li>
                                                        <a href="latest-blog-v3/index.html">
                                                            Blog Grid Three Column </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                                href="minuter-him-own-clothes-but-observe-country/index.html">
                                                            Blog Single </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact/index.html" class="dropdown-toggle"
                                                   data-toggle="dropdown">
                                                    Contact </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->

                                    <div class="attr-right">
                                        <!-- Start Atribute Navigation -->
                                        <div class="attr-nav">
                                            <ul>
                                                <li class="button">
                                                    <a href="contact/index.html">
                                                        Get consultant </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Atribute Navigation -->
                                    </div>
                                </div>

                                <!-- Overlay screen for menu -->
                                <div class="overlay-screen"></div>
                                <!-- End Overlay screen for menu -->
                            </nav>
                            <!-- End Navigation -->
                        </header>
                        <!-- End Header -->
                    </div>
                </div>
            </div>
        </div>
    </header>





    <div data-elementor-type="wp-page" data-elementor-id="25" class="elementor elementor-25">
        <div class="elementor-element elementor-element-f1caa7f e-con-full e-flex e-con e-parent"
             data-id="f1caa7f" data-element_type="container" id="home">
            <div class="elementor-element elementor-element-8bafed5 elementor-widget elementor-widget-home1_hero"
                 data-id="8bafed5" data-element_type="widget" data-widget_type="home1_hero.default">
                <div class="elementor-widget-container">
                    <div class="banner-style-one-area overflow-hidden bg-gray">
                        <div class="shape-blury"></div>
                        <div class="banner-style-one">
                            <div class="container">
                                <div class="content">
                                    <div class="row align-center">
                                        <div class="col-xl-6 col-lg-7 pr-50 pr-md-15 pr-xs-15">
                                            <div class="information">
                                                <div class="animation-shape">
                                                    <img decoding="async"
                                                         src="/unieducation/wp-content/themes/gixus/assets/img/shape/anim-2.png"
                                                         alt="Image not found">
                                                </div>
                                                <h4 class="wow fadeInUp" data-wow-duration="400ms">Business
                                                    Advisor</h4>
                                                <h2 class="wow fadeInUp" data-wow-delay="500ms"
                                                    data-wow-duration="400ms">Grow <strong>business</strong>
                                                    <br>with great advice
                                                </h2>
                                                <p class="wow fadeInUp" data-wow-delay="900ms"
                                                   data-wow-duration="400ms">Dissuade ecstatic and properly saw
                                                    entirely sir why laughter endeavor. In on my jointure
                                                    horrible margaret suitable he followed speedily.</p>
                                                <div class="button mt-40 wow fadeInUp" data-wow-delay="1200ms"
                                                     data-wow-duration="400ms">
                                                    <a class="btn btn-md circle btn-gradient animation"
                                                       href="contact/index.html">
                                                        Get Started </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="banner-one-thumb col-xl-6 col-lg-5 pl-60 pl-md-15 pl-xs-15">
                                            <div class="thumb">
                                                <img decoding="async" class="wow fadeInUp"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/thumb/1.png"
                                                     alt="Thumb">
                                                <div class="strategy">
                                                    <div class="item wow fadeInLeft" data-wow-delay="800ms">
                                                        <div class="icon">
                                                            <i aria-hidden="true" class="fas fa-chart-pie"></i>
                                                        </div>
                                                        <div class="info">
                                                            <p><strong>86%</strong> Business Growth</p>
                                                        </div>
                                                    </div>
                                                    <div class="item wow fadeInRight" data-wow-delay="500ms">
                                                        <div class="icon">
                                                            <i aria-hidden="true" class="fas fa-rocket"></i>
                                                        </div>
                                                        <div class="info">
                                                            <p><strong>75%</strong> Marketing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-bb22c19 e-con-full e-flex e-con e-parent"
             data-id="bb22c19" data-element_type="container">
            <div class="elementor-element elementor-element-d044600 elementor-widget elementor-widget-home1_features"
                 data-id="d044600" data-element_type="widget" data-widget_type="home1_features.default">
                <div class="elementor-widget-container">
                    <div class="feature-style-one-area">
                        <div class="container container-stage">
                            <div class="feature-style-one-items">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-5">
                                        <div class="feature-style-one-info">
                                            <div class="fun-fact">
                                                <div class="counter">
                                                    <div class="timer" data-to="28" data-speed="1000">
                                                        28 </div>
                                                    <div class="operator">
                                                        K </div>
                                                </div>
                                            </div>
                                            <h3>Customers are served in our consulting services</h3>
                                            <ul class="list-style-one mt-25">
                                                <li>Growth Method Analysis</li>
                                                <li>Business Management consultation</li>
                                                <li>Team Building Leadership</li>
                                                <li>Assessment Report Analysis</li>
                                            </ul>
                                            <div class="path"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 feature-style-one-content text-light">
                                        <div class="feature-style-one-cards">
                                            <div class="path"></div>

                                            <!-- Single item -->
                                            <div class="feature-style-one-item wow fadeInRight"
                                                 data-wow-delay="0ms">
                                                <div class="icon">
                                                    <img decoding="async"
                                                         src="/unieducation/wp-content/themes/gixus/assets/img/icon/1.png"
                                                         alt="Image Not Found">
                                                </div>
                                                <div class="info">
                                                    <h4>Approach</h4>
                                                    <p>Continued at necessary breakfast. Surrounded sir
                                                        motionless she end literature. Gay direction neglected
                                                        but supported yet her.</p>
                                                </div>
                                            </div>
                                            <!-- End Single item -->
                                            <!-- Single item -->
                                            <div class="feature-style-one-item wow fadeInRight"
                                                 data-wow-delay="200ms">
                                                <div class="icon">
                                                    <img decoding="async"
                                                         src="/unieducation/wp-content/themes/gixus/assets/img/icon/2.png"
                                                         alt="Image Not Found">
                                                </div>
                                                <div class="info">
                                                    <h4>Information</h4>
                                                    <p>Continued at necessary breakfast. Surrounded sir
                                                        motionless she end literature. Gay direction neglected
                                                        but supported yet her.</p>
                                                </div>
                                            </div>
                                            <!-- End Single item -->
                                            <!-- Single item -->
                                            <div class="feature-style-one-item wow fadeInRight"
                                                 data-wow-delay="400ms">
                                                <div class="icon">
                                                    <img decoding="async"
                                                         src="/unieducation/wp-content/themes/gixus/assets/img/icon/3.png"
                                                         alt="Image Not Found">
                                                </div>
                                                <div class="info">
                                                    <h4>Goal</h4>
                                                    <p>Continued at necessary breakfast. Surrounded sir
                                                        motionless she end literature. Gay direction neglected
                                                        but supported yet her.</p>
                                                </div>
                                            </div>
                                            <!-- End Single item -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-d0944d7 e-con-full e-flex e-con e-parent"
             data-id="d0944d7" data-element_type="container" id="about">
            <div class="elementor-element elementor-element-4988352 elementor-widget elementor-widget-home1_about"
                 data-id="4988352" data-element_type="widget" data-widget_type="home1_about.default">
                <div class="elementor-widget-container">
                    <div class="about-style-one-area default-padding-top">
                        <div class="container">
                            <div class="about-style-one-items">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-6">
                                        <div class="thumb-style-one">
                                            <img decoding="async"
                                                 src="/unieducation/wp-content/themes/gixus/assets/img/about/1.jpg"
                                                 alt="Image Not Found">
                                            <a href="https://www.youtube.com/watch?v=aTC_RNYtEb0"
                                               class="popup-youtube video-play-button"><i
                                                        class="fas fa-play"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-6 pl-50 pl-md-15 pl-xs-15">
                                        <div class="about-style-one-info">
                                            <div class="content">
                                                <h2 class="title split-text">Meet the executives driving our
                                                    success.</h2>
                                                <p>Businesses operate in various industries, including
                                                    technology, finance, healthcare, retail, and manufacturing,
                                                    among others. They play a crucial role in the economy by
                                                    providing goods, services, and employment never fruit up
                                                    Pasture imagin..</p>
                                            </div>
                                            <ul class="card-list">
                                                <li class="wow fadeInUp">
                                                    <img decoding="async"
                                                         src="/unieducation/wp-content/themes/gixus/assets/img/icon/4.png"
                                                         alt="Image Not Found">
                                                    <h5>Award Winning Company</h5>
                                                </li>
                                                <li class="wow fadeInUp">
                                                    <h2>3.8 X </h2>
                                                    <h5>Economical Growth</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-857c852 e-con-full e-flex e-con e-parent"
             data-id="857c852" data-element_type="container" id="service">
            <div class="elementor-element elementor-element-1bfbfa5 elementor-widget elementor-widget-home1_service"
                 data-id="1bfbfa5" data-element_type="widget" data-widget_type="home1_service.default">
                <div class="elementor-widget-container">
                    <div class="services-style-one-area default-padding"
                         style="background: url(/unieducation/wp-content/themes/gixus/assets/img/shape/12.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                    <div class="site-heading text-center">
                                        <h4 class="sub-title">Our Services</h4>
                                        <h2 class="title split-text">Empower your business with our services.
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="services-style-one-items">
                                        <div class="services-style-one-item out  wow fadeInRight"
                                             data-wow-delay="0ms">
                                            <div class="icon">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/icon/5.png"
                                                     alt="Image Not Found">
                                            </div>
                                            <div class="content">
                                                <h4><a href="advanced-business-intelligence/index.html">Advanced
                                                        Business Intelligence</a></h4>
                                                <p>Seeing rather her you not esteem men settle genius excuse.
                                                    Deal say over you age devonshire Comparison new ham
                                                    melancholy son themselves instrument out reasonably.</p>
                                            </div>
                                            <div class="button">
                                                <a class="btn"
                                                   href="advanced-business-intelligence/index.html"><i
                                                            class="fas fa-arrow-right"></i></a>
                                            </div>
                                            <span>01</span>
                                        </div>
                                        <div class="services-style-one-item  wow fadeInRight"
                                             data-wow-delay="200ms">
                                            <div class="icon">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/icon/6.png"
                                                     alt="Image Not Found">
                                            </div>
                                            <div class="content">
                                                <h4><a href="business-research-and-development/index.html">Business
                                                        Research And Development</a></h4>
                                                <p>Seeing rather her you not esteem men settle genius excuse.
                                                    Deal say over you age devonshire Comparison new ham
                                                    melancholy son themselves instrument out reasonably.</p>
                                            </div>
                                            <div class="button">
                                                <a class="btn"
                                                   href="business-research-and-development/index.html"><i
                                                            class="fas fa-arrow-right"></i></a>
                                            </div>
                                            <span>02</span>
                                        </div>
                                        <div class="services-style-one-item  wow fadeInRight"
                                             data-wow-delay="400ms">
                                            <div class="icon">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/icon/7.png"
                                                     alt="Image Not Found">
                                            </div>
                                            <div class="content">
                                                <h4><a href="digital-project-management-system/index.html">Digital
                                                        Project Management System</a></h4>
                                                <p>Seeing rather her you not esteem men settle genius excuse.
                                                    Deal say over you age devonshire Comparison new ham
                                                    melancholy son themselves instrument out reasonably.</p>
                                            </div>
                                            <div class="button">
                                                <a class="btn"
                                                   href="digital-project-management-system/index.html"><i
                                                            class="fas fa-arrow-right"></i></a>
                                            </div>
                                            <span>03</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-9dc485f e-con-full e-flex e-con e-parent"
             data-id="9dc485f" data-element_type="container" id="process">
            <div class="elementor-element elementor-element-acdc4c9 elementor-widget elementor-widget-home1_choose"
                 data-id="acdc4c9" data-element_type="widget" data-widget_type="home1_choose.default">
                <div class="elementor-widget-container">
                    <div class="choose-us-style-one-area overflow-hidden default-padding-top bg-gray">
                        <div class="container">
                            <div class="heading-left">
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-1">
                                        <div class="experience-style-one">
                                            <h2><strong>26</strong> Years of Experience</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 offset-lg-1">
                                        <div class="circle-progress">
                                            <div class="progressbar">
                                                <div class="circle" data-percent="65">
                                                    <strong></strong>
                                                </div>
                                                <h4>Business Development</h4>
                                            </div>
                                            <div class="progressbar">
                                                <div class="circle" data-percent="84">
                                                    <strong></strong>
                                                </div>
                                                <h4>Investment Analysis</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container container-stage">
                            <div class="choose-us-one-thumb">
                                <div class="content">
                                    <div class="left-info">
                                        <h2 class="title split-text">Building great future Together, Be with us
                                        </h2>
                                    </div>
                                    <div class="process-style-one">
                                        <div class="process-style-one-item wow fadeInRight"
                                             data-wow-delay="0ms">
                                            <span>01</span>
                                            <h4>Information Collection</h4>
                                            <p>Excuse Deal say over contain performance from comparison new
                                                melancholy themselves.</p>
                                        </div>
                                        <div class="process-style-one-item wow fadeInRight"
                                             data-wow-delay="200ms">
                                            <span>02</span>
                                            <h4>Projection Report Analysis</h4>
                                            <p>Excuse Deal say over contain performance from comparison new
                                                melancholy themselves.</p>
                                        </div>
                                        <div class="process-style-one-item wow fadeInRight"
                                             data-wow-delay="400ms">
                                            <span>03</span>
                                            <h4>Consultation Solution</h4>
                                            <p>Excuse Deal say over contain performance from comparison new
                                                melancholy themselves.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-c3b0bb4 e-con-full e-flex e-con e-parent"
             data-id="c3b0bb4" data-element_type="container">
            <div class="elementor-element elementor-element-8aa4caf elementor-widget elementor-widget-home1_project"
                 data-id="8aa4caf" data-element_type="widget" data-widget_type="home1_project.default">
                <div class="elementor-widget-container">
                    <div class="project-style-one-area default-padding bg-gray">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 pr-60 pr-md-15 pr-xs-15">
                                    <div class="project-style-one-info bg-cover text-light wow fadeInRight"
                                         style="background-image: url(/unieducation/wp-content/themes/gixus/assets/img/shape/1.jpg);">
                                        <h3>Have a view of our amazing projects with our clients</h3>
                                        <p>We’re a creative branding and communications company of creative
                                            thinkers, strategists, digital innovators, for your company</p>
                                        <ul class="list-style-two mt-20">
                                            <li>Satisfaction guarantee</li>
                                            <li>Ontime delivery</li>
                                        </ul>
                                        <a class="btn-style-two" href="project-v1/index.html">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="project-style-one-items">
                                        <div class="accordion" id="projectAccordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading0">
                                                    <button class="accordion-button " type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse0"
                                                            aria-expanded="true" aria-controls="collapse0">
                                                        <span>Strategy</span>
                                                        <b>Digital business planning</b>
                                                    </button>
                                                </h2>
                                                <div id="collapse0" class="accordion-collapse collapse show"
                                                     aria-labelledby="heading0"
                                                     data-bs-parent="#projectAccordion">
                                                    <div class="accordion-body">
                                                        <div class="portfolio-style-one-thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/portfolio/5.jpg"
                                                                 alt="Image Not Found">
                                                            <a href="digital-business-planning/index.html">
                                                                <i class="fas fa-link"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading1">
                                                    <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                            aria-expanded="false" aria-controls="collapse1">
                                                        <span>Partnership</span>
                                                        <b>Business program management</b>
                                                    </button>
                                                </h2>
                                                <div id="collapse1" class="accordion-collapse collapse "
                                                     aria-labelledby="heading1"
                                                     data-bs-parent="#projectAccordion">
                                                    <div class="accordion-body">
                                                        <div class="portfolio-style-one-thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/portfolio/6.jpg"
                                                                 alt="Image Not Found">
                                                            <a href="business-program-management/index.html">
                                                                <i class="fas fa-link"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading2">
                                                    <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                            aria-expanded="false" aria-controls="collapse2">
                                                        <span>Branding</span>
                                                        <b>Strategy development</b>
                                                    </button>
                                                </h2>
                                                <div id="collapse2" class="accordion-collapse collapse "
                                                     aria-labelledby="heading2"
                                                     data-bs-parent="#projectAccordion">
                                                    <div class="accordion-body">
                                                        <div class="portfolio-style-one-thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/portfolio/7.jpg"
                                                                 alt="Image Not Found">
                                                            <a href="strategy-development/index.html">
                                                                <i class="fas fa-link"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-7b61722 e-con-full e-flex e-con e-parent"
             data-id="7b61722" data-element_type="container" id="team">
            <div class="elementor-element elementor-element-5dc5cf4 elementor-widget elementor-widget-home1_team"
                 data-id="5dc5cf4" data-element_type="widget" data-widget_type="home1_team.default">
                <div class="elementor-widget-container">
                    <!-- Start Team
============================================= -->
                    <div class="team-style-one-area default-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                    <div class="site-heading text-center">
                                        <h4 class="sub-title">Team Members</h4>
                                        <h2 class="title split-text">Meet the talented team from our company
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="team-style-one-items">
                                <div class="row">
                                    <!-- Single item -->
                                    <div class="col-xl-3 col-lg-4 mb-50">
                                        <div class="team-style-one-item wow fadeInUp" data-wow-delay="0ms">
                                            <div class="thumb">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/team/2.jpg"
                                                     alt="Image Not Found">
                                                <div class="social-overlay">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="icon"><i class="fas fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <span>CEO &amp; Founder</span>
                                                <h4><a href="aleesha-brown/index.html">Aleesha Brown</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single item -->
                                    <div class="col-xl-3 col-lg-4 mb-50">
                                        <div class="team-style-one-item wow fadeInUp" data-wow-delay="200ms">
                                            <div class="thumb">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/team/3.jpg"
                                                     alt="Image Not Found">
                                                <div class="social-overlay">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="icon"><i class="fas fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <span>Product Manager</span>
                                                <h4><a href="kevin-martin/index.html">Kevin Martin</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single item -->
                                    <div class="col-xl-3 col-lg-4 mb-50">
                                        <div class="team-style-one-item wow fadeInUp" data-wow-delay="400ms">
                                            <div class="thumb">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/team/4.jpg"
                                                     alt="Image Not Found">
                                                <div class="social-overlay">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="icon"><i class="fas fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <span>Financial Consultant</span>
                                                <h4><a href="sarah-albert/index.html">Sarah Albert</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-9 offset-xl-3 col-lg-12">
                                        <div class="team-grid">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 mb-50">
                                                    <div class="team-style-one-item wow fadeInUp"
                                                         data-wow-delay="0ms">
                                                        <div class="thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/team/7.jpg"
                                                                 alt="Image Not Found">
                                                            <div class="social-overlay">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-dribbble"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="icon"><i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <span>Developer</span>
                                                            <h4><a href="amanulla-joey/index.html">Amanulla
                                                                    Joey</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 mb-50">
                                                    <div class="team-style-one-item wow fadeInUp"
                                                         data-wow-delay="200ms">
                                                        <div class="thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/team/6.jpg"
                                                                 alt="Image Not Found">
                                                            <div class="social-overlay">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-dribbble"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="icon"><i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <span>Co Founder</span>
                                                            <h4><a href="kamal-abraham/index.html">Kamal
                                                                    Abraham</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 mb-50">
                                                    <div class="team-style-one-item wow fadeInUp"
                                                         data-wow-delay="400ms">
                                                        <div class="thumb">
                                                            <img decoding="async"
                                                                 src="/unieducation/wp-content/themes/gixus/assets/img/team/9.jpg"
                                                                 alt="Image Not Found">
                                                            <div class="social-overlay">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-dribbble"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                    class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="icon"><i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <span>Marketing Leader</span>
                                                            <h4><a href="daniyel-joe/index.html">Daniyel Joe</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Team -->
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-5dbb408 e-con-full e-flex e-con e-parent"
             data-id="5dbb408" data-element_type="container">
            <div class="elementor-element elementor-element-6d9e93f elementor-widget elementor-widget-home1_counter"
                 data-id="6d9e93f" data-element_type="widget" data-widget_type="home1_counter.default">
                <div class="elementor-widget-container">
                    <div class="fun-factor-area default-padding-bottom">
                        <div class="container">
                            <div class="fun-fact-style-one-items text-center">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 funfact-style-one-item">
                                        <div class="fun-fact">
                                            <div class="counter">
                                                <div class="timer" data-to="56" data-speed="2000">56</div>
                                                <div class="operator">K</div>
                                            </div>
                                            <span class="medium">Clients around the world</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 funfact-style-one-item">
                                        <div class="fun-fact">
                                            <div class="counter">
                                                <div class="timer" data-to="30" data-speed="2000">30</div>
                                                <div class="operator">+</div>
                                            </div>
                                            <span class="medium">Award Winning</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 funfact-style-one-item">
                                        <div class="fun-fact">
                                            <div class="counter">
                                                <div class="timer" data-to="97" data-speed="2000">97</div>
                                                <div class="operator">%</div>
                                            </div>
                                            <span class="medium">Business Growth</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 funfact-style-one-item">
                                        <div class="fun-fact">
                                            <div class="counter">
                                                <div class="timer" data-to="60" data-speed="2000">60</div>
                                                <div class="operator">+</div>
                                            </div>
                                            <span class="medium">Team Members</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-6c0b4f1 e-con-full e-flex e-con e-parent"
             data-id="6c0b4f1" data-element_type="container">
            <div class="elementor-element elementor-element-630ee7f elementor-widget elementor-widget-home1_testimonial"
                 data-id="630ee7f" data-element_type="widget" data-widget_type="home1_testimonial.default">
                <div class="elementor-widget-container">
                    <div class="testimonial-style-one-area">
                        <div class="container">
                            <div class="testimonial-style-one-items bg-gray-secondary">
                                <div class="row align-center">
                                    <div class="col-xl-5 pr-80 pr-md-15 pr-xs-15">
                                        <div class="testimonial-style-one-thumb">
                                            <img decoding="async"
                                                 src="/unieducation/wp-content/themes/gixus/assets/img/illustration/5.png"
                                                 alt="Image Not Found">
                                            <div class="shape">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/shape/16.png"
                                                     alt="Image Not Found">
                                                <img decoding="async"
                                                     src="/unieducation/wp-content/themes/gixus/assets/img/shape/17.png"
                                                     alt="Image Not Found">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="testimonial-style-one-carousel swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-style-one">
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="top">
                                                                    <h2>The best service ever</h2>
                                                                </div>
                                                                <p>“Targetingconsultation discover apartments.
                                                                    ndulgence off under folly death wrote cause
                                                                    her way spite. Plan upon yet way get cold
                                                                    spot its week. Almost do am or limits
                                                                    hearts. Resolve parties but why she shewing.
                                                                    She sang know now always remembering”</p>
                                                            </div>
                                                            <div class="provider">
                                                                <div class="info">
                                                                    <h4>Matthew J. Wyman</h4>
                                                                    <span>Senior Consultant</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-style-one">
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="top">
                                                                    <h2>Awesome opportunities</h2>
                                                                </div>
                                                                <p>“Consultation discover apartments. ndulgence
                                                                    off under folly death wrote cause her way
                                                                    spite. Plan upon yet way get cold spot its
                                                                    week. Almost do am or limits hearts. Resolve
                                                                    parties but why she shewing. She sang know
                                                                    now always remembering to the point”</p>
                                                            </div>
                                                            <div class="provider">
                                                                <div class="info">
                                                                    <h4>Anthom Bu Spar</h4>
                                                                    <span>Marketing Manager</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Navigation -->
                                            <div class="swiper-nav-left">
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-d019915 e-con-full e-flex e-con e-parent"
             data-id="d019915" data-element_type="container" id="blog">
            <div class="elementor-element elementor-element-8cd84e7 elementor-widget elementor-widget-home1_blog"
                 data-id="8cd84e7" data-element_type="widget" data-widget_type="home1_blog.default">
                <div class="elementor-widget-container">
                    <div class="blog-area home-blog default-padding bottom-less">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                    <div class="site-heading text-center">
                                        <h4 class="sub-title">Blog Insight</h4>
                                        <h2 class="title split-text">Valuable insights to change your startup
                                            idea</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                                    <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="0ms">
                                        <div class="home-blog-thumb">
                                            <img decoding="async" src="/unieducation/wp-content/uploads/2021/08/9.jpg"
                                                 alt="Announcing if attachment resolution sentiments.">
                                            <ul class="home-blog-meta">
                                                <li>
                                                    <a href="#">
                                                        Finance </a>
                                                </li>
                                                <li>August 26, 2024</li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <h4 class="blog-title">
                                                    <a
                                                            href="announcing-if-attachment-resolution-sentiments/index.html">Announcing
                                                        if attachment resolution sentiments.</a>
                                                </h4>
                                                <a href="announcing-if-attachment-resolution-sentiments/index.html"
                                                   class="btn-read-more">Read More <i
                                                            class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                                    <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="200ms">
                                        <div class="home-blog-thumb">
                                            <img decoding="async" src="/unieducation/wp-content/uploads/2021/01/3.jpg"
                                                 alt="Minuter him own clothes but observe country.">
                                            <ul class="home-blog-meta">
                                                <li>
                                                    <a href="#">
                                                        Firewall </a>
                                                </li>
                                                <li>January 20, 2024</li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <h4 class="blog-title">
                                                    <a
                                                            href="minuter-him-own-clothes-but-observe-country/index.html">Minuter
                                                        him own clothes but observe country.</a>
                                                </h4>
                                                <a href="minuter-him-own-clothes-but-observe-country/index.html"
                                                   class="btn-read-more">Read More <i
                                                            class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                                    <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="400ms">
                                        <div class="home-blog-thumb">
                                            <img decoding="async" src="/unieducation/wp-content/uploads/2021/01/2.jpg"
                                                 alt="Considered imprudence of technical friendship.">
                                            <ul class="home-blog-meta">
                                                <li>
                                                    <a href="#">
                                                        Analysis </a>
                                                </li>
                                                <li>January 20, 2024</li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <h4 class="blog-title">
                                                    <a
                                                            href="considered-imprudence-of-technical-friendship/index.html">Considered
                                                        imprudence of technical friendship.</a>
                                                </h4>
                                                <a href="considered-imprudence-of-technical-friendship/index.html"
                                                   class="btn-read-more">Read More <i
                                                            class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer itemtype="https://schema.org/WPFooter" itemscope="itemscope" id="colophon" role="contentinfo">
        <div class='footer-width-fixer'>
            <div data-elementor-type="wp-post" data-elementor-id="352" class="elementor elementor-352">
                <div class="elementor-element elementor-element-5d0c4d7 e-con-full e-flex e-con e-parent"
                     data-id="5d0c4d7" data-element_type="container">
                    <div class="elementor-element elementor-element-b40ecb9 elementor-widget elementor-widget-home1_footer"
                         data-id="b40ecb9" data-element_type="widget" data-widget_type="home1_footer.default">
                        <div class="elementor-widget-container">
                            <footer class="bg-dark overflow-hidden text-light">
                                <div class="container">
                                    <div class="f-items default-padding">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 footer-item pr-30 pr-md-15 pr-xs-15">
                                                <div class="f-item address">
                                                    <ul class="contact-address">
                                                        <li>
                                                            <p>Want to connect?</p>
                                                            <h4>
                                                                <a
                                                                        href="mailto:adsh@gmail.com">adsh@gmail.com</a>
                                                            </h4>
                                                        </li>
                                                        <li>
                                                            <p>Call us anytime</p>
                                                            <h4>
                                                                <a href="tel:+998900059799">+998900059799</a>
                                                            </h4>
                                                        </li>
                                                        <li>
                                                            <p>Our Location</p>
                                                            <h4>
                                                                <a href="#">Uzbekistan, Tashkent</a>
                                                            </h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-6 footer-item">
                                                <div class="f-item link">
                                                    <h4 class="widget-title">Quick Links</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="about-us/index.html">
                                                                Company Profile </a>
                                                        </li>
                                                        <li>
                                                            <a href="faq/index.html">
                                                                Help Center </a>
                                                        </li>
                                                        <li>
                                                            <a href="project-v1/index.html">
                                                                Projects </a>
                                                        </li>
                                                        <li>
                                                            <a href="pricing/index.html">
                                                                Plans &amp; Pricing </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-standard/index.html">
                                                                News &amp; Blog </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-6 footer-item">
                                                <div class="f-item link">
                                                    <h4 class="widget-title">Our Services</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="services-v1/index.html">
                                                                Data Analytics </a>
                                                        </li>
                                                        <li>
                                                            <a href="services-v2/index.html">
                                                                Cyber Related </a>
                                                        </li>
                                                        <li>
                                                            <a href="services-v3/index.html">
                                                                Growth Hacking </a>
                                                        </li>
                                                        <li>
                                                            <a href="strategy-development/index.html">
                                                                Strategy Development </a>
                                                        </li>
                                                        <li>
                                                            <a href="advanced-business-intelligence/index.html">
                                                                Business Intelligence </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 footer-item">
                                                <div class="f-item newsletter">
                                                    <p>
                                                        Join our subscribers list to get the latest
                                                        news and special offers. </p>

                                                    <div class="wpcf7 no-js" id="wpcf7-f369-o1" lang="en-US"
                                                         dir="ltr">
                                                        <div class="screen-reader-response">
                                                            <p role="status" aria-live="polite"
                                                               aria-atomic="true"></p>
                                                            <ul></ul>
                                                        </div>
                                                        <form
                                                                action="#"
                                                                method="post" class="wpcf7-form init"
                                                                aria-label="Contact form" novalidate="novalidate"
                                                                data-status="init">
                                                            <div style="display: none;">
                                                                <input type="hidden" name="_wpcf7"
                                                                       value="369" />
                                                                <input type="hidden" name="_wpcf7_version"
                                                                       value="5.9.8" />
                                                                <input type="hidden" name="_wpcf7_locale"
                                                                       value="en_US" />
                                                                <input type="hidden" name="_wpcf7_unit_tag"
                                                                       value="wpcf7-f369-o1" />
                                                                <input type="hidden"
                                                                       name="_wpcf7_container_post" value="0" />
                                                                <input type="hidden"
                                                                       name="_wpcf7_posted_data_hash" value="" />
                                                            </div>
                                                            <span class="wpcf7-form-control-wrap"
                                                                  data-name="email1"><input size="40"
                                                                                            maxlength="400"
                                                                                            class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email form-control"
                                                                                            id="email1" aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="Your Email" value=""
                                                                                            type="email" name="email1" /></span>
                                                            <button type="submit"> <i
                                                                        class="fa fa-paper-plane"></i></button>
                                                            <div class="wpcf7-response-output"
                                                                 aria-hidden="true"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Footer Bottom -->
                                    <div class="footer-bottom">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                &copy; Copyright 2024. All Rights Reserved by <a
                                                        href="https://t.me/adsh97">adsh</a>
                                            </div>
                                            <div class="col-lg-6 text-end">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="about-us-v2/index.html">
                                                            About </a>
                                                    </li>
                                                    <li>
                                                        <a href="team/index.html">
                                                            Team </a>
                                                    </li>
                                                    <li>
                                                        <a href="contact/index.html">
                                                            Support </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Footer Bottom -->
                                </div>
                            </footer>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- #page -->

<?= $content?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
