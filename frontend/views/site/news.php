<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/** @var $news \common\models\News */

$this->title = $news->getTitleTranslate();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['/site/news']];
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="page-title" style="background-image: url(/iqac/images/background/page-title-bg.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title"><?= Html::encode($this->title) ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="<?= Url::to(['/']) ?>"><?= Yii::t('app', 'Bosh sahifa') ?></a></li>
                <li><?= Yii::t('app', 'Yangiliklar') ?></li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-details pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <img src="/uploads/news/<?= Html::encode($news->filename) ?>" alt="<?= Html::encode($news->getTitleTranslate()) ?>">
                        <div class="blog-details__date">
                            <span class="day"><?= date('d', strtotime($news->created_at)) ?></span>
                            <span class="month"><?= date('M', strtotime($news->created_at)) ?></span>
                        </div>
                    </div>

                    <div class="blog-details__content">
                        <ul class="list-unstyled blog-details__meta">
                            <li><i class="fas fa-user-circle"></i> Admin</li>
                            <!-- Fikrlar soni bo‘lsa shu yerga joylash mumkin -->
                        </ul>

                        <h3 class="blog-details__title"><?= Html::encode($news->getTitleTranslate()) ?></h3>
                        <div class="blog-details__text-2">
                            <?= $news->getDescriptionTranslate() ?>
                        </div>
                    </div>

                    <div class="blog-details__bottom">
                        <?php if (!empty($news->tags)): ?>
                            <p class="blog-details__tags">
                                <span><?= Yii::t('app', 'Teglar') ?>:</span>
                                <?php foreach (explode(',', $news->tags) as $tag): ?>
                                    <a href="#"><?= Html::encode(trim($tag)) ?></a>
                                <?php endforeach; ?>
                            </p>
                        <?php endif; ?>

                        <div class="blog-details__social-list">
                            <a href="#"><i class="fab fa-x-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Optional: Kommentlar va reply form -->
                    <!-- ... -->
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title"><?= Yii::t('app', 'So‘nggi yangiliklar') ?></h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <?php foreach ($latestNews as $item): ?>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="/uploads/news/<?= Html::encode($item->filename) ?>" alt="<?= Html::encode($item->getTitleTranslate()) ?>">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                        <span class="sidebar__post-content-meta">
                            <i class="fas fa-calendar-alt"></i> <?= date('d.m.Y', strtotime($item->created_at)) ?>
                        </span>
                                            <a href="<?= Url::to(['/news/' . $item->getUrlTranslate()]) ?>">
                                                <?= Html::encode($item->getTitleTranslate()) ?>
                                            </a>
                                        </h3>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
