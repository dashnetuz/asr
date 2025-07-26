<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use common\models\Contact;
use common\models\Setting;

class TelegramBotController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionOrdersBot()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $input = json_decode(Yii::$app->request->getRawBody(), true);
        $chat_id = $input['message']['chat']['id'] ?? null;
        $text = $input['message']['text'] ?? null;
        $contactData = $input['message']['contact'] ?? null;

        if (!$chat_id) return ['ok' => true];

        $session = Yii::$app->cache;

        // Boshlanish
        if ($text === '/start') {
            $session->set("tg_contact_step_$chat_id", 0);
            $session->set("tg_contact_data_$chat_id", []);
            $session->set("tg_contact_fields_$chat_id", ['full_name', 'tell', 'text']);

            $label = (new Contact())->getAttributeLabel('full_name');
            $this->sendMessage($chat_id, "👋 Salom! Iltimos, $label ni kiriting:");
            return ['ok' => true];
        }

        $fields = $session->get("tg_contact_fields_$chat_id");
        $step = $session->get("tg_contact_step_$chat_id");
        $data = $session->get("tg_contact_data_$chat_id");

        // Telefon raqamni tugma orqali yuborgan bo‘lsa
        if ($contactData && isset($fields[$step]) && $fields[$step] === 'tell') {
            $data['tell'] = $contactData['phone_number'] ?? 'no-phone';
            $session->set("tg_contact_data_$chat_id", $data);
            $step++;
            $session->set("tg_contact_step_$chat_id", $step);

            if (isset($fields[$step])) {
                $nextField = $fields[$step];
                $label = (new Contact())->getAttributeLabel($nextField);
                $this->sendMessage($chat_id, "✏️ $label ni yuboring:", [
                    'remove_keyboard' => true
                ]);
            } else {
                // Barcha ma'lumotlar to‘plandi
                return $this->saveContactAndFinish($chat_id, $data, $session);
            }

            return ['ok' => true];
        }

        // Bosqich mavjud bo‘lsa, davom etamiz
        if (isset($fields[$step])) {
            $field = $fields[$step];

            // Telefon raqami bosqichida tugma chiqaramiz
            if ($field === 'tell') {
                $this->sendMessage($chat_id, "📲 Telefon raqamingizni quyidagi tugma orqali yuboring:", [
                    'keyboard' => [[[
                        'text' => '📱 Telefon raqamni yuborish',
                        'request_contact' => true
                    ]]],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => true
                ]);
                return ['ok' => true];
            }

            // Oddiy text fieldlar
            $data[$field] = $text;
            $session->set("tg_contact_data_$chat_id", $data);
            $step++;
            $session->set("tg_contact_step_$chat_id", $step);

            if (isset($fields[$step])) {
                $nextField = $fields[$step];
                if ($nextField === 'tell') {
                    $this->sendMessage($chat_id, "📲 Telefon raqamingizni quyidagi tugma orqali yuboring:", [
                        'keyboard' => [[[
                            'text' => '📱 Telefon raqamni yuborish',
                            'request_contact' => true
                        ]]],
                        'resize_keyboard' => true,
                        'one_time_keyboard' => true
                    ]);
                } else {
                    $label = (new Contact())->getAttributeLabel($nextField);
                    $this->sendMessage($chat_id, "✏️ $label ni yuboring:");
                }
            } else {
                // Barcha ma'lumotlar to‘plandi
                return $this->saveContactAndFinish($chat_id, $data, $session);
            }
        }

        return ['ok' => true];
    }

    private function saveContactAndFinish($chat_id, $data, $session)
    {
        $contact = new Contact();
        foreach ($data as $key => $value) {
            $contact->$key = $value;
        }

        // Qo‘shimcha maydonlar
        $contact->project = 'telegram';
        $contact->age = '-';
        $contact->created_at = time();
        $contact->status = 1;

        if ($contact->save()) {
            if (method_exists($contact, 'SendTelegram')) {
                $contact->SendTelegram();
            }
            $this->sendMessage($chat_id, "✅ Arizangiz qabul qilindi! Tez orada javob beramiz.");
        } else {
            $this->sendMessage($chat_id, "❌ Xatolik! Ma'lumotni saqlab bo‘lmadi.");
        }

        // Sessionlarni tozalaymiz
        $session->delete("tg_contact_fields_$chat_id");
        $session->delete("tg_contact_step_$chat_id");
        $session->delete("tg_contact_data_$chat_id");

        return ['ok' => true];
    }

    private function sendMessage($chat_id, $text, $replyMarkup = null)
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'markdown'
        ];
        if ($replyMarkup) {
            $data['reply_markup'] = json_encode($replyMarkup);
        }

        Yii::$app->bot->bot(
            Setting::findOne(1)->orders_bot_token,
            'sendMessage',
            $data
        );
    }
}
