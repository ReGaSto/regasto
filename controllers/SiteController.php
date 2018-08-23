<?php

namespace app\controllers;
//namespace app\models;
//Dodano use Yii ... M. Kurant//
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\NewUser;
use app\models\AccessRule;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'kalendarz'],
                'rules' => [
                    [
                        'actions' => ['logout', 'kalendarz'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    
        public function actionAdmin()       //dodano akcję dla strony głównej admina Yii2
    {
        return $this->render('admin');
    }
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionOferta()
    {
        return $this->render('oferta');
    }
    
    public function actionStomatolodzy()
    {
        return $this->render('stomatolodzy');
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    //Dodano formularz rejestracji M.Kurant//
    public function actionRegister()
    {
        $model = new NewUser();
        
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                $model->username = $_POST['NewUser']['username'];
                $model->email = $_POST['NewUser']['email'];
                //Zmiana PASSWORD_ARGON2I - na PASSWORD_DEFAULT B.Bugala - Argon2 - dla większej kompatybilności
                $model->password = password_hash($_POST['NewUser']['password'], PASSWORD_DEFAULT);
                $model->authKey = md5(random_bytes(5));
                $model->accessToken = password_hash(random_bytes(10),  PASSWORD_DEFAULT);
                
                // Tu dodano nadawanie rangi autor (szaraczek) przy rejestracji
        /*$auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        $auth->assign($authorRole, $model->getId());
            $user = $model;  //próba 
            return $user;*/
                
                if($model->save())
                {
                    return $this->redirect(['login']);
                }
            }
        }
        
        return $this->render('register', [
            'model' => $model,
        ]);

    }
    
}
