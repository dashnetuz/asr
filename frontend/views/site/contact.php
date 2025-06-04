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
                                        <li class="wow fadeInUp" data-wow-delay="0ms">
                                            <div class="icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="tel:+998931639922">+998 93 163 99 22</a></h5>

                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="250ms">
                                            <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="#">Uzbekistan, Tashkent</a></h5>

                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">
                                            <div class="icon">
                                                <i class="fas fa-envelope-open-text"></i>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="mailto:international@unieducation.org">international@unieducation.org</a></h5>

                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">
                                            <div class="icon">
                                                <i class="fas fa-envelope-open-text"></i>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="mailto:info@unieducation.org">info@unieducation.org</a></h5>

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