<?php
namespace app\controllers;

use Yii;
use app\models\Wizyty;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\WizytySearch;

/**
 * WizytyController implements the CRUD actions for Wizyty model.
 */
class WizytyController extends Controller
{

    /**
     *
     * {@inheritdoc}
     */
    /* BARTEK ZMIANA - DODAŁEM WYMÓG LOGOWANIA przed korzystaniem */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'POST'
                    ]
                ]
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => [
                    'index',
                    'create',
                    'update',
                    'view'
                ],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => [
                            '@'
                        ]
                    ]
                    // everything else is denied
                ]
            ]
        ];
    }

    /**
     * Lists all booked Wizyty models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchBooked(Yii::$app->request->get());
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Wizyty model.
     *
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($data, $godzina)
    {
        return $this->render('view', [
            'model' => $this->findModel($data, $godzina)
        ]);
    }

    /**
     * Lists all vacant Wizyty models.
     * 
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchVacant(Yii::$app->request->get());
        
        return $this->render('create', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }
    
    /**
     * Books the selected date by assigning the patient number to id_pacjenta
     * @param integer $id_pacjenta
     * @param string $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return \yii\web\Response
     */
    public function actionBook($data, $godzina)
    {
        $model = $this->findModel($data, $godzina);
        $model->id_pacjenta = (Yii::$app->user->identity->id); // Dodano M.Kurant //tutaj należy wprowadzić zmienną zawierającą id zalogowanego pacjenta
        $model->update();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Allows to change visit date by zeroing the id_patient
     * and redirecting to the update view with date selecting form.
     * 
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($data, $godzina)
    {
        // Kasowanie zmienianej wizyty poprzez wyzerowanie id_pacjenta w bazie danych
        $model = $this->findModel($data, $godzina);
        $model->id_pacjenta = 0;
        $model->update();
        
        $searchModel = new WizytySearch();
        $dataProvider = $searchModel->searchVacant(Yii::$app->request->post());
        
        return $this->render('update', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Deletes an existing Wizyty model by zeroing the id_pacjenta
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id_pacjenta
     * @param string $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($data, $godzina)
    {
        $model = $this->findModel($data, $godzina);
        $model->id_pacjenta = 0;
        $model->update();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Wizyty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id_pacjenta
     * @param integer $id_stomatologa
     * @param string $data
     * @param string $godzina
     * @return Wizyty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($data, $godzina)
    {
        if (($model = Wizyty::findOne([
            'data' => $data,
            'godzina' => $godzina
        ])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'Ta strona nie istnieje.'));
    }

    public function actionWolneTerminy()
    {
        /*
         *
         * Kontroler wylicza daty z godzinami co 30 minut = 1800 sekund
         * usuwa z tablicy gdzoin
         *
         */
        // DEKLARACJA Zmiennych
        $tablica_dat = array();
        
        // SETUP
        $odstep_czasowy = 1800; // W sekundach
        $godziny_wylaczone = array(
            '21',
            '22',
            '23',
            '00',
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07'
        );
        $dni_tygodnia_wylaczone = array(
            '0',
            '6'
        ); // 0 - niedziela, 6 - sobota
        $data_poczatkowa = "2018-08-22 07:00"; // tutaj można ustawić zmienną (z datepickera)
        $data_koncowa = "2018-08-31 11:30"; // tutaj można ustawić zmienną (z datepickera)
        $czas_poczatkowy = strtotime($data_poczatkowa);
        $czas_koncowy = strtotime($data_koncowa);

//LOGIKA
    for ($i = 0, $t = $czas_poczatkowy; $t < $czas_koncowy; $t += $odstep_czasowy, $i++) {

        if (!in_array(date('w', $t), $dni_tygodnia_wylaczone) && !in_array(date('H', $t), $godziny_wylaczone)) {
            $tablica_dat[$i] = date('Y-m-d H:i:s', $t);
        }
    }
    return $tablica_dat;
 }
}
