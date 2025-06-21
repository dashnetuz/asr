<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $url
 * @property string $url_ru
 * @property string $url_en
 * @property string $meta_title
 * @property string $meta_title_ru
 * @property string $meta_title_en
 * @property string $description
 * @property string $description_ru
 * @property string $description_en
 * @property string $meta_description
 * @property string $meta_description_ru
 * @property string $meta_description_en
 * @property string|null $filename
 * @property string|null $filename_ru
 * @property string|null $filename_en
 * @property int $status
 * @property int $user_id
 * @property int $created_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }
    public $picture;
	public $picture_ru;
	public $picture_en;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en',
                'description', 'description_ru', 'description_en', 'meta_description', 'meta_description_ru', 'status',
                'meta_description_en', 'status', 'user_id', 'created_at'], 'required'],
            [['meta_description', 'meta_description_ru', 'meta_description_en'], 'string'],
            [['description', 'description_ru', 'description_en'], 'string', 'max' => 50000],
            [['status', 'brm', 'eye', 'user_id'], 'integer'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'filename', 'filename_ru', 'filename_en', 'created_at'], 'string', 'max' => 255],
            ['picture', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'skipOnEmpty' => true],
        	['picture_ru', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'skipOnEmpty' => true],
        	['picture_en', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Nomi'),
            'title_ru' => Yii::t('app', 'Nomi Ru'),
            'title_en' => Yii::t('app', 'Nomi En'),
            'url' => Yii::t('app', 'Url'),
            'url_ru' => Yii::t('app', 'Url Ru'),
            'url_en' => Yii::t('app', 'Url En'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_title_ru' => Yii::t('app', 'Meta Title Ru'),
            'meta_title_en' => Yii::t('app', 'Meta Title En'),
            'description' => Yii::t('app', 'Tavsif'),
            'description_ru' => Yii::t('app', 'Описание Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_description_ru' => Yii::t('app', 'Meta Description Ru'),
            'meta_description_en' => Yii::t('app', 'Meta Description En'),
            'filename' => Yii::t('app', 'Filename  png, jpg, jpeg'),
        	'filename_ru' => Yii::t('app', 'Ru Filename  png, jpg, jpeg'),
        	'filename_en' => Yii::t('app', 'En Filename  png, jpg, jpeg'),
            'status' => Yii::t('app', 'Status'),
        	'brm' => Yii::t('app', 'BRM turi'),
        	'eye' => Yii::t('app', 'Eye'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Qo`shilgan sana'),
        ];
    }

    public function getTitleTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->title_en;
        }
    }

    public function getFilenameTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->filename_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->filename;
        }
        if(\Yii::$app->language == 'en'){
            return $this->filename_en;
        }
    }

    public function getTitle1()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->title_en;
        }
    }

    public function getUrl1(){
        if(\Yii::$app->language == 'ru'){
            return $this->url_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->url;
        }
        if(\Yii::$app->language == 'en'){
            return $this->url_en;
        }
    }

    public function getDescriptionTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->description_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->description;
        }
        if(\Yii::$app->language == 'en'){
            return $this->description_en;
        }
    }

    public function getRandom()
    {
        return $this->hasOne(Photos::className(), ['news_id' => 'id'])->orderBy(['rand()' => SORT_DESC]);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['news_id' => 'id'])->orderBy(['status' => SORT_DESC]);
    }

    public function getPhoto()
    {
        return $this->hasOne(Photos::className(), ['news_id' => 'id'])->andWhere(['status' => 1]);
    }

    public function SendTelegram()
    {
        $text = '';
        $text .= "💻 :" . Yii::$app->params['og_site_name']['content'] . "  saytidan"."\n";
        $text .= "🖊 : ".$this->title."\n";
        $text .= "🖊 : ".$this->title_ru."\n";
        $text .= "🖊 : ".$this->title_en."\n";
        $text .= "🖊 : ".$this->url."\n";
        $text .= "🖊 : ".$this->url_ru."\n";
        $text .= "🖊 : ".$this->url_en."\n";
        $text .= "🖊 : ".$this->description."\n"."\n";
        $text .= "🖊 : ".$this->description_ru."\n"."\n";
        $text .= "🖊 : ".$this->description_en."\n"."\n";
        $text .= "🖊 : ".$this->status."\n";
    	$text .= "🖊 : ".$this->brm."\n";
        $text .= "🖊 : ".$this->picture."\n";
        $text .= "🖊 : ".$this->filename."\n";
        $text .= "🖊 : ".$this->created_at."\n";

        if (Yii::$app->bot->sendOrdersBot($text)){
            return true;
        }
    }

    public function getArrayNews()
    {
        $news = News::find()->asArray()->all();
        $typewriter_news = [];
        foreach ($news as $new)
        {
            if (Yii::$app->language == 'uz')
            {
                $typewriter_news[] = $new["title"];
            }
            if (Yii::$app->language == 'ru')
            {
                $typewriter_news[] = $new["title_ru"];
            }
            if (Yii::$app->language == 'en')
            {
                $typewriter_news[] = $new["title_en"];
            }
        }

        return json_encode($typewriter_news);

    }

    public function Eye(){
        $this->eye = 0;
        $this->user_id = Yii::$app->user->identity->id;
        if ($this->save(false)){
            return true;
        }else{
            return false;
        }
    }

    public function getUrlTranslate()
    {
        switch (Yii::$app->language) {
            case 'ru': return $this->url_ru;
            case 'en': return $this->url_en;
            default: return $this->url;
        }
    }

    public function Deletes(){
        $this->status = 0;
    	$this->eye = 0;
        if ($this->save()){
            return true;
        }else{
            return false;
        }
    }
}
