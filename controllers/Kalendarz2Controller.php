<?php

namespace app\controllers;

use Yii;
use app\models\Kalendarz2;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;  //M.Kurant
use app\models\AccessRule;   //M.Kurant
use app\models\NewUser;    //M.Kurant

/**
 * Kalendarz2Controller implements the CRUD actions for Kalendarz2 model.
 */
class Kalendarz2Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()  //M.Kurant dodano role
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
                    'access' => [
    'class' => AccessControl::className(),
    // We will override the default rule config with the new AccessRule class
    'ruleConfig' => [
        'class' => AccessRule::className(),
    ],
    'only' => ['create', 'update', 'view'],
    'rules' => [
        [
            'actions' => ['create'],
            'allow' => true,
            // Allow users, moderators and admins to create
            'roles' => [
                NewUser::ROLE_USER,
                NewUser::ROLE_MODERATOR,
                NewUser::ROLE_ADMIN
            ],
        ],
        [
            'actions' => ['update'],
            'allow' => true,
            // Allow moderators and admins to update
            'roles' => [
                NewUser::ROLE_MODERATOR,
                NewUser::ROLE_ADMIN
            ],
        ],
        [
            'actions' => ['view'],
            'allow' => true,
            // Allow admins to delete
            'roles' => [
                NewUser::ROLE_ADMIN
            ],
        ],
    ],            
        ]];
    }

    /**
     * Lists all Kalendarz2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Kalendarz2::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kalendarz2 model.
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
     * Creates a new Kalendarz2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kalendarz2();
                        // przykład ifa dopuszczającego rangi 30-admin,20-lekarz,15-operator i 10-pacjent
        if ($model->load(Yii::$app->request->post()) && $model->save() && ((Yii::$user->identity->role === 30) || (Yii::$user->identity->role === 20) || (Yii::$user->identity->role === 10) || (Yii::$user->identity->role === 15))) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kalendarz2 model.
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
     * Deletes an existing Kalendarz2 model.
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
     * Finds the Kalendarz2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kalendarz2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kalendarz2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
