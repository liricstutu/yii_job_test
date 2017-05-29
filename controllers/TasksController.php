<?php

namespace app\controllers;

use Yii;
use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     *
     * @return mixed
     */
    public function actionIndex($id = null)
    {
        $dataProvider = new ActiveDataProvider(
            [
                'query' => Tasks::find(),
            ]
        );
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Tasks();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Tasks();
        }

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'model'        => $model,
            ]
        );
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        return $this->redirect(['index', 'id' => $id]);
    }


    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(
                'The requested page does not exist.'
            );
        }
    }
}
