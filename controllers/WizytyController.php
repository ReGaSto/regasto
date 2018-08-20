<?php

namespace app\controllers;

use Yii;
use app\models\Wizyty;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\WizytySearch;
use yii\bootstrap\Modal;

/**
 * WizytyController implements the CRUD actions for Wizyty model.
 */
class WizytyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /* BARTEK ZMIANA - DODAŁEM WYMÓG LOGOWANIA przed korzystaniem */
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
     * Lists all Wizyty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchBooked(Yii::$app->request->get());
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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
    public function actionView($id_stomatologa, $data, $godzina)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_stomatologa, $data, $godzina),
        ]);
    }

    /**
     * Creates a new Wizyty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchVacant(Yii::$app->request->get());
        
        return $this->render('create', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
        
        
       
    }
    
    public function actionBook($id_stomatologa, $data, $godzina)
    {
        $model = $this->findModel($id_stomatologa, $data, $godzina);
        $model->id_pacjenta = (Yii::$app->user->identity->id);//Dodano M.Kurant //tutaj należy wprowadzić zmienną zawierającą id zalogowanego pacjenta
        $model->update();
        
        
        return $this->redirect(['index']);
     
        
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
    public function actionUpdate($id_stomatologa, $data, $godzina)
    {
        //JFi: poniżej wyzerowanie numeru pacjenta w rekordzie - co oznacza, że ten rekord tj. termin, data i staomatolog wracają do puli wolnych terminów.
        //przydałoby się tutaj wstawić jakies wyskakujące okienko informujące, 
        //że aby zmienić rezerwację należy skasować dotychczasową rezerwację i wybrać nową wizytę.
        //i że po skasowaniu nie będzie możliwe przerwania procesu aktualizacji.
        $model = $this->findModel($id_stomatologa, $data, $godzina);
        $model->id_pacjenta = 0;
        $model->update();
        
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchVacant(Yii::$app->request->get());
        
        return $this->render('update', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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
    public function actionDelete($id_stomatologa, $data, $godzina)
    {
       $model = $this->findModel($id_stomatologa, $data, $godzina);
       $model->id_pacjenta = 0;
       $model->update();
        
       
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
    protected function findModel($id_stomatologa, $data, $godzina)
    {
        if (($model = Wizyty::findOne(['id_stomatologa' => $id_stomatologa, 'data' => $data, 'godzina' => $godzina])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
