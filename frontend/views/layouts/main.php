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
                        <li><i class="fa-solid fa-envelope"></i> <a href="mailto:info@iqac.asr.gov.uz"><span class="__cf_email__" data-cfemail="#">info@iqac.asr.gov.uz</span></a>
                        </li>
                        <li><i class="fa-solid fa-location-dot"></i> 45, Islam Karimov Street, Chilanzar Distrcit, Tashkent, Uzbekistan, 100066</li>
                    </ul>
                </div>

                <div class="top-right">
                    <ul class="useful-links">
<!--                        <li><a href="#">About</a></li>-->
<!--                        <li><a href="#">Faqs</a></li>-->
                        <li><a href="<?= Url::to(['/contact']) ?>">Contact</a></li>
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
                <div class="logo">
                    <a href="<?= Url::to(['/']) ?>">
                        <img src="<?= $setting->logo ?>" alt="IQAC" title="IQAC" style="max-height: 60px; height: auto; width: auto;">
                    </a>
                </div>

            </div>
            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <?php
                        // Asosiy menyu: parent_id = null, lekin 1 ta (id=1) elementni tashlab ketamiz
                        $mainPages = Pages::find()->andWhere(['parent_id' => null])->limit(3)->offset(1)->all();
                        foreach ($mainPages as $pages):
                            $subPages = Page::find()->andWhere(['parent_id' => null, 'pages_id' => $pages->id])->all();
                            if ($subPages): ?>
                                <li class="dropdown">
                                    <a href="#"><?= $pages->TitleTranslate ?></a>
                                    <ul>
                                        <?php foreach ($subPages as $subPage): ?>
                                            <li>
                                                <a href="<?= Url::to(['/site/page', 'url' => $subPage->url1]) ?>">
                                                    <?= $subPage->TitleTranslate ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?= Url::to(['/site/page', 'url' => $pages->url1]) ?>">
                                        <?= $pages->TitleTranslate ?>
                                    </a>
                                </li>
                            <?php endif;
                        endforeach;
                        ?>

                        <?php
                        // Maxsus menyu: id = 14 bo'lgan sahifani alohida ko‘rsatamiz
                        $extraPages = Pages::find()->andWhere(['parent_id' => null])->andWhere(['id' => 14])->all();
                        foreach ($extraPages as $pages): ?>
                            <li class="dropdown">
                                <a href="#"><?= $pages->TitleTranslate ?></a>
                                <ul>
                                    <?php
                                    $subPages = Page::find()->andWhere(['parent_id' => null, 'pages_id' => $pages->id])->all();
                                    foreach ($subPages as $subPage): ?>
                                        <li>
                                            <a href="<?= Url::to(['/site/page', 'url' => $subPage->url1]) ?>">
                                                <?= $subPage->TitleTranslate ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <!-- Til tanlash menyusi -->
                        <li class="dropdown">
                            <a href="#">
                                <img src="/templates/img/header/<?= \Yii::$app->language ?>.png" class="flag" style="width: 30px">
                                <?= strtoupper(\Yii::$app->language) ?>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= Yii::$app->params['og_language_uz']['content'] ?>">
                                        <img src="/templates/img/header/uz.png" alt="uz" style="width: 30px"> O'zbekcha
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->params['og_language_ru']['content'] ?>">
                                        <img src="/templates/img/header/ru.png" alt="ru" style="width: 30px"> Русский
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->params['og_language_en']['content'] ?>">
                                        <img src="/templates/img/header/en.png" alt="en" style="width: 30px"> English
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                            <a href="tel:+998712002024">+998(71)-200-20-24</a>
                        </div>
                    </div>
                    <a class="btn-two" href="<?= Url::to(['/contact']) ?>">Contact Now</a>
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
                        <div class="nav-logo">
                            <a href="<?= Url::to(['/']) ?>">
                                <img src="<?= $setting->logo ?>" alt="IQAC" style="max-height: 60px; height: auto; width: auto;">
                            </a>
                        </div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
                    <ul class="navigation clearfix d-block d-lg-none">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>

                    <ul class="contact-list-one">
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+998712002024">+998(71)-200-20-24</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a href="mailto:info@iqac.asr.gov.uz"><span class="__cf_email__" data-cfemail="#">info@iqac.asr.gov.uz</span></a>
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


            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo">
                            <a href="<?= Url::to(['/']) ?>"><img src="<?= $setting->logo ?>" style="max-width: 100px; height: auto; width: auto;" alt=""></a>
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
                                            <h5 class="title">+998(71)-200-20-24</h5>
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
                                            <h5 class="title"><a href="mailto:info@iqac.asr.gov.uz" class="__cf_email__">info@iqac.asr.gov.uz</a></h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 footer-column">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title"><?= Yii::t('app', 'Ijtimoiy tarmoqlar') ?></h4>
                                    <ul class="footer-nav mt-3">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-vimeo-v"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widgets-section">

                        <div class="row g-4">
                            <!-- Footer Pages -->
                            <div class="col-lg-6 footer-column">
                                <div class="footer-widget links-widget" style="color: white;">
                                    <h4 class="widget-title" style="color: white;"><?= Yii::t('app', 'Sahifalar') ?></h4>
                                    <div class="widget-content" style="color: white;">
                                        <ul class="user-links" style="color: white; list-style: none; padding-left: 0;">
                                            <?php
                                            $footerPages = Pages::find()
                                                ->andWhere(['parent_id' => null])
                                                ->andWhere(['not', ['id' => 1]])
                                                ->limit(5)
                                                ->all();

                                            foreach ($footerPages as $page):
                                                $subPages = Page::find()
                                                    ->andWhere(['parent_id' => null, 'pages_id' => $page->id])
                                                    ->andWhere(['<>', 'pages_id', 1])
                                                    ->all();

                                                if ($subPages): ?>
                                                    <li style="color: white;">
                                                        <strong style="color: white;"><?= $page->TitleTranslate ?>:</strong>
                                                    </li>
                                                    <?php foreach ($subPages as $sub): ?>
                                                        <li style="color: white;">
                                                            <a href="<?= Url::to(['/site/page', 'url' => $sub->url1]) ?>"
                                                               style="color: white; text-decoration: none;">
                                                                <?= $sub->TitleTranslate ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li style="color: white;">
                                                        <a href="<?= Url::to(['/site/page', 'url' => $page->url1]) ?>"
                                                           style="color: white; text-decoration: none;">
                                                            <?= $page->TitleTranslate ?>
                                                        </a>
                                                    </li>
                                                <?php endif;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <!-- Footer Language Switch -->
                            <div class="col-lg-6 footer-column">
                                <div class="footer-widget links-widget" style="color: white;">
                                    <h4 class="widget-title" style="color: white;"><?= Yii::t('app', 'Manzillar') ?></h4>
                                    <div class="widget-content" style="color: white;">
                                        <p class="mb-2" style="color: white;">
                                            <strong style="color: white;">IQAC - Head Office:</strong><br>
                                            45, Islam Karimov Street,<br>
                                            Chilanzar District, Tashkent, Uzbekistan, 100066
                                        </p>
                                        <p class="mb-2" style="color: white;">
                                            <strong style="color: white;">IQAC - TAQU Office:</strong><br>
                                            9A, Yangishahar Street,<br>
                                            Yunusabad District, Tashkent, Uzbekistan, 100206
                                        </p>
                                        <p class="mb-0" style="color: white;">
                                            <strong style="color: white;">IQAC - IUT (INHA) Office:</strong><br>
                                            9, Ziyolilar Street,<br>
                                            Mirzo Ulugbek District, Tashkent, Uzbekistan, 100170
                                        </p>
                                    </div>
                                </div>
                            </div>



                            <!-- Footer Socials -->

                        </div>


                    </div>

                    <div class="footer-bottom">
                        <p class="copyright-text">© Copyright 2025. All Right by <a href="https://t.me/adsh97">adsh</a></p>
                    </div>

                </div>
                <div class="col-xl-4 right-column order-1 order-xl-2">
                    <div class="inner-column">
                        <a class="circle-btn" href="<?= Url::to(['/contact']) ?>">Contact Us <i class="fa-regular fa-arrow-up-right"></i></a>
                        <div class="mt-10">
                            <h5 class="time">09 : 00 AM - 18 : 00 PM</h5>
                            <h5 class="date">Monday - Saturday</h5>
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
