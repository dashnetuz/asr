<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use common\models\Contact;

class TelegramBotController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionOrdersBot()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $input = json_decode(Yii::$app->request->getRawBody(), true);
        $chat_id = $input['message']['chat']['id'] ?? null;
        $text = $input['message']['text'] ?? null;

        if (!$chat_id || !$text) return ['ok' => true];

        $session = Yii::$app->cache;

        // Boshlanish: /start
        if ($text === '/start') {
            $session->set("tg_contact_step_$chat_id", 0);
            $session->set("tg_contact_data_$chat_id", []);
            $session->set("tg_contact_fields_$chat_id", $this->getRequiredFields());

            $firstField = $this->getRequiredFields()[0];
            $label = (new Contact())->getAttributeLabel($firstField);
            Yii::$app->bot->bot(
                Setting::findOne(1)->orders_bot_token,
                'sendMessage',
                [
                    'chat_id' => $chat_id,
                    'text' => "👋 Salom! Iltimos, $label ni kiriting:",
                    'parse_mode' => 'markdown'
                ]
            );
            return ['ok' => true];
        }

        // Step davom ettirish
        $fields = $session->get("tg_contact_fields_$chat_id");
        $step = $session->get("tg_contact_step_$chat_id");
        $data = $session->get("tg_contact_data_$chat_id");

        if (isset($fields[$step])) {
            $field = $fields[$step];
            $data[$field] = $text;
            $session->set("tg_contact_data_$chat_id", $data);
            $step++;
            $session->set("tg_contact_step_$chat_id", $step);

            if (isset($fields[$step])) {
                $nextField = $fields[$step];
                $label = (new Contact())->getAttributeLabel($nextField);
                Yii::$app->bot->bot(
                    Setting::findOne(1)->orders_bot_token,
                    'sendMessage',
                    [
                        'chat_id' => $chat_id,
                        'text' => "✏️ $label ni yuboring:",
                        'parse_mode' => 'markdown'
                    ]
                );
            } else {
                // barchasi tayyor, Contact modelga saqlash
                $contact = new Contact();
                foreach ($data as $k => $v) {
                    $contact->$k = $v;
                }
                $contact->created_at = time();
                $contact->status = 1;

                if ($contact->save()) {
                    $contact->SendTelegram(); // bu adminlarga yuboradi

                    // foydalanuvchining o‘ziga javob
                    Yii::$app->bot->bot(
                        Setting::findOne(1)->orders_bot_token,
                        'sendMessage',
                        [
                            'chat_id' => $chat_id,
                            'text' => "✅ Arizangiz qabul qilindi! Tez orada javob beramiz.",
                            'parse_mode' => 'markdown'
                        ]
                    );
                } else {
                    Yii::$app->bot->bot(
                        Setting::findOne(1)->orders_bot_token,
                        'sendMessage',
                        [
                            'chat_id' => $chat_id,
                            'text' => "❌ Xatolik! Ma'lumotni saqlab bo‘lmadi.",
                            'parse_mode' => 'markdown'
                        ]
                    );
                }

                // sessionni tozalash
                $session->delete("tg_contact_fields_$chat_id");
                $session->delete("tg_contact_step_$chat_id");
                $session->delete("tg_contact_data_$chat_id");
            }
        }

        return ['ok' => true];
    }

    private function getRequiredFields()
    {
        $model = new Contact();
        $fields = [];

        foreach ($model->rules() as $rule) {
            if (in_array('required', $rule)) {
                if (is_array($rule[0])) {
                    $fields = array_merge($fields, $rule[0]);
                } else {
                    $fields[] = $rule[0];
                }
            }
        }

        return $fields;
    }
}
