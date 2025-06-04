<?php
/* @var $models common\models\Pages */

use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\widget\standart\StandartWidget;
use common\models\Page;

$this->title = $pageOne->titleTranslate;
//dd($pageOne);
$file = Page::find()->all();
$this->registerJs(<<<JS
JS
    , 3)


?>
<section class="intro">
    <div class="intro-video">
        <video autoplay loop playsinline  src="/frontend/web/templates/video/video.mp4"></video>
    </div>
    <div class="intro__inner">
        <div class="intro-content">
            <div class="content-title"><?=$pageOne->titleTranslate?></div>
        </div>
    </div>
</section>
<section class="contact">
    <div class="container">
        <h2 class="sec-title gallery__title"><?=Yii::t('app', 'Aloqa uchun')?></h2>
        <div class="contact__inner row">
            <div class="col-lg-6 col-sm-12 contact__inner-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22681.244386803548!2d69.20389070481806!3d41.28194071881612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6540c5347110c9e4!2z0KPQt9Cx0LXQutGB0LrQuNC5INCT0L7RgdGD0LTQsNGA0YHRgtCy0LXQvdC90YvQuSDQo9C90LjQstC10YDRgdC40YLQtdGCINCc0LjRgNC-0LLRi9GFINCv0LfRi9C60L7QsiDQo9C30JPQo9Cc0K8!5e0!3m2!1sru!2s!4v1643028552870!5m2!1sru!2s"></iframe>
            </div>
            <div class="col-lg-6 col-sm-12 contact__inner-info">
                <h3 class="sec-title"><?=Yii::t('app', 'Kontaktlar')?></h3>
                <div class="info-block">

                    <a href="#" class="info-social">
                        <div class="icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marked-alt"
                                 class="svg-inline--fa fa-map-marked-alt mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z">
                                </path>
                            </svg>
                        </div>
                        <div class="text"><?=Yii::t('app', 'Address')?>: Toshkent shahri, Kichik Xalqa Yo`li ko`chasi, G-9a mavzesi, 21-a uy.</div>
                    </a>

                    <a href="#" class="info-social">
                        <div class="icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="archive"
                                 class="svg-inline--fa fa-archive mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M32 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3 0 64v48c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z">
                                </path>
                            </svg>
                        </div>
                        <div class="text">Postal code: 100138</div>
                    </a>

                    <a href="#" class="info-social">
                        <div class="icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt"
                                 class="svg-inline--fa fa-phone-alt mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z">
                                </path>
                            </svg>
                        </div>
                        <div class="text">Phone: +998 71 230-13-58</div>
                    </a>

                    <a href="#" class="info-social">
                        <div class="icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
                                 class="svg-inline--fa fa-envelope mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                </path>
                            </svg>
                        </div>
                        <div class="text">Email: uzdjtu@uzswlu.uz, uzgumya@exat.uz,  uzgumya1@exat.uz, uzdjtu_d@edu.uz, uzswluranking@gmail.com, international@uzswlu.uz</div>
                    </a>


                </div>
            </div>
        </div>
    </div>
</section>


