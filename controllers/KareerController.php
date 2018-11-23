<?php

namespace app\controllers;

use app\models\Kareer_employee;
use Yii;
use app\models\Kareer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KareerController implements the CRUD actions for Kareer model.
 */
class KareerController extends Controller
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
     * Lists all Kareer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $kareers=Kareer::find()->all();
        if (empty($kareers))
            throw new \yii\web\HttpException(404, 'Таких вакансий нет');
        $dataProvider = new ActiveDataProvider([
            'query' => Kareer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'kareers' => $kareers,
        ]);
    }

    /**
     * Displays a single Kareer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $kareer = Kareer::findOne($id);
        if (empty($kareer))
            throw new \yii\web\HttpException(404, 'Такой вакансии нет');
        $kareer_employee=new Kareer_employee();
        $kareer_employee->kareer_id = $id;

        if( $kareer_employee->load(Yii::$app->request->post())&& $kareer_employee->save()) {

            Yii::$app->session->setFlash('success', "Заявка на имя {$kareer_employee->name} о вакансии {$kareer->vacaition} отправлена");

            return $this->redirect(['kareer/view', 'id' => $kareer_employee->kareer_id]);
        }


        return $this->render('view', [
            'model' => $this->findModel($id),
            'kareer_employee' => $kareer_employee,
            'kareer' => $kareer,

        ]);
    }

    /**
     * Creates a new Kareer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kareer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kareer model.
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
     * Deletes an existing Kareer model.
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
     * Finds the Kareer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kareer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kareer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
