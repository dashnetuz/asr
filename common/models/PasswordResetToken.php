<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "password_reset_token".
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property int $expires_at
 */
class PasswordResetToken extends ActiveRecord
{
    public static function tableName()
    {
        return 'password_reset_token';
    }

    public function rules()
    {
        return [
            [['user_id', 'token', 'expires_at'], 'required'],
            [['user_id', 'expires_at'], 'integer'],
            [['token'], 'string', 'max' => 255],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
