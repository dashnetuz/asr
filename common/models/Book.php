<?php

namespace common\models;

use yii\mongodb\ActiveRecord;

class Book extends ActiveRecord
{
    public static function collectionName()
    {
        return ['iusi-prod', 'books'];
    }

    public function attributes()
    {
        return [
            '_id',
            'title',
            'position',
            'url',
            'science',
            'free',
            'userProgress',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'position', 'url', 'science', 'free'], 'required'],
            [['userProgress'], 'safe'],
        ];
    }
}
