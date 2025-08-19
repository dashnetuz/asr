<?php
use common\models\Setting;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use frontend\widget\standart\StandartWidget;
use common\models\Page;
use common\models\Pages;
use common\models\Pagetext;
use common\models\Pagepdf;
use common\models\Pageteam;
use common\models\News;

use yii\widgets\ActiveForm;
use yii\helpers\Html;

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
                                                            <?php
                                                            // maxsus page_id'lar
                                                            $specialPageIds = [20, 21, 22, 23, 24];

                                                            // page_id ga qarab linkni aniqlaymiz
                                                            $href = in_array($pageOne->id, $specialPageIds)
                                                                ? $pdf->url
                                                                : '/uploads/pagepdf/' . $pdf->filename;
                                                            ?>
                                                            <a href="<?= htmlspecialchars($href) ?>"
                                                               class="mt-3 d-flex align-items-center justify-content-between"
                                                               target="_blank"
                                                               style="background-color: #1A4137; color: white; font-size: 18px; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
                                                                <span class="me-2"><?= htmlspecialchars($pdf->TitleTranslate) ?></span>
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ((int)$pageOne->id === 19): ?>
                                    <div class="mt-5">
                                        <div class="row g-4">

                                            <!-- 1 -->
                                            <div class="col-12">
                                                <div class="card border-0 shadow-sm h-100 rounded-3">
                                                    <div class="card-body py-3 px-4">
                                                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">

                                                            <!-- Logo + Nomi -->
                                                            <div class="d-flex align-items-center gap-3 text-center text-md-start w-100">
                                                                <div class="bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-center flex-shrink-0"
                                                                     style="width:80px; height:80px; border-color:#1A4137 !important;">
                                                                    <img src="/uploads/accreditation/inha.png"
                                                                         alt="Universitet logotipi"
                                                                         class="img-fluid"
                                                                         style="max-width:65%; max-height:65%;">
                                                                </div>
                                                                <h5 class="fw-semibold mb-0 flex-grow-1">
                                                                    <?= Yii::t('app','Toshkent shahridagi INHA universiteti') ?>
                                                                </h5>
                                                            </div>

                                                            <!-- Tugma -->
                                                            <div class="text-center text-md-end">
                                                                <a class="btn btn-brand px-4 py-2 fw-semibold"
                                                                   href="https://drive.google.com/file/d/1stlO2dUqpzwdk7k63RyDiTCDkr7GFiFZ/view?usp=drive_link"
                                                                   target="_blank" rel="noopener">
                                                                    <i class="fa-sharp fa-solid fa-file-pdf me-1"></i>
                                                                    <?= Yii::t('app','Sertifikatni ko‘rish') ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 2 -->
                                            <div class="col-12">
                                                <div class="card border-0 shadow-sm h-100 rounded-3">
                                                    <div class="card-body py-3 px-4">
                                                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">

                                                            <!-- Logo + Nomi -->
                                                            <div class="d-flex align-items-center gap-3 text-center text-md-start w-100">
                                                                <div class="bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-center flex-shrink-0"
                                                                     style="width:80px; height:80px; border-color:#1A4137 !important;">
                                                                    <img src="/uploads/accreditation/taqu.png"
                                                                         alt="Universitet logotipi"
                                                                         class="img-fluid"
                                                                         style="max-width:65%; max-height:65%;">
                                                                </div>
                                                                <h5 class="fw-semibold mb-0 flex-grow-1">
                                                                    <?= Yii::t('app','Toshkent arxitektura-qurilish universiteti (TAQU)') ?>
                                                                </h5>
                                                            </div>

                                                            <!-- Tugma -->
                                                            <div class="text-center text-md-end">
                                                                <a class="btn btn-brand px-4 py-2 fw-semibold"
                                                                   href="https://drive.google.com/file/d/1_exIj4d1qOsswWEDVlkwV_wNy6cYwI9h/view?usp=drive_link"
                                                                   target="_blank" rel="noopener">
                                                                    <i class="fa-sharp fa-solid fa-file-pdf me-1"></i>
                                                                    <?= Yii::t('app','Sertifikatni ko‘rish') ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <style>
                                        .btn-brand {
                                            background-color: #1A4137;
                                            border: 1px solid #1A4137;
                                            color: #fff;
                                        }
                                        .btn-brand:hover {
                                            background-color: #16352D;
                                            border-color: #16352D;
                                            color: #fff;
                                        }
                                        .card {
                                            transition: all 0.2s ease-in-out;
                                        }
                                        .card:hover {
                                            transform: translateY(-3px);
                                            box-shadow: 0 0.75rem 1.5rem rgba(26, 65, 55, 0.25);
                                        }
                                    </style>
                                <?php endif; ?>




                                <?php if ($pageOne->id == 11 && $model): ?>
                                    <div class="mt-5 pt-5 border-top">
                                        <div class="card shadow border-0">
                                            <div class="card-body">

                                                <?php if (Yii::$app->session->hasFlash('success')): ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <?= Yii::$app->session->getFlash('success') ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                <?php endif; ?>

                                                <?php $form = ActiveForm::begin([
                                                    'options' => ['enctype' => 'multipart/form-data', 'class' => 'needs-validation'],
                                                ]); ?>

                                                <div class="mb-3">
                                                    <?= $form->field($model, 'file', [
                                                        'template' => '<label class="form-label">{label}</label><div class="custom-file">{input}{error}</div>',
                                                        'labelOptions' => ['class' => 'form-label'],
                                                    ])->fileInput(['class' => 'form-control']) ?>
                                                </div>

                                                <div class="d-grid">
                                                    <?= Html::submitButton('<i class="fa fa-paper-plane me-1"></i> ' . Yii::t('app', 'Yuborish'), [
                                                        'class' => 'btn btn-success btn-lg',
                                                    ]) ?>
                                                </div>

                                                <?php ActiveForm::end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>



                            </div>
                        </div>
                    </div>
                    
        </div>
    </div>
</div>



    