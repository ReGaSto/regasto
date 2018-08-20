<?php

namespace app\controllers;

use Yii;
use app\models\Kalendarz;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KalendarzController implements the CRUD actions for Kalendarz model.
 */
class KalendarzController extends Controller
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
     * Lists all Kalendarz models.
     * @return mixed
     */
    public function actionIndex()
    {
        $events = Kalendarz::find()->all();
        
        $tasks = [];
        foreach ($events as $eve)
        {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $eve->title;
            $event->start = $eve->created_date;
            $event->className = 'regasto-cal';
            $event->allDay = false;
            $tasks[] = $event;
        }

        return $this->render('index', [
            'events' => $tasks,
        ]);
    }

    /**
     * Displays a single Kalendarz model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kalendarz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new Kalendarz();
        $model->created_date = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
             return $this->renderAjax('create', [
            'model' => $model,     
        ]);
       }
    }
    
    public function actionAjaxdb()
{
    $model= new Kalendarz; 
    if (Yii::$app->request->isAjax) {
        $data = Yii::$app->request->get();
        $my_array = explode(":", $data['ajaxTitle']);
        $my_array2 = explode(":", $data['ajaxStart']);        
        $model->title=$my_array[0];
        $model->created_date=$my_array2[0];
        $model->load($_GET);
        $model->save();
    }
}

    /**
     * Updates an existing Kalendarz model.
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
     * Deletes an existing Kalendarz model.
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
     * Finds the Kalendarz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kalendarz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kalendarz::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
