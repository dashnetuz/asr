<?php
/** @var $content */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Setting;
use yii\helpers\Url;
use common\models\Visit;
use common\models\Pages;
use common\models\Page;

use common\models\Symbol;
use common\models\Faculty;
use common\models\Chair;
use common\models\User;

$setting = Setting::findOne(1);

AppAsset::register($this);
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= $setting && $setting->favicon ? Html::encode(
        $setting->favicon
    ) : '/template/assets//iqac/images/logos/favicon.png' ?>" type="image/png">
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">

                <div class="top-left">
                    <!-- Info List -->
                    <ul class="info-list">
                        <li><i class="fa-solid fa-envelope"></i> <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#77191212131f121b073714181a0716190e5914181a"><span class="__cf_email__" data-cfemail="d6b8b3b3b2beb3baa696b5b9bba6b7b8aff8b5b9bb">[email&#160;protected]</span></a>
                        </li>
                        <li><i class="fa-solid fa-location-dot"></i> Tashkent</li>
                    </ul>
                </div>

                <div class="top-right">
                    <ul class="useful-links">
                        <li><a href="page-about.html">About</a></li>
                        <li><a href="page-faq.html">Faqs</a></li>
                        <li><a href="page-contact.html">Contact</a></li>
                    </ul>
                    <ul class="top-social-icon">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Header Top -->

        <!-- Main box -->
        <div class="main-box">
            <div class="logo-box">
                <div class="logo"><a href="<?= Url::to(['/']) ?>"><img src="<?= $setting->logo ?>" alt="" title="IQAC"></a></div>
            </div>
            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li class="dropdown"><a href="#">Home</a>
                            <ul>
                                <li><a href="<?= Url::to(['/']) ?>">Home page 01</a></li>
                                <li><a href="<?= Url::to(['/']) ?>">Home page 02</a></li>
                                <li><a href="<?= Url::to(['/']) ?>">Home page 03</a></li>
                                <li><a href="<?= Url::to(['/']) ?>">Home page 04</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Pages</a>
                            <ul>
                                <li><a href="page-about.html">About</a></li>
                                <li><a href="page-faq.html">Faq</a></li>
                                <li><a href="page-pricing.html">Pricing</a></li>
                                <li class="dropdown"><a href="#">Team</a>
                                    <ul>
                                        <li><a href="page-team.html">Team List</a></li>
                                        <li><a href="page-team-details.html">Team Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop-products.html">Products</a></li>
                                        <li><a href="shop-products-sidebar.html">Products with Sidebar</a></li>
                                        <li><a href="shop-product-details.html">Product Details</a></li>
                                        <li><a href="shop-cart.html">Cart</a></li>
                                        <li><a href="shop-checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li><a href="page-testimonial.html">Testimonials</a></li>
                                <li><a href="page-404.html">404</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Services</a>
                            <ul>
                                <li><a href="page-services.html">Services</a></li>
                                <li><a href="page-service-details.html">Services Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Portfolio</a>
                            <ul>
                                <li><a href="page-case.html">Portfolio</a></li>
                                <li><a href="page-case-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">News</a>
                            <ul>
                                <li><a href="news-grid.html">News Grid</a></li>
                                <li><a href="news-details.html">News Details</a></li>
                            </ul>
                        </li>
                        <li><a href="page-contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- Main Menu End-->
            </div>
            <div class="outer-box">
                <div class="info-box">
                    <div class="call-info">
                        <i class="fa-solid fa-phone ring__animation"></i>
                        <div>
                            <h6 class="title">Phone:</h6>
                            <a href="tel:00222222200">+00 2222 222 00</a>
                        </div>
                    </div>
                    <a class="btn-two" href="page-contact.html">Contact Now</a>
                </div>
                <div class="mobile-nav-toggler d-block d-lg-none"><i class="icon lnr-icon-bars"></i></div>
                <!-- Mobile Nav toggler -->
            </div>
        </div>
        <div class="auto-container">
            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo"><a href="<?= Url::to(['/']) ?>"><img src="/iqac/images/logo/logo-light.png" alt=""></a></div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
                    <ul class="navigation clearfix d-block d-lg-none">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>
                    <div class="content-box d-none d-lg-block">
                        <h4 class="title">About Us</h4>
                        <p class="text">IQAC is the go-to hub for early adopters and innovation enthusiasts, offering cutting technology widely.</p>
                    </div>
                    <ul class="contact-list-one">
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+92880098670">+92 (8800) - 98670</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#98f0fdf4e8d8fbf7f5e8f9f6e1b6fbf7f5"><span class="__cf_email__" data-cfemail="056d60697545666a6875646b7c2b666a68">[email&#160;protected]</span></a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Send Email</span>
                                Mon - Sat 8:00 - 6:30, Sunday - CLOSED
                            </div>
                        </li>
                    </ul>
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- End Mobile Menu -->
            <!-- Header Search -->
            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>
                <div class="search-inner">
                    <form method="post" action="https://html.kodesolution.com/2025/consultez-html-v2/<?= Url::to(['/']) ?>">
                        <div class="form-group">
                            <input type="search" name="search-field" value="" placeholder="Search..." required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Header Search -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo">
                            <a href="<?= Url::to(['/']) ?>"><img src="<?= $setting->logo ?>" alt=""></a>
                        </div>
                        <!--Right Col-->
                        <div class="nav-outer">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-collapse show collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <!--Keep This Empty / Menu will come through Javascript-->
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sticky Menu -->
        </div>
    </header>
    <!--End Main Header -->

    <?= $content ?>
    <!-- Footer area start here -->
    <footer class="main-footer footer-style-one">
        <div class="outer-box">

            <div class="footer-left">
                <div class="logo">
                    <a href="<?= Url::to(['/']) ?>"><img src="/iqac/images/logo/logo-light.png" alt="Logo"></a>
                </div>
                <button class="back-top-btn mobile-nav-toggler">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="1.5" cy="1.5" r="1.5" fill="white" />
                        <circle cx="1.5" cy="9.5" r="1.5" fill="white" />
                        <circle cx="1.5" cy="17.5" r="1.5" fill="white" />
                        <circle cx="9.5" cy="1.5" r="1.5" fill="white" />
                        <circle cx="9.5" cy="9.5" r="1.5" fill="white" />
                        <circle cx="9.5" cy="17.5" r="1.5" fill="white" />
                        <circle cx="17.5" cy="1.5" r="1.5" fill="white" />
                        <circle cx="17.5" cy="9.5" r="1.5" fill="white" />
                        <circle cx="17.5" cy="17.5" r="1.5" fill="white" />
                    </svg>
                </button>
            </div>

            <div class="row g-0 w-100">
                <div class="col-xl-8 left-column order-2 order-xl-1">

                    <div class="footer-top">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="info-item">
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-phone"></i></li>
                                        <li>
                                            <span>Call Us:</span>
                                            <h5 class="title">+1-2345-2345-54</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="info-item">
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-envelope"></i></li>
                                        <li>
                                            <span>Email Us:</span>
                                            <h5 class="title"><a href="https://html.kodesolution.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="157c7b737a557d7079653b767a78">[email&#160;protected]</a></h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="info-item">
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-location-dot"></i></li>
                                        <li>
                                            <span>Hours:</span>
                                            <h5 class="title">Daily: 8 AM to 5 PM</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widgets-section">

                        <div class="row g-4">
                            <div class="col-lg-4 footer-column">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Services</h4>
                                    <div class="widget-content">
                                        <ul class="user-links">
                                            <li><a href="#0">Digital Marketing</a></li>
                                            <li><a href="#0">Innovation Space</a></li>
                                            <li><a href="#0">Competitive Analysis</a></li>
                                            <li><a href="#0">Market Research</a></li>
                                            <li><a href="#0">HR Management</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 footer-column">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Pages</h4>
                                    <div class="widget-content">
                                        <ul class="user-links">
                                            <li><a href="#0">Our Blog</a></li>
                                            <li><a href="#0">Success Stories</a></li>
                                            <li><a href="#0">Customers Review</a></li>
                                            <li><a href="#0">Contact Us</a></li>
                                            <li><a href="#0">About Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 footer-column">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Signup Newsletter</h4>
                                    <div class="input-feild">
                                        <input type="text" placeholder="Email Address">
                                        <a class="btn-one-rounded" href="#0">Sign up now <i class="fa-regular fa-angle-right"></i></a>
                                    </div>
                                    <ul class="footer-nav">
                                        <li><a href="#0"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#0"><i class="fa-solid fa-x"></i></a></li>
                                        <li><a href="#0"><i class="fa-brands fa-vimeo-v"></i></a></li>
                                        <li><a href="#0"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="footer-bottom">
                        <p class="copyright-text">© Copyright 2025. All Right by <a href="#0">Kodesolution</a></p>
                    </div>

                </div>
                <div class="col-xl-4 right-column order-1 order-xl-2">
                    <div class="inner-column">
                        <h3 class="title">Have a Project in
                            your Mind?</h3>
                        <a class="circle-btn" href="page-contact.html">Contact Us <i class="fa-regular fa-arrow-up-right"></i></a>
                        <div class="mt-10">
                            <h5 class="time">09 : 00 AM - 10 : 30 PM</h5>
                            <h5 class="date">Saturday - Thursday</h5>
                        </div>
                    </div>
                    <div class="shape">
                        <img src="/iqac/images/shape/footer-one-shape.png" alt="Image">
                    </div>
                </div>
            </div>


        </div>
    </footer>
    <!-- Footer area end here -->

</div>
<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
