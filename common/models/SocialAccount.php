<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "social_account".
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $client_id
 * @property string|null $email
 * @property string|null $data
 * @property int $created_at
 */
class SocialAccount extends ActiveRecord
{
    public static function tableName()
    {
        return 'social_account';
    }

    public function rules()
    {
        return [
            [['user_id', 'provider', 'client_id', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['data'], 'string'],
            [['provider', 'client_id', 'email'], 'string', 'max' => 255],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
