<?php
namespace common\models;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginPasswordForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username'], 'required', 'message' => Yii::t("app", "Enter your login!")],
            [['password'], 'required', 'message' => Yii::t("app", "Enter your password!")],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t("app", "Incorrect username or password."));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {if (AuthAssignment::findOne(['user_id' => $this->getUser()->id])->item_name == 'user'){
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 0 : 0);
            }else{
                $this->addError( 'password',Yii::t("app", "Please wait for admin confirmation!"));
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
