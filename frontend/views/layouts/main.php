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
    ) : '/template/assets/images/logos/favicon.png' ?>" type="image/png">
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>
<!-- Start Preloader
============================================= -->
<div id="preloader">
    <div id="gixus-preloader" class="gixus-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="Q" class="letters-loading">Q</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="C" class="letters-loading">C</span>
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

    <header id="masthead" itemscope="itemscope">
        <p class="main-title bhf-hidden" itemprop="headline"><a href="<?= Url::to(['/']) ?>" title="IQAC &#8211; Business Consulting" rel="home">IQAC &#8211;Business Consulting</a></p>
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
                                        <a class="navbar-brand" href="<?= Url::to(['/']) ?>">
                                            <img src="<?= $setting->logo ?>"
                                                 class="logo"
                                                 alt="Logo">
                                        </a>
                                    </div>
                                    <!-- End Header Navigation -->

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-menu">
                                        <!-- MegaMenu -->
                                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown"
                                            data-out="fadeOutUp">

                                            <?php
                                            foreach (
                                                Pages::find()->andWhere(['parent_id' => null])->limit(1)->all(
                                                ) as $pages
                                            ): ?>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <?= $pages->TitleTranslate ?>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $subPages = Page::find()->andWhere(
                                                            ['parent_id' => null, 'pages_id' => $pages->id]
                                                        )->all(); ?>
                                                        <?php
                                                        foreach ($subPages as $subPage): ?>

                                                            <li>
                                                                <a href="<?= Url::to(
                                                                    ['/site/page', 'url' => $subPage->url1]
                                                                ) ?>">
                                                                    <?= $subPage->TitleTranslate ?>
                                                                </a>
                                                            </li>
                                                        <?php
                                                        endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php
                                            endforeach; ?>
                                            <?php
                                            foreach (
                                                Pages::find()->andWhere(['parent_id' => null])->offset(1)->all(
                                                ) as $pages
                                            ): ?>
                                                <?php
                                                $subPages = Page::find()->andWhere(
                                                    ['parent_id' => null, 'pages_id' => $pages->id]
                                                )->all(); ?>
                                                <?php
                                                foreach ($subPages as $subPage): ?>
                                                    <li>
                                                        <a href="<?= Url::to(['/site/page', 'url' => $subPage->url1]
                                                        ) ?>">
                                                            <?= $pages->TitleTranslate ?>
                                                        </a>
                                                    </li>
                                                <?php
                                                endforeach; ?>
                                            <?php
                                            endforeach; ?>


                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <img src="/templates/img/header/<?= \Yii::$app->language ?>.png"
                                                         class="flag" style="width: 50px">
                                                    <?= strtoupper(\Yii::$app->language) ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= Yii::$app->params['og_language_uz']['content'] ?>">
                                                            <img src="/templates/img/header/uz.png" alt="uz"
                                                                 style="width: 50px"> O'zbekcha
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Yii::$app->params['og_language_ru']['content'] ?>">
                                                            <img src="/templates/img/header/ru.png" alt="ru"
                                                                 style="width: 50px"> Русский
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Yii::$app->params['og_language_en']['content'] ?>">
                                                            <img src="/templates/img/header/en.png" alt="en"
                                                                 style="width: 50px"> English
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>

                                    <!--<div class="attr-right">-->
                                    <!--    <div class="attr-nav">-->
                                    <!--        <ul>-->
                                    <!--            <li class="button">-->
                                    <!--                <a href="<?= Url::to(['/']) ?>">-->
                                    <!--                    Get consultant </a>-->
                                    <!--            </li>-->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    </div>

                                    <!-- Overlay screen for menu -->
                                    <div class="overlay-screen"></div>
                                    <!-- End Overlay screen for menu -->
                                    </nav>
                                    <!-- End Navigation -->
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?= $content ?>


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
                                                        <p>For cooperations:</p>

                                                        <h4>
                                                            <i class="fas fa-solid fa-envelope"></i>
                                                            <a href="mailto:admin@iqac.asr.gov.uz">admin@iqac.asr.gov.uz</a>
                                                        </h4>
                                                        <h4>
                                                            <i class="fas fa-solid fa-envelope"></i>
                                                            <a href="mailto:info@iqac.asr.gov.uz">info@iqac.asr.gov.uz</a>
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <p>Call us anytime</p>
                                                        <h4>
                                                            <i class="fas fa-solid fa-phone"></i>
                                                            <a href="tel:+998931639922">+998 93 163 99 22</a>
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <p>Our Location</p>
                                                        <h4>
                                                            <i class="fas fa-solid fa-location"></i>
                                                            <a href="#">Uzbekistan, Tashkent</a>
                                                        </h4>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <?php
                                        foreach (
                                            Pages::find()->andWhere(['parent_id' => null])->limit(1)->all() as $pages
                                        ): ?>
                                            <div class="col-lg-2 col-md-6 footer-item">
                                                <div class="f-item link">
                                                    <h4 class="widget-title"><?= $pages->TitleTranslate ?></h4>
                                                    <ul>
                                                        <?php
                                                        $subPages = Page::find()->andWhere(
                                                            ['parent_id' => null, 'pages_id' => $pages->id]
                                                        )->all(); ?>
                                                        <?php
                                                        foreach ($subPages as $subPage): ?>

                                                            <li>
                                                                <a href="<?= Url::to(
                                                                    ['/site/page', 'url' => $subPage->url1]
                                                                ) ?>">
                                                                    <?= $subPage->TitleTranslate ?>
                                                                </a>
                                                            </li>
                                                        <?php
                                                        endforeach; ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach; ?>

                                        <div class="col-lg-2 col-md-6 footer-item">
                                            <div class="f-item link">
                                                <?php
                                                foreach (
                                                    Pages::find()->andWhere(['parent_id' => null])->offset(1)->all(
                                                    ) as $pages
                                                ): ?>
                                                    <ul>
                                                        <?php
                                                        $subPages = Page::find()->andWhere(
                                                            ['parent_id' => null, 'pages_id' => $pages->id]
                                                        )->all(); ?>
                                                        <?php
                                                        foreach ($subPages as $subPage): ?>

                                                            <li>
                                                                <a href="<?= Url::to(
                                                                    ['/site/page', 'url' => $subPage->url1]
                                                                ) ?>">
                                                                    <h5 class="widget-title"><?= $pages->TitleTranslate ?></h5>
                                                                </a>
                                                            </li>
                                                        <?php
                                                        endforeach; ?>
                                                    </ul>
                                                <?php
                                                endforeach; ?>
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
                                                                   value="369"/>
                                                            <input type="hidden" name="_wpcf7_version"
                                                                   value="5.9.8"/>
                                                            <input type="hidden" name="_wpcf7_locale"
                                                                   value="en_US"/>
                                                            <input type="hidden" name="_wpcf7_unit_tag"
                                                                   value="wpcf7-f369-o1"/>
                                                            <input type="hidden"
                                                                   name="_wpcf7_container_post" value="0"/>
                                                            <input type="hidden"
                                                                   name="_wpcf7_posted_data_hash" value=""/>
                                                        </div>
                                                        <span class="wpcf7-form-control-wrap"
                                                              data-name="email1"><input size="40"
                                                                                        maxlength="400"
                                                                                        class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email form-control"
                                                                                        id="email1" aria-required="true"
                                                                                        aria-invalid="false"
                                                                                        placeholder="Your Email"
                                                                                        value=""
                                                                                        type="email"
                                                                                        name="email1"/></span>
                                                        <button type="submit"><i
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
                                            &copy; Copyright 2025. All Rights Reserved by <a
                                                    href="https://t.me/adsh97">adsh</a>
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <ul class="link-list">
                                                <li>
                                                    <a href="#">
                                                        About </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Team </a>
                                                </li>
                                                <li>
                                                    <a href="#">
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


<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
