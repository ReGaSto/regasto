<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Panel admina Yii2';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Panel admina Yii2</h1>
    <?php
if (Yii::$app->user->identity->role === 30){
    ?>
        <p class="lead">Z sukcesem otworzyłeś tą stronę!</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute('wizyty-admin/index'); ?>">Zacznij zarządzać tabelą rezerwacji wizyt &raquo;</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>
            <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>
                <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>

        </div>
    </div>
           <!-- Kolejny wiersz -->
    </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>
            <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>
                <div class="row">
            <div class="col-lg-4">
                <h2>Tutaj można dodać kolejne przyciski</h2>

                <p>A nawet zrobić krótki opis.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to('@web/php/panel/logpanel.php') ?>">Panel admina PHP &raquo;</a></p>
            </div>

        </div>
    </div>
    </div>
    </div>
    <?php
    }
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}
?>
</div>
