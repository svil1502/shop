<?php

namespace app\models;

use Yii;
use yii\base\Model;
use himiklab\sitemap\behaviors\SitemapBehavior;
/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function behaviors()
    {
        return [
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['url', 'lastmod']);
                    $model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to($model->url, true),
                        'lastmod' => strtotime($model->lastmod),
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Электронный адрес',
            'subject' => 'Тема сообщения',
            'body'  => 'Текст сообщения',
            'verifyCode' => 'Проверочный код',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                //->setFrom([$this->email => $this->name])
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setReplyTo($this->email)
                ->setSubject($this->subject)
               // ->setTextBody($this->body)
                   ->setHtmlBody('
                    <p>ФИО Заказчика: '.$this->name.'</p>
                    <p>E-mail: '.$this->email.' </p>
                    <p>Предмет: '.$this->subject.' </p>
                    <p>Сообщение: '.$this->body.' </p>
                        <hr/> 
                              ')
                ->send();

            return true;
        }
        return false;
    }
}
