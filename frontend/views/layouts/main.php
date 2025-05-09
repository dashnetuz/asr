<?php
/** @var $content */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Setting;
use yii\helpers\Url;

$setting = Setting::findOne(1);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= $setting && $setting->favicon ? Html::encode($setting->favicon) : '/template/assets/images/logos/favicon.png' ?>" type="image/png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
