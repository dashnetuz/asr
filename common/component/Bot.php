<?php

namespace common\components;

use common\models\Setting;
use common\models\Telegram;
use yii\base\Component;

class Bot extends Component
{

    /**.
     * @param $text
     */

    public function sendOrdersBot($text)
    {
        $users = Telegram::find()->where(['status' => 1])->all();
        $bot_token = Setting::findOne(1)->orders_bot_token;

        if (!empty($users)) {
            foreach ($users as $user) {
                $this->bot($bot_token, 'sendMessage', [
                    'chat_id' => $user->user_chat_id,
                    'text' => $text,
                    'parse_mode' => 'markdown',
                ]);
            }
        } else {
            Yii::error("Foydalanuvchilar topilmadi yoki status = 1 emas.");
        }

        return true;
    }



    public function sendAdminBot($text, $chat_id)
    {
        $bot_token = Setting::findOne(1)->admin_bot_token;

        $this->bot($bot_token,'sendMessage', [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'markdown',
        ]);

        return true;

    }

    public function bot($api_key, $method, $datas = [])
    {
        $url = "https://api.telegram.org/bot" . $api_key . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);

        if (curl_error($ch)) {
            Yii::error("Bot xatolik: " . curl_error($ch));
            return false;
        } else {
            return json_decode($res, true); // Javobni qaytarish
        }
    }

}
