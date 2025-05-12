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
                        <div class="container py-5">
                            <div class="row align-items-center">
                                <!-- Text qismi -->
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="pe-lg-4">
                                        <h4><strong>Britaniya</strong> Ta`lim Standartlari O`zbekistonda</h4>
                                        <p>
                                            <strong>Endi Britaniya universiteti diplomini O`zbekistonda qo`lga kiriting</strong><br>
                                            Yangi tashkil etilgan Xalqaro Malakalar va Baholash Markazi (IQAC) orqali jahon darajasidagi ta`lim endi yanada yaqinroq bo`ldi.<br>
                                            <strong>Biz haqimizda</strong><br>
                                            O`zbekiston Respublikasi Prezident huzuridagi Strategik islohotlar agentligi tashabbusi bilan...
                                        </p>
                                    </div>
                                </div>

                                <!-- Rasm qismi -->
                                <div class="col-lg-6">
                                    <img src="/unieducation/wp-content/uploads/baholash_markazi.jpg"
                                         alt="IQAC Markazi"
                                         class="img-fluid rounded shadow">
                                </div>
                            </div>

                            <!-- Rasm pastida davom etadigan text -->
                            <div class="row mt-5">
                                <div class="col-12">
                                    <p>
                                        IQAC tomonidan taklif etilayotgan 3, 4, 5, 6 va 7-darajadagi malakalar Angliya OFQUAL tomonidan tasdiqlangan RQF...
                                        <br>
                                        Ushbu dasturlar quyidagi yetakchi O‘zbekiston universitetlarida amalga oshiriladi:
                                    <ul>
                                        <li>INHA Universiteti</li>
                                        <li>Toshkent Arxitektura va Qurilish Universiteti</li>
                                        <li>Sharqshunoslik Universiteti</li>
                                    </ul>
                                    <strong>Xalqaro hamkorlar:</strong>
                                    <ul>
                                        <li>Gloucestershire Universiteti</li>
                                        <li>QA Higher Education</li>
                                        <li>West London Universiteti</li>
                                        <li>va boshqalar...</li>
                                    </ul>
                                    </p>
                                    <a href="#" class="btn btn-gradient mt-3">Men o‘qishni hohlayman</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="elementor-element elementor-element-df0f476 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="df0f476" data-element_type="container" id="testimonial">
        <div class="elementor-widget-container">
            <div class="testimonial-style-three-area relative bg-gray">
                <div class="container">
                    <div class="col-xl-12 col-lg-12">
                        <div class="site-heading">
                            <h4 class="sub-title"><?=Yii::t('app', 'Bizning loyihalarimiz')?></h4>
                        </div>
                    </div>
                    <div class="row align-center">
                        <div class="col-lg-12">
                            <div class="testimonial-style-three-items">
                                <div class="testimonial-style-three-carousel swiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach (Pages::find()->andWhere(['parent_id' => null])->limit(1)->all() as $pages): ?>
                                            <?php $subPages = Page::find()->andWhere(['parent_id' => null, 'pages_id' => $pages->id])->all(); ?>
                                            <?php foreach ($subPages as $testimonial): ?>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-style-three">
                                                        <div class="thumb">
                                                            <img
                                                                style="width: 100%; height: 500px; object-fit: cover; border-radius: 10px;"
                                                                decoding="async"
                                                                src="/uploads/page/icon/<?= $testimonial->filename ?>"
                                                                alt="Image">
                                                            <div class="icon">
                                                                <img decoding="async" src="/unieducation/wp-content/themes/gixus/assets/img/quote.png" alt="Quote Icon">
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="top">
                                                                    <h2><?= $pages->TitleTranslate ?></h2>
                                                                </div>

                                                                <p><?=$testimonial->TitleTranslate?></p>

                                                                <div class="button mt-40 wow fadeInUp" data-wow-delay="1200ms"
                                                                     data-wow-duration="400ms">
                                                                    <a class="btn btn-md circle btn-gradient animation"
                                                                       href="<?= Url::to(['/site/page', 'url' => $testimonial->url1]) ?>">
                                                                        Get More </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-nav-left">
                                        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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

