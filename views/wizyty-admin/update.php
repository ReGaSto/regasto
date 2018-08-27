<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WizytyAdmin */

$this->title = 'Update Wizyty Admin: ' . $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Wizyty Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->data, 'url' => ['view', 'data' => $model->data, 'godzina' => $model->godzina]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wizyty-admin-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if (Yii::$app->user->identity->role === 30) {
        ?>
    
        <?=
        $this->render('_form', [
            'model' => $model,
        ]);
    } else {
        echo 'Nie masz uprawnień do przeglądania tej strony.';
    }
    ?>

</div>

