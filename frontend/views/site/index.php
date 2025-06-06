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

                                <div class="iqac-content">
                                    <h4 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">
                                        <strong><?= Yii::t("app", "Britaniya Taʼlim Standartlari Oʻzbekistonda") ?></strong>
                                    </h4>

                                    <div class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">
                                        <p><strong><?= Yii::t("app", "Endi Britaniya universiteti diplomini Oʻzbekistonda qoʻlga kiriting") ?></strong></p>

                                        <p><?= Yii::t("app", "Yangi tashkil etilgan Xalqaro Malakalar va Baholash Markazi (IQAC) orqali jahon darajasidagi taʼlim endi yanada yaqinroq boʻldi.") ?></p>

                                        <p><strong><?= Yii::t("app", "Biz haqimizda") ?></strong></p>

                                        <p><?= Yii::t("app", "Oʻzbekiston Respublikasi Prezident huzuridagi Strategik islohotlar agentligi tashabbusi bilan, Oliy taʼlim, fan va innovatsiyalar vazirligi hamkorligida, Oʻzbekiston Respublikasi Vazirlar Mahkamasining qaroriga asosan IQAC tashkil etildi. Markazning asosiy maqsadi – xalqaro mezonlarga moslashtirilgan taʼlim dasturlarini mahalliy miqyosda taqdim etish.") ?></p>

                                        <p><strong><?= Yii::t("app", "Xalqaro standartlar, mahalliy ahamiyat") ?></strong></p>

                                        <p><?= Yii::t("app", "IQAC tomonidan taklif etilayotgan 3, 4, 5, 6 va 7-darajadagi (professional akademik) malakalar Angliya OFQUAL tomonidan tasdiqlangan RQF (Regulated Qualifications Framework) standartlariga mos ravishda ishlab chiqilgan. Shu bilan birga, ular Oʻzbekistonning milliy taʼlim tizimi bilan uygʻunlashtirilgan.") ?></p>

                                        <p><?= Yii::t("app", "IQAC 3–7 darajadagi RQF asosidagi dasturlarni ishlab chiqadi va akkreditatsiyadan oʻtkazadi. Ushbu dasturlar quyidagi yetakchi Oʻzbekiston universitetlarida hamkorlikda amalga oshiriladi:") ?></p>

                                        <ul>
                                            <li><?= Yii::t("app", "Toshkentdagi INHA Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Toshkent Arxitektura va Qurilish Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Toshkent Davlat Sharqshunoslik Universiteti") ?></li>
                                        </ul>

                                        <p><?= Yii::t("app", "Mazkur dasturlar xalqaro miqyosda tan olinadi. Bu Chartered Management Institute (CMI) hamda quyidagi nufuzli Britaniya universitetlari bilan hamkorlikda taʼminlanadi:") ?></p>

                                        <ul>
                                            <li><?= Yii::t("app", "Gloucestershire Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Hertfordshire Universiteti") ?></li>
                                            <li><?= Yii::t("app", "QA Higher Education") ?></li>
                                            <li><?= Yii::t("app", "Northumbria Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Ulster Universiteti") ?></li>
                                            <li><?= Yii::t("app", "West London Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Central Lancashire Universiteti") ?></li>
                                            <li><?= Yii::t("app", "Wolverhampton Universiteti") ?></li>
                                            <li><?= Yii::t("app", "va boshqalar.") ?></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="iqac-side">
                                    <img decoding="async" src="/unieducation/wp-content/uploads/baholash_markazi.png" alt="IQAC rasmi">
                                    <h4><?= Yii::t("app", "Men oʻqishni xohlayman:") ?></h4>

                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "Toshkentdagi INHA Universiteti") ?></a>
                                    </div>
                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "Toshkent Arxitektura va Qurilish Universiteti") ?></a>
                                    </div>
                                    <div class="button wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="400ms">
                                        <a class="btn btn-md circle btn-gradient animation" href="#"><?= Yii::t("app", "Toshkent Davlat Sharqshunoslik Universiteti") ?></a>
                                    </div>
                                </div>

                            </div> <!-- /#iqac-wrapper -->
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

