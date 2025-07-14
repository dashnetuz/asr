
<?php
/* @var $models common\models\Pages */

use yii\widgets\LinkPager;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use frontend\widget\standart\StandartWidget;
use common\models\Page;
use common\models\Pages;

$this->title = Yii::t('app', 'Contact');

$this->registerJs(<<<JS
$(document).on('input', '#model-tell', function () {
    let value = this.value.replace(/\D/g, '');
    if (!value.startsWith('998')) {
        value = '998' + value;
    }
    this.value = '+' + value.substring(0, 12);
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

                    <div class="container">
                        <div class="row align-center">
                            <div class="contact-stye-one col-lg-5 mb-md-50 mb-xs-40">
                                <div class="contact-style-one-info">
                                    <h4 class="sub-title"><?= Yii::t('app', 'Savollaringiz bormi?') ?></h4>
                                    <h2><?= Yii::t('app', 'Biz bilan aloqa') ?></h2>
                                    <ul>
                                        <li class="wow fadeInUp" data-wow-delay="0ms">
                                            <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                            <div class="content">
                                                <h5 class="title"><a href="tel:+998712002024">+998-71-200-2024</a></h5>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="100ms">
                                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                            <div class="content">
                                                <h5 class="title">
                                                    <a href="https://www.google.com/maps/place/Davlat+Boshqaruv+Akademiyasi/@41.3106434,69.2548674,17z" target="_blank">
                                                        <?= Yii::t('app', "O'zbekiston shoh ko'chasi 45, Toshkent") ?>
                                                    </a>
                                                </h5>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="200ms">
                                            <div class="icon"><i class="fas fa-envelope"></i></div>
                                            <div class="content">
                                                <h5 class="title"><a href="mailto:admin@iqac.asr.gov.uz">admin@iqac.asr.gov.uz</a></h5>
                                                <h5 class="title"><a href="mailto:info@iqac.asr.gov.uz">info@iqac.asr.gov.uz</a></h5>
                                            </div>
                                        </li>
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
                                        <li class="wow fadeInUp" data-wow-delay="400ms">
                                            <div class="content">
                                                <h5 class="title">
                                                    <i class="fas fa-user-tie"></i> <?= Yii::t('app', 'Director') ?>:
                                                    <a href="mailto:k.khomidov@iqac.asr.gov.uz">k.khomidov@iqac.asr.gov.uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fas fa-user-graduate"></i> <?= Yii::t('app', 'Academic Director') ?>:
                                                    <a href="mailto:u.azizov@iqac.asr.gov.uz">u.azizov@iqac.asr.gov.uz</a>
                                                </h5>
                                                <h5 class="title">
                                                    <i class="fas fa-user-cog"></i> <?= Yii::t('app', 'Office Manager') ?>:
                                                    <a href="mailto:t.abdusamadov@iqac.asr.gov.uz">t.abdusamadov@iqac.asr.gov.uz</a>
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="contact-stye-one col-lg-7 pl-60 pl-md-15 pl-xs-15">
                                <div class="contact-form-style-one">
                                    <h2 class="heading"><?= Yii::t('app', 'Men o`qishni xohlayman') ?></h2>

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
                                                    'placeholder' => '+998911234567',
                                                    'maxlength' => 13,
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
                                                $options = [
                                                    'business' => Yii::t('app', 'Biznes boshqaruv (Business Management)'),
                                                    'it' => Yii::t('app', 'IT (Information Technologies)'),
                                                    'architecture' => Yii::t('app', 'Arxitektura (Architecture)'),
                                                    'tourism' => Yii::t('app', 'Turizm va mehmonxona boshqaruvi (Tourism and Hospitality Management)'),
                                                    'mba' => Yii::t('app', 'MBA (Master’s in Business Administration)'),
                                                ];
                                                echo $form->field($model, 'project')->dropDownList(
                                                    $options,
                                                    [
                                                        'prompt' => Yii::t('app', 'O‘qishni istagan yo‘nalishingizni tanlang '),
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
