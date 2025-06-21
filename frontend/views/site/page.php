<?php
use common\models\Setting;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\widget\standart\StandartWidget;
use common\models\Page;
use common\models\Pages;
use common\models\Pagetext;
use common\models\Pagepdf;
use common\models\Pageteam;
use common\models\News;

$setting = Setting::findOne(1);
$this->title = $pageOne->titleTranslate;

$text = Pagetext::find()->where(['status' => 10])->andWhere(['page_id' => $pageOne->id])->all();

//dd($pageOne);
$file = Page::find()->all();
$this->registerJs(<<<JS
JS
    , 3)


?>
<div class="elementor-widget-container">
    <div class="services-style-three-area default-padding bottom-less bg-gray-secondary bg-cover" style="background-image: url(/unieducation/wp-content/themes/gixus/assets/img/shape/24.png);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">
                            <?= $pageOne->pages->getTitleTranslate()?>
                        </h4>
                        <h2 class="title split-text">
                            <div class="line" style="display: block; text-align: center; position: relative;">
                                <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                                    <?= $pageOne->getTitleTranslate()?>
                                </div> 
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
                        <div class="services-style-three-item wow fadeInRight" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInRight;">
                            <div class="item-title">
<!--                                <img decoding="async" src="--><?php //= $setting->logo ?><!--" style="max-width: 200px; height: auto; width: auto;" alt="Image Not Found">-->
                                
                                    <?php foreach (Pagetext::find()->where(['status' => 10,])->andWhere(['page_id' => $pageOne->id])->all() as $text):?>
                        				<?=$text->DescriptionTranslate?>
                                    <?php endforeach; ?>

                                <!-- Bu yerda Pagepdf fayllarini chiqaramiz -->
                                <?php
                                $pdfFiles = \common\models\Pagepdf::find()
                                    ->where(['status' => 10, 'page_id' => $pageOne->id])
                                    ->orderBy(['id' => SORT_ASC])
                                    ->all();

                                if (!empty($pdfFiles)): ?>
                                    <div class="page-pdf-section mt-5">

                                        <div class="row">
                                            <?php foreach ($pdfFiles as $pdf): ?>
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <div class="card shadow-sm border-0 h-100">
                                                        <div class="card-body d-flex flex-column justify-content-between">
                                                            <a href="/uploads/pagepdf/<?= $pdf->filename ?>"
                                                               class="btn btn-primary mt-3 d-flex align-items-center justify-content-between"
                                                               target="_blank"
                                                               style="font-size: 18px;">
                                                                <span class="me-2"><?= $pdf->TitleTranslate ?></span>
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                    
        </div>
    </div>
</div>



    