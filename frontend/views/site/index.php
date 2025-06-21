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
<!-- Banner area start here -->
<section class="banner-section">
    <div class="arry"><img class="animation__arryLeftRight" src="/iqac/images/shape/banner-arry.png" alt="Image"></div>
<!--    <div class="sec-shape">-->
<!--        <img src="/iqac/images/shape/banner-shape.png" alt="Image">-->
<!--    </div>-->
    <button class="goBottom-btn">
        <svg class="animation__arryUpDown" width="16" height="36" viewBox="0 0 16 36" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                    d="M13.8328 6.33334C13.8328 5.17961 13.4907 4.0518 12.8497 3.09251C12.2088 2.13322 11.2977 1.38555 10.2318 0.944039C9.16591 0.502527 7.99302 0.387008 6.86146 0.612088C5.72991 0.837169 4.69051 1.39274 3.8747 2.20855C3.0589 3.02435 2.50332 4.06375 2.27824 5.19531C2.05316 6.32686 2.16868 7.49975 2.61019 8.56566C3.05171 9.63156 3.79938 10.5426 4.75867 11.1836C5.71795 11.8245 6.84577 12.1667 7.99949 12.1667C9.54602 12.1648 11.0287 11.5496 12.1222 10.4561C13.2158 9.3625 13.831 7.87986 13.8328 6.33334ZM3.83283 6.33334C3.83283 5.50925 4.0772 4.70366 4.53504 4.01846C4.99287 3.33325 5.64362 2.7992 6.40498 2.48384C7.16634 2.16847 8.00412 2.08596 8.81237 2.24673C9.62062 2.4075 10.3631 2.80434 10.9458 3.38706C11.5285 3.96978 11.9253 4.71221 12.0861 5.52046C12.2469 6.32871 12.1644 7.16649 11.849 7.92785C11.5336 8.68921 10.9996 9.33995 10.3144 9.79779C9.62916 10.2556 8.82358 10.5 7.99949 10.5C6.89474 10.499 5.83552 10.0597 5.05434 9.27849C4.27316 8.49731 3.83385 7.43809 3.83283 6.33334ZM15.2554 27.4108C15.3327 27.4882 15.3941 27.58 15.436 27.6811C15.4779 27.7822 15.4995 27.8905 15.4995 28C15.4995 28.1094 15.4779 28.2177 15.436 28.3188C15.3941 28.4199 15.3327 28.5118 15.2554 28.5891L8.58869 35.2558C8.51133 35.3332 8.41948 35.3946 8.31839 35.4365C8.2173 35.4783 8.10895 35.4999 7.99953 35.4999C7.8901 35.4999 7.78175 35.4783 7.68066 35.4365C7.57957 35.3946 7.48772 35.3332 7.41036 35.2558L0.743692 28.5891C0.591894 28.432 0.507898 28.2215 0.509797 28.003C0.511696 27.7845 0.599336 27.5755 0.753843 27.421C0.90835 27.2664 1.11736 27.1788 1.33586 27.1769C1.55436 27.175 1.76486 27.259 1.92203 27.4108L7.16616 32.655V18C7.16616 17.779 7.25396 17.567 7.41024 17.4107C7.56652 17.2545 7.77848 17.1667 7.99949 17.1667C8.22051 17.1667 8.43247 17.2545 8.58875 17.4107C8.74503 17.567 8.83283 17.779 8.83283 18V32.655L14.077 27.4109C14.1543 27.3334 14.2462 27.272 14.3473 27.2302C14.4484 27.1883 14.5567 27.1667 14.6661 27.1667C14.7756 27.1667 14.8839 27.1882 14.985 27.2301C15.0861 27.272 15.178 27.3334 15.2554 27.4108Z"
                    fill="white" />
        </svg>
    </button>

    <div class="swiper banner-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-bg" data-background="/iqac/images/banner/banner-image1.jpg"></div>
                <div class="container">
                    <div class="outer-box">
                        <div class="row g-0 align-items-end">
                            <div class="col-lg-8 content-column">
                                <div class="inner-column">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".3s">iqac.asr.gov.uz
                                    </h6>
                                    <h1 class="title" data-animation="fadeInUp" data-delay=".5s">
                                        <?= Yii::t("app", "British Educational Standards in Uzbekistan") ?>
                                    </h1>
                                    <h3 class="title" data-animation="fadeInUp" data-delay=".5s">
                                        <?= Yii::t("app", "Now you can obtain a British university degree without leaving Uzbekistan.
Thanks to the newly established International Qualifications and Assessment Centre (IQAC), world-class education is more accessible than ever before.") ?>
                                    </h3>
                                    <a class="btn-one" data-animation="fadeInUp" data-delay=".8s" href="<?= Url::to(['/contact']) ?>">
                                        <?= Yii::t("app", "INHA University in Tashkent in Business Management/Information Technologies") ?>
                                    </a>

                                    <a class="btn-one" data-animation="fadeInUp" data-delay=".8s" href="<?= Url::to(['/contact']) ?>">
                                        <?= Yii::t("app", "Tashkent University of Architecture and Civil Engineering in Architecture") ?>
                                    </a>

                                    <a class="btn-one" data-animation="fadeInUp" data-delay=".8s" href="<?= Url::to(['/contact']) ?>">
                                        <?= Yii::t("app", "Tashkent State University of Oriental Studies in Tourism and Hospitality") ?>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <p class="text" data-animation="fadeInUp" data-delay=".9s">IQAC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner area end here -->



<!-- Blog area start here -->
<section class="blog-section pb-120">
    <div class="container">
        <div class="sec-title mb-50">
            <h6 class="sub-title wow fadeInUp"><?= Yii::t('app', 'Yangiliklar') ?></h6>
            <div class="flex-content">
                <h2 class="title wow splt-txt" data-splitting><?= Yii::t('app', 'Oxirgi yangiliklar') ?></h2>
                <a href="<?= Url::to(['/site/news']) ?>" class="btn-two wow fadeInUp"><?= Yii::t('app', 'Barcha yangiliklar') ?></a>
            </div>
        </div>

        <div class="swiper blog-slider">
            <div class="swiper-wrapper">
                <?php foreach (\common\models\News::find()->where(['status' => 1, 'eye' => 1])->orderBy(['created_at' => SORT_DESC])->limit(6)->all() as $news): ?>
                    <div class="swiper-slide">
                        <div class="blog-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img src="/uploads/news/<?= $news->filename ?>" alt="<?= $news->getTitleTranslate() ?>">
                                    </figure>
                                </div>
                                <div class="content-box">
                                    <ul class="info">
                                        <li>
                                            <svg width="19" height="19" fill="none"><circle cx="9.5" cy="9.5" r="9.5" fill="#C6D936"/></svg>
                                            <a href="#0"><?= date('d.m.Y', strtotime($news->created_at)) ?></a>
                                        </li>
                                    </ul>
                                    <h4 class="title">
                                        <a href="<?= Url::to(['/site/news', 'url' => $news->url1]) ?>">
                                            <?= $news->getTitleTranslate() ?>
                                        </a>
                                    </h4>
                                    <div class="all-btn all-category d-flex align-items-center mt-3">
                                        <a href="<?= Url::to(['/site/news', 'url' => $news->url1]) ?>" class="btn btn-primary">
                                            <?= Yii::t('app', 'Ko`proq o`qish') ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-dot text-center blog-pagination mt-40"></div>
        </div>
    </div>
</section>
<!-- Blog area end here -->



<!-- Case area start here -->
<section class="case-section have-combine pt-120 pb-120">
    <div class="outer-box">
        <div class="sec-title center mb-50">
<!--            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Case study</h6>-->
            <h2 class="title wow splt-txt"><?=Yii::t('app', 'Bizning hamkorlarimiz')?></h2>
        </div>
        <div class="swiper case-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/1.png" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">Integrated Qualifications Framework (IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">Integrated Qualifications Framework (IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/2.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of West London (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of West London (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/3.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Hertfordshire (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Hertfordshire (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/4.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Gloucestershire (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Gloucestershire (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/1.png" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">Integrated Qualifications Framework (IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">Integrated Qualifications Framework (IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/2.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of West London (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of West London (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/3.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Hertfordshire (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Hertfordshire (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="case-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="/unieducation/wp-content/uploads/4.jpg" alt="Image">
                            </figure>
                            <div class="content-box">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Gloucestershire (via IQF)</a></h4>
                            </div>
                            <a class="arry-btn" href="#"><i class="fa-regular fa-arrow-up-right"></i></a>
                            <div class="hover-content">
                                <span class="sub-title">Partner</span>
                                <h4 class="title"><a href="#">University of Gloucestershire (via IQF)</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Case area end here -->

<!-- Team area start here -->
<!--<section class="team-section pt-120 pb-120">-->
<!--    <div class="team-shape wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">-->
<!--        <img class="sway__animation" src="/iqac/images/shape/team-shape.png" alt="Image">-->
<!--    </div>-->
<!--    <div class="container">-->
<!--        <div class="sec-title center mb-50">-->
<!--            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Top Consultant</h6>-->
<!--            <h2 class="title wow splt-txt" data-splitting>Enhance Your Experience with <br> Expert Consulting</h2>-->
<!--        </div>-->
<!---->
<!--        <div class="row g-4">-->
<!--            <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">-->
<!--                <div class="team-block">-->
<!--                    <div class="inner-box">-->
<!--                        <figure class="image">-->
<!--                            <img src="/iqac/images/team/team-image1.jpg" alt="Image">-->
<!--                        </figure>-->
<!--                        <div class="socials">-->
<!--                            <i class="fa-solid fa-plus"></i>-->
<!--                            <ul>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-facebook-f"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-behance"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="content-box">-->
<!--                            <h4 class="title"><a href="page-team-details.html">Guy Hawkins</a></h4>-->
<!--                            <p class="sub-title">Admin</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">-->
<!--                <div class="team-block">-->
<!--                    <div class="inner-box">-->
<!--                        <figure class="image">-->
<!--                            <img src="/iqac/images/team/team-image2.jpg" alt="Image">-->
<!--                        </figure>-->
<!--                        <div class="socials">-->
<!--                            <i class="fa-solid fa-plus"></i>-->
<!--                            <ul>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-facebook-f"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-behance"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="content-box">-->
<!--                            <h4 class="title"><a href="page-team-details.html">Jacob Jones</a></h4>-->
<!--                            <p class="sub-title">Manager</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">-->
<!--                <div class="team-block">-->
<!--                    <div class="inner-box">-->
<!--                        <figure class="image">-->
<!--                            <img src="/iqac/images/team/team-image3.jpg" alt="Image">-->
<!--                        </figure>-->
<!--                        <div class="socials">-->
<!--                            <i class="fa-solid fa-plus"></i>-->
<!--                            <ul>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-facebook-f"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-behance"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="content-box">-->
<!--                            <h4 class="title"><a href="page-team-details.html">Kristin Watson</a></h4>-->
<!--                            <p class="sub-title">Consultant</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">-->
<!--                <div class="team-block">-->
<!--                    <div class="inner-box">-->
<!--                        <figure class="image">-->
<!--                            <img src="/iqac/images/team/team-image4.jpg" alt="Image">-->
<!--                        </figure>-->
<!--                        <div class="socials">-->
<!--                            <i class="fa-solid fa-plus"></i>-->
<!--                            <ul>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-facebook-f"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-instagram"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
<!--                                <li><a href="#0"><i class="fa-brands fa-behance"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="content-box">-->
<!--                            <h4 class="title"><a href="page-team-details.html">Bessie Cooper</a></h4>-->
<!--                            <p class="sub-title">Founder</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Team area end here -->



