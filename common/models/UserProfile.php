<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $avatar
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_profile';
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['firstname', 'lastname', 'avatar'], 'string', 'max' => 255],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    // Optional: Foydalanuvchining to‘liq ismi getter sifatida
    public function getFullName()
    {
        return trim($this->firstname . ' ' . $this->lastname);
    }
}
