<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property int $in_stock
 * @property int $charity
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $price
 * @property string $pay
 * @property string $created_date
 * @property string $sale
 * @property string $description
 * @property string $description_ru
 * @property string $description_en
 * @property string $filename
 * @property string $text_telegram_bot
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public $asd;
    public $subcat;
    public $tag;
    public $picture;
    public function rules()
    {
        return [
            [['category_id', 'brand_id', 'title', 'title_ru', 'title_en', 'price', 'description', 'created_date', 'description_ru', 'description_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'url', 'url_ru', 'url_en', 'text_telegram_bot', 'pay', 'charity'], 'required'],
            [['category_id', 'brand_id', 'asd', 'status', 'subcat', 'sale', 'created_date', 'price', 'user_id', 'pay', 'in_stock', 'charity'], 'integer'],
            [['description', 'description_ru', 'description_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'text_telegram_bot'], 'string'],
            [['tag'], 'safe'],
            [['title', 'title_ru', 'title_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'url', 'url_ru', 'url_en', 'filename'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['picture', 'file', 'extensions' => ['mp4'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Nomi',
            'title_ru' => 'Названия',
            'title_en' => 'Title',
            'price' => 'Цена',
            'tag' => 'Tags',
            'sale' => "Скидка",
            'pay' => "Деньги за товар",
            'in_stock' => Yii::t("app", "In stock"),
            'status' => "status",
	        'user_id' => "Posted by",
            'subcat' => 'subcat',
            'description' => 'Batafsil',
            'description_ru' => 'Описание',
            'description_en' => 'Description',
            'text_telegram_bot' => 'Текст для Telegram Bot',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

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

    public function Deletes(){
        $this->status = 0;
        if ($this->save()){
            return true;
        }else{
            return false;
        }
    }

    public function getUrl1()
    {
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

    public function getMetaTitleTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->meta_title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->meta_title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->meta_title_en;
        }
        
    }

    public function getMetaDescriptionTranslate()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->meta_description_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->meta_description;
        }
        if(\Yii::$app->language == 'en'){
            return $this->meta_description_en;
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
    
    public function getShortDescription()
    {
        if(\Yii::$app->language == 'uz')
        { 
            $string = $this->description;
        };
        if(\Yii::$app->language == 'en')
        { 
            $string = $this->description_en;
        };
        if(\Yii::$app->language == 'ru')
        { 
            $string = $this->description_ru;
        };
        $string = strip_tags($string);
        $string = substr($string, 0, 2000);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        return $string."… ";
        
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getDelivery()
    {
        return $this->hasOne(CountryDeliveryPrice::className(), ['product_id' => 'id']);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }
    
    public function getAtrpro()
    {
        return $this->hasMany(Atrpro::className(), ['product_id' => 'id']);
    }

    public function getTagsposts()
    {
        return $this->hasMany(TagsPosts::className(), ['post_id' => 'id']);
    }

    public function getCatpros()
    {
        return $this->hasMany(Catpro::className(), ['product_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(TagsPosts::className(), ['post_id' => 'id']);
    }

    public function getStreams()
    {
        return $this->hasMany(Oqim::className(), ['product_id' => 'id']);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['product_id' => 'id'])->orderBy(['status' => SORT_DESC]);
    }

    public function getLatest()
    {
        $model = Product::find()->where(['category_id' => $this->category_id, 'status'  => 1])->limit(4)->orderBy(['id' => SORT_DESC])->all();

        return $model;
    }

    public function getLatestLink($user_id)
    {
        return Product::find()->joinWith('streams')->where(['product.category_id' => $this->category_id, 'product.status'  => 1, 'oqim.user_id' => $user_id])->limit(4)->orderBy(['id' => SORT_DESC])->all();
    }

    public function getNumber()
    {
        if ($this->sale == null){
            return number_format($this->price);
        }else{
            return number_format($this->sale);
        }
    }

    public function getNumber123($order)
    {
        if ($this->sale == null){
            return number_format($this->price*$order->count);
        }else{
            return number_format($this->sale*$order->count);
        }
    }

    public function getPhoto()
    {
        return $this->hasOne(Photos::className(), ['product_id' => 'id'])->andWhere(['status' => 1]);
    }

    public function getRandom()
    {
        return $this->hasOne(Photos::className(), ['product_id' => 'id'])->orderBy(['rand()' => SORT_DESC]);
    }

    public function getArrayProducts()
    {
        $products = Product::find()->asArray()->all();
        $typewriter_products = [];
        foreach ($products as $product)
        {
            if (Yii::$app->language == 'uz')
            {
                $typewriter_products[] = $product["title"];
            }
            if (Yii::$app->language == 'ru')
            {
                $typewriter_products[] = $product["title_ru"];
            }
            if (Yii::$app->language == 'en')
            {
                $typewriter_products[] = $product["title_en"];
            }
        }

        return json_encode($typewriter_products);

    }
}
