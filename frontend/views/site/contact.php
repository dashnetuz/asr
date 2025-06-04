<?php
/* @var $models common\models\Pages */

use yii\widgets\LinkPager;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use frontend\widget\standart\StandartWidget;
use common\models\Page;
use common\models\Pages;

$this->title = "Contact";

$this->registerJs(<<<JS
$(document).on('input', '#model-tell', function () {
    // Input faqat raqamlarni qabul qiladi, va +998 bilan boshlanadi
    let value = this.value.replace(/\D/g, ''); // Faqat raqamlarni qoldiramiz
    if (!value.startsWith('998')) { // Agar 998 yo'q bo'lsa, oldiga qo'shamiz
        value = '998' + value;
    }
    this.value = '+' + value.substring(0, 12); // Maksimal uzunlik 12 belgi
});

JS
    , 3);


?>
<div data-elementor-type="wp-page" data-elementor-id="543" class="elementor elementor-543">
    <div class="elementor-element elementor-element-be17373 e-con-full e-flex e-con e-parent"
         data-id="be17373" data-element_type="container">
        <div class="elementor-element elementor-element-ade3275 elementor-widget elementor-widget-pages_pages_contact_section"
             data-id="ade3275" data-element_type="widget"
             data-widget_type="pages_pages_contact_section.default">
            <div class="elementor-widget-container">
                <div class="contact-style-one-area overflow-hidden default-padding">
                    <div class="contact-shape">
                        <img decoding="async"
                             src="/unieducation/wp-content/themes/gixus/assets/img/illustration/14.png"
                             alt="Image Not Found">
                    </div>
                    <div class="container">
                        <div class="row align-center">
                            <div class="contact-stye-one col-lg-5 mb-md-50 mb-xs-40">
                                <div class="contact-style-one-info">
                                    <h4 class="sub-title">Savollaringiz bormi?</h4>
                                    <h2>Biz bilan aloqa</h2>
                                    <ul>
                                        <!-- Telefon -->
                                        <li class="wow fadeInUp" data-wow-delay="0ms">
                                            <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                            <div class="content">
                                                <h5 class="title"><a href="tel:+998000000000">+998 00 000 00 00</a></h5>
                                            </div>
                                        </li>

                                        <!-- Manzil -->
                                        <li class="wow fadeInUp" data-wow-delay="100ms">
                                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                            <div class="content">
                                                <h5 class="title">
                                                    <a href="https://www.google.com/maps/place/Davlat+Boshqaruv+Akademiyasi/@41.3106434,69.2548674,17z" target="_blank">
                                                        O'zbekiston shoh ko'chasi 45, Toshkent
                                                    </a>
                                                </h5>
                                            </div>
                                        </li>

                                        <!-- Email - Cooperation -->
                                        <li class="wow fadeInUp" data-wow-delay="200ms">
                                            <div class="icon"><i class="fas fa-envelope"></i></div>
                                            <div class="content">
                                                <h5 class="title"><a href="mailto:admin@iqac.asr.gov.uz">admin@iqac.asr.gov.uz</a></h5>
                                                <h5 class="title"><a href="mailto:info@iqac.asr.gov.uz">info@iqac.asr.gov.uz</a></h5>
                                            </div>
                                        </li>

                                        <!-- Telegram / Instagram / Web -->
                                        <li class="wow fadeInUp" data-wow-delay="300ms">
                                            <div class="content">
                                                <h5 class="title">
                                                    <i class="fab fa-telegram"></i>
                                                    <a href="https://t.me/iqacuz_bot" target="_blank">@iqacuz_bot</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fab fa-telegram-plane"></i>
                                                    <a href="https://t.me/iqac_uz" target="_blank">@iqac_uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fab fa-instagram"></i>
                                                    <a href="https://instagram.com/iqac.uz" target="_blank">@iqac.uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fas fa-globe"></i>
                                                    <a href="https://iqac.asr.gov.uz" target="_blank">iqac.asr.gov.uz</a>
                                                </h5>
                                            </div>
                                        </li>

                                        <!-- Xodimlar -->
                                        <li class="wow fadeInUp" data-wow-delay="400ms">
                                            <div class="content">
                                                <h5 class="title">
                                                    <i class="fas fa-user-tie"></i> Director:
                                                    <a href="mailto:k.khomidov@iqac.asr.gov.uz">k.khomidov@iqac.asr.gov.uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fas fa-user-graduate"></i> Academic Director:
                                                    <a href="mailto:u.azizov@iqac.asr.gov.uz">u.azizov@iqac.asr.gov.uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fas fa-user-cog"></i> Office Manager:
                                                    <a href="mailto:t.abdusamadov@iqac.asr.gov.uz">t.abdusamadov@iqac.asr.gov.uz</a>
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="contact-stye-one col-lg-7 pl-60 pl-md-15 pl-xs-15">
                                <div class="contact-form-style-one">
                                    <h2 class="heading">Men o`qishni xohlayman</h2>

                                    <?php $form = ActiveForm::begin([
                                        'id' => 'contact-form',
                                        'action' => Url::to(['site/contact']),
                                        'method' => 'post',
                                        'options' => ['class' => 'form'],
                                    ]); ?>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'full_name')->textInput([
                                                    'placeholder' => Yii::t('app', 'To`liq Ism-Familyangiz'),
                                                    'maxlength' => 255,
                                                    'class' => 'form-control'
                                                ])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'tell')->textInput([
                                                    'id' => 'model-tell',
                                                    'placeholder' => '+998911234567', // Placeholder to'liq ko'rinishda bo'ladi
                                                    'maxlength' => 13, // Maksimal uzunlik: +998 bilan birga 13 belgidan oshmaydi
                                                    'class' => 'form-control',
                                                ])->label(false); ?>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'age')->textInput([
                                                    'placeholder' => Yii::t('app', 'Yosh'),
                                                    'maxlength' => 255,
                                                    'class' => 'form-control'
                                                ])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?php
                                                $pages = Pages::find()->andWhere(['parent_id' => null])->limit(1)->all();
                                                $options = [];
                                                foreach ($pages as $page) {
                                                    $options[$page->id] = $page->TitleTranslate;
                                                    $subPages = Page::find()->andWhere(['parent_id' => null, 'pages_id' => $page->id])->all();
                                                    foreach ($subPages as $subPage) {
                                                        $options[$subPage->id] = $subPage->TitleTranslate;
                                                    }
                                                }

                                                echo $form->field($model, 'project')->dropDownList(
                                                    $options,
                                                    [
                                                        'prompt' => Yii::t('app', 'Dastur'),
                                                        'class' => 'form-control',
                                                    ]
                                                )->label(false);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'text')->textarea([
                                                    'rows' => 5,
                                                    'placeholder' => Yii::t('app', 'Sizning xatingiz'),
                                                    'class' => 'form-control'
                                                ])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-paper-plane"></i> <?= Yii::t('app', 'Ma`lumot jo`natish') ?>
                                            </button>
                                        </div>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>