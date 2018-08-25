<?php

namespace app\controllers;

use Yii;
use app\models\Kalendarz;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl; //M.Kurant
use app\models\AccessRule;  //M.Kurant
use app\models\NewUser;  //M.Kurant
use DateTime;

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
                    'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
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
            $data_wizyty = $eve->data;
            $godzina_wizyty = $eve->godzina;
            /*$event->id = $eve->id;*/
            $event->title = $eve->id_pacjenta;
            $event->start = $data_wizyty." ".$godzina_wizyty;           
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
        $model->data_rezerwacji = $date;

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
        $title_array = explode(": ", $data['ajaxTitle']);
        $data_array = explode(": ", $data['ajaxStart']);
        $title_id_pacjenta = $title_array[0];
        $datetime_z_fullcalendar = $data_array[0];
        
        $datagodzina = new DateTime($datetime_z_fullcalendar);
        $data_format = $datagodzina->format('Y-m-d');
        $godzina_format = $datagodzina->format('H:i:s');
        
        
        $model->id_pacjenta = $title_id_pacjenta;
        $model->data = $datetime_z_fullcalendar;
        $model->godzina = $datetime_z_fullcalendar;
        //$model->id_stomatologa = 'Jan Borowaniec';
        //$model->load($_GET);
        Yii::$app->db->createCommand("UPDATE wizyty SET id_pacjenta = $title_id_pacjenta WHERE data = '$data_format' AND godzina = '$godzina_format';")
        ->execute();
        //$model->save();
        //return $this->redirect(['view', 'id']);
        
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
