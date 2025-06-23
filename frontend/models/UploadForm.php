<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /** @var UploadedFile */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'pdf,doc,docx,jpg,png,zip', 'skipOnEmpty' => false],
        ];
    }
    public function attributeLabels()
    {
        return [
            'file' => \Yii::t('app', 'Imzolangan fayl'),
        ];
    }
}
