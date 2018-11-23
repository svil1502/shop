<?php
namespace app\controllers;

use yii\web\Controller;

use app\models\Form_model;
use Yii;
class TestController extends Controller
{
    //public $layout = 'basic';
    public function beforeAction($action){
        //debug($action);
        if ($action->id =='index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPage()
    {
        $form_model = new Form_model();
//        $id = Yii::$app->request->get('id');
//        if (\Yii::$app->request->isAjax){
//            debug(Yii::$app->request->get());
//
//            return 'data';
//        }
        if (\Yii::$app->request->isAjax){
            debug($_GET);

            return 'получили get';
        }
        $name = Yii::$app->request->post();
        //debug(Yii::$app->request->get());
        debug($name);
        //$name = Yii::$app->request->get();
        //$name = Yii::$app->request->post('name');
        if($form_model->load(\Yii::$app->request->post())){
            debug($form_model);
        }
        // $dd=Yii::$app->request->post();
        return $this->render('page', compact('form_model'));
    }
}
