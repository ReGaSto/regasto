<?php

namespace app\controllers;

use Yii;
use app\models\Wizyty;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WizytyController implements the CRUD actions for Wizyty model.
 */
class WizytyController extends Controller
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
     * Lists all Wizyty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Wizyty::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wizyty model.
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pacjenta, $id_stomatologa, $data, $godzina)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pacjenta, $id_stomatologa, $data, $godzina),
        ]);
    }

    /**
     * Creates a new Wizyty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wizyty();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Wizyty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pacjenta, $id_stomatologa, $data, $godzina)
    {
        $model = $this->findModel($id_pacjenta, $id_stomatologa, $data, $godzina);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pacjenta' => $model->id_pacjenta, 'id_stomatologa' => $model->id_stomatologa, 'data' => $model->data, 'godzina' => $model->godzina]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wizyty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pacjenta, $id_stomatologa, $data, $godzina)
    {
        $this->findModel($id_pacjenta, $id_stomatologa, $data, $godzina)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wizyty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return Wizyty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pacjenta, $id_stomatologa, $data, $godzina)
    {
        if (($model = Wizyty::findOne(['id_pacjenta' => $id_pacjenta, 'id_stomatologa' => $id_stomatologa, 'data' => $data, 'godzina' => $godzina])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
