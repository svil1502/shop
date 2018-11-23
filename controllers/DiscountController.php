<?php

namespace app\controllers;

use Yii;
use app\models\Discount;
use app\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * DiscountController implements the CRUD actions for Discount model.
 */
class DiscountController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Discount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $discounts = Discount::find();
        $pages = new Pagination(['totalCount' => $discounts->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $discounts = $discounts->offset($pages->offset)->limit($pages->limit)->all();
        if (empty($discounts))
            throw new \yii\web\HttpException(404, 'Таких скидок нет');
        $dataProvider = new ActiveDataProvider([
            'query' => Discount::find(),

        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider, 'discounts'=>$discounts, 'pages'=>$pages
        ]);
    }

    /**
     * Displays a single Discount model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $discount = Discount::findOne($id);
        if (empty($discount))
            throw new \yii\web\HttpException(404, 'Такой скидки нет');

        return $this->render('view', [
            'model' => $this->findModel($id), 'discount'=>$discount
        ]);


    }

    /**
     * Creates a new Discount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Discount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Discount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Discount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Discount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Discount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Discount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
