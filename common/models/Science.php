<?php

namespace common\models;

use Yii;

class Science extends \yii\mongodb\ActiveRecord
{
    public static function collectionName()
    {
        return ['iusi-prod', 'sciences'];
    }

    public function attributes()
    {
        return [
            '_id',
            'title',
            'position',
            'direction',
            'books',
            'createdAt',
            'updatedAt',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'position', 'direction', 'books'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
        ];
    }
}
