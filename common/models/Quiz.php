<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property int $part_id
 * @property string $title
 * @property string|null $description
 * @property int $type
 * @property int $time_limit
 * @property int $pass_percent
 * @property int|null $max_attempt
 * @property string $created_at
 *
 * @property Part $part
 * @property QuizQuestion[] $questions
 * @property QuizAttempt[] $attempts
 */
class Quiz extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%quiz}}';
    }

    public function rules()
    {
        return [
            [['part_id', 'title', 'type'], 'required'],
            [['part_id', 'type', 'time_limit', 'pass_percent', 'max_attempt'], 'integer'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::class, 'targetAttribute' => ['part_id' => 'id']],
        ];
    }

    public function getPart()
    {
        return $this->hasOne(Part::class, ['id' => 'part_id']);
    }

    public function getQuestions()
    {
        return $this->hasMany(QuizQuestion::class, ['quiz_id' => 'id']);
    }

    public function getAttempts()
    {
        return $this->hasMany(QuizAttempt::class, ['quiz_id' => 'id']);
    }
}
