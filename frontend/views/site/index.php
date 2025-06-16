<?php
/* @var $faculty_count common\models\Faculty */
/* @var $chair_count common\models\Chair */
/* @var $teacher_count common\models\User */
/* @var $symbol common\models\Symbol */

use frontend\widget\item\AlertWidget;
use frontend\widget\item\ItemWidget;
use yii\helpers\Url;
use common\models\Symbol;
use common\models\Faculty;
use common\models\Chair;
use common\models\Major;
use common\models\User;
use common\models\Pages;
use common\models\Page;
use common\models\Pagetext;

use common\models\Setting;
use common\models\News;
use yii\widgets\LinkPager;
use yii\helpers\Html;

$testimonials = Page::find()->andWhere(['parent_id' => null, 'pages_id' => 1])->all();


$this->registerJs(<<<JS

JS
    , 3)
?>

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
                            <div id="iqac-wrapper">

                                <div class="d-flex justify-content-center align-items-center min-vh-100 text-center">
                                    <div class="iqac-content">
                                        <h1 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">
                                            <strong><?= Yii::t("app", "British Educational Standards in Uzbekistan") ?></strong>
                                        </h1>

                                        <div class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">
                                            <h4>
                                                <strong>
                                                    <?= Yii::t("app", "Now you can obtain a British university degree without leaving Uzbekistan.
Thanks to the newly established International Qualifications and Assessment Centre (IQAC), world-class education is more accessible than ever before.") ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>


                                <div class="iqac-side">
                                    <img decoding="async" src="/unieducation/wp-content/uploads/baholash_markazi.png" alt="IQAC rasmi">
                                    <h4><?= Yii::t("app", "I want to study IQAC’s programs at:") ?></h4>

                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "INHA University in Tashkent in Business Management/Information Technologies") ?></a>
                                    </div>
                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "Tashkent University of Architecture and Civil Engineering in Architecture") ?></a>
                                    </div>
                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "Tashkent State University of Oriental Studies in Tourism and Hospitality") ?></a>
                                    </div>
                                </div>

                            </div> <!-- /#iqac-wrapper -->
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
                                    <h4 class="sub-title"><?=Yii::t('app', 'Bizning hamkorlarimiz')?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-lg-6 mb-30">
                                <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="0ms">
                                    <div class="home-blog-thumb">
                                        <img decoding="async" src="/unieducation/wp-content/uploads/1.png"
                                             alt="Partner 1">
                                        <ul class="home-blog-meta">

                                            <li>Partner</li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4 class="blog-title">
                                                <a href="#">Integrated Qualifications Framework (IQF)</a>
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 mb-30">
                                <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="200ms">
                                    <div class="home-blog-thumb">
                                        <img decoding="async" src="/unieducation/wp-content/uploads/2.jpg"
                                             alt="Partner 2">
                                        <ul class="home-blog-meta">
                                            <li>Partner</li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4 class="blog-title">
                                                <a href="#">University of West London (via IQF)</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 mb-30">
                                <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="400ms">
                                    <div class="home-blog-thumb">
                                        <img decoding="async" src="/unieducation/wp-content/uploads/3.jpg"
                                             alt="Partner 3">
                                        <ul class="home-blog-meta">
                                            <li>Partner</li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4 class="blog-title">
                                                <a href="#">University of Hertfordshire (via IQF)</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 mb-30">
                                <div class="home-blog-style-one-item wow fadeInUp" data-wow-delay="400ms">
                                    <div class="home-blog-thumb">
                                        <img decoding="async" src="/unieducation/wp-content/uploads/4.jpg"
                                             alt="Partner 3">
                                        <ul class="home-blog-meta">
                                            <li>Partner</li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4 class="blog-title">
                                                <a href="#">University of Gloucestershire (via IQF)</a>
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
</div>

