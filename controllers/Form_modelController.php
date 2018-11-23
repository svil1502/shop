<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\Form_model;
use Yii;

class Form_modelController extends Controller
{
    public function actionIndex()
    {
        $form_model = new Form_model();


        return $this->render('category/start',['form_model' => $form_model]);
    }

    public function actionPage()
    {
        $form_model = new Form_model();
        if(\Yii::$app->request->isAjax){
            return 'Запрос принят!';
        }
        if($form_model->load(\Yii::$app->request->post())){
            var_dump($form_model);
        }
        return $this->render('category/start', compact('form_model'));
    }
}
