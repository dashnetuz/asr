<?php

namespace frontend\controllers;

use common\models\Chair;
use common\models\Faculty;
use common\models\Major;
use common\models\News;
use common\models\Page;
use common\models\Pages;
use common\models\Contact;
use common\models\Setting;
use common\models\Visit;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $setting = Setting::findOne(1);

        $seo = Pages::findOne(1);
        $page = Page::findOne(1);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $seo->getMetaTitleTranslate(),
        ]);

        Yii::$app->params['og_title']['content'] = $seo->getMetaTitleTranslate();
        Yii::$app->params['og_description']['content'] = $seo->getMetaDescriptionTranslate();
        Yii::$app->params['og_image']['content'] = Yii::$app->request->hostInfo . '/backend/web/uploads/'.$setting->open_graph_photo;

        $faculty_count = Faculty::find()->count('id');
        $chair_count = Chair::find()->count('id');
        $major_count = Major::find()->count('id');

        $check = Visit::findOne(['ip' => '']);
        if ($check === null){
            $click = new Visit();
            $click->ip = Yii::$app->request->userIP;
            $click->date = time();
            $click->url = '/site/index';
            $click->save(false);
        }else{
            $check->date = time();
            $check->save(false);
        }

        return $this->render('index',[
            'faculty_count' => $faculty_count,
            'chair_count' => $chair_count,
            'major_count' => $major_count,
            'page' => $page,
            'seo' => $seo,
            'setting' => $setting,

        ]);
    }

    public function actionPage($url)
    {
        $check = Visit::findOne(['ip' => '']);
        if ($check === null){
            $click = new Visit();
            $click->ip = Yii::$app->request->userIP;
            $click->date = time();
            $click->url = $url;
            $click->save(false);
        }else{
            $check->date = time();
            $check->save(false);
        }

        $pageOne = Page::find()->where(['url' => $url])->orWhere(['url_ru' => $url])->orWhere(['url_en' => $url])->one();

        if($pageOne == null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $pageOne->titleTranslate,
        ]);

        Yii::$app->params['og_title']['content'] = $pageOne->titleTranslate;
        Yii::$app->params['og_description']['content'] = $pageOne->titleTranslate;
        Yii::$app->params['og_language_uz']['content'] = '/uz/'.$pageOne->url;
        Yii::$app->params['og_language_ru']['content'] = '/ru/'.$pageOne->url_ru;
        Yii::$app->params['og_language_en']['content'] = '/en/'.$pageOne->url_en;
        Yii::$app->params['og_url']['content'] = Yii::$app->request->hostInfo.'/'.$pageOne->id;
        Yii::$app->params['og_type']['content'] = 'page';
        Yii::$app->params['og_image']['content'] = Yii::$app->request->hostInfo.'/backend/web/uploads/page/icon/'.$pageOne->filename;


        $query = Page::find()->where(['pages_id' => $pageOne->id, 'status' => 10])->orderBy(['id' => SORT_DESC]);

        if ($pageOne->id == 1000){
            return $this->render('majors',[
                'counts' => $query->count(),
                'pageOne' => $pageOne,
            ]);
        }
        elseif ($pageOne->id == 1001){
            return $this->render('majors',[
                'counts' => $query->count(),
                'pageOne' => $pageOne,
            ]);
        }
        else{
            return $this->render('page',[
                'counts' => $query->count(),
                'pageOne' => $pageOne,
            ]);
        }



    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        date_default_timezone_set("Asia/Tashkent");

        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->SendTelegram()) {

            $model->tell = strtr($model->tell, [
                '+998' => '',
                '-' => '',
                '(' => '',
                ')' => '',
                ' ' => ''
            ]);

            $model->status = 1;
            $model->created_at = time();

            if ($model->save(false)) {
                \Yii::$app->getSession()->setFlash('success', "Muvaffaqqiyatli jo'natildi. Arizangiz tez orada ko'rib chiqiladi!");
                return $this->redirect(['contact']);
            }
        }

        Yii::$app->params['og_title']['content'] = Yii::t("app", "Ariza topshirish");
        Yii::$app->params['og_description']['content'] = Yii::t("app", "Ariza topshirish");
        Yii::$app->params['og_language_uz']['content'] = '/uz/site/contact';
        Yii::$app->params['og_language_ru']['content'] = '/ru/site/contact';
        Yii::$app->params['og_language_en']['content'] = '/en/site/contact';
        Yii::$app->params['og_url']['content'] = Yii::$app->request->hostInfo . '/site/contact';
        Yii::$app->params['og_type']['content'] = Yii::t("app", "Ariza topshirish");

        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    public function actionNews($url)
    {
        $lang = Yii::$app->language;

        $query = \common\models\News::find()->where(['status' => 1]);

        if ($lang === 'ru') {
            $query->andWhere(['url_ru' => $url]);
        } elseif ($lang === 'en') {
            $query->andWhere(['url_en' => $url]);
        } else {
            $query->andWhere(['url' => $url]);
        }

        $news = $query->one();
        if (!$news) {
            throw new NotFoundHttpException("Yangilik topilmadi");
        }

        // So'nggi yangiliklar
        $latestNews = \common\models\News::find()
            ->where(['status' => 1])
            ->andWhere(['not', ['id' => $news->id]])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(10)
            ->all();

        return $this->render('news', [
            'news' => $news,
            'latestNews' => $latestNews,
        ]);
    }

    public function actionTestMail()
    {
        Yii::$app->mailer->compose()
            ->setFrom('davlatbek.abduvoxidov97@gmail.com')
            ->setTo('dashnetuz@gmail.com')
            ->setSubject('Sinov xabari')
            ->setTextBody('Bu test email xabari.')
            ->send();

        return 'Email yuborildi!';
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
