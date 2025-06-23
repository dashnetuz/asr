<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Fayl yuborish';

?>

<h3>Fayl yuborish formasi</h3>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<?= $form->field($model, 'file')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Yuborish', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
