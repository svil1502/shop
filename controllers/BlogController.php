<?php

namespace app\controllers;

use Yii;
use app\models\Blog;
use app\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $blogs = Blog::find();

        $pages = new Pagination(['totalCount' => $blogs->count(), 'pageSize' => 1, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $blogs = $blogs->offset($pages->offset)->limit($pages->limit)->all();

        if (empty($blogs))
            throw new \yii\web\HttpException(404, 'Такого блога нет');
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,  'blogs'=>$blogs, 'pages'=>$pages
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $blog = Blog::findOne($id);
        if (empty($blog))
            throw new \yii\web\HttpException(404, 'Такого блога нет');
        $comments= Comment::find()->where(['blog_id' => $id])->all();
        $comment=new Comment();
        $comment->blog_id = $id;
        if( $comment->load(Yii::$app->request->post()) ) {

           // $comment->blog_id = $id;
            //$comment->save(false);
            $comment->save();
            $comment=new Comment();
            $comment->blog_id = $id;


        }

//        if(Yii::$app->request->isPjax){
//            debug($comment->errors);
//           // return $this->render('view', compact('comments'));
//        }



        return $this->render('view', compact('blog', 'comments', 'comment'));


    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blog model.
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
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
