<?php

namespace app\controllers;

use Yii;
use app\models\WizytyAdmin;
use app\models\WizytyAdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WizytyAdminController implements the CRUD actions for WizytyAdmin model.
 */
class WizytyAdminController extends Controller
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
     * Lists all WizytyAdmin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WizytyAdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WizytyAdmin model.
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($data, $godzina)
    {
        return $this->render('view', [
            'model' => $this->findModel($data, $godzina),
        ]);
    }

    /**
     * Creates a new WizytyAdmin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WizytyAdmin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'data' => $model->data, 'godzina' => $model->godzina]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WizytyAdmin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($data, $godzina)
    {
        $model = $this->findModel($data, $godzina);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'data' => $model->data, 'godzina' => $model->godzina]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WizytyAdmin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($data, $godzina)
    {
        $this->findModel($data, $godzina)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WizytyAdmin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $data
     * @param string $godzina
     * @return WizytyAdmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($data, $godzina)
    {
        if (($model = WizytyAdmin::findOne(['data' => $data, 'godzina' => $godzina])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
