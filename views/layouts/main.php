<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\filters\AccessControl; //M.Kurant
use app\models\AccessRule;  //M.Kurant
use app\models\NewUser;  //M.Kurant

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    //Dodano rejestrację i zmieniono Nav widget M. Kurant
    //Dodano rejestrację wizyt do Menu B. Bugala
    $navItem = [
    ['label' => 'O nas', 'url' => ['/site/about']],
    ['label' => 'Rezerwacja wizyty', 'url' => ['/wizyty']],
    ['label' => 'Rezerwacja V2', 'url' => ['/kalendarz']],
    ['label' => 'Oferta', 'url' => ['/site/oferta']],
    ['label' => 'Stomatolodzy', 'url' => ['/site/stomatolodzy']],
    ['label' => 'Kontakt', 'url' => ['/site/contact']],
    
    ];
    if(isset(Yii::$app->user->identity->role) && Yii::$app->user->identity->role === 30)
    {
        array_push($navItem, ['label' => 'Admin', 'url' => ['/kalendarz-admin/index']]);   //dodano KalendarzAdmin
    } else {
         
    }
    
    
    if(Yii::$app->user->isGuest)
    {
        array_push($navItem, ['label' => 'Logowanie', 'url' => ['/site/login']], ['label' => 'Rejestracja', 'url' => ['/site/register']]);
    } else {
        array_push($navItem, '<li>'. Html::beginForm(['/site/logout'], 'post'). Html::submitButton('Logout ('. Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']).Html::endForm().'</li>');
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItem
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Gabinet Stomatologiczny "Ząbek" <?= date('Y') ?></p>
        <p><a class="pull-left" style="padding-left: 10px" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel pracownika</a></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
