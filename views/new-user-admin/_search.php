<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewUserAdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-user-admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'authKey') ?>

    <?php // echo $form->field($model, 'accessToken') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'mieszka') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'imie') ?>

    <?php // echo $form->field($model, 'nazwisko') ?>

    <?php // echo $form->field($model, 'notatka') ?>

    <?php // echo $form->field($model, 'pesel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
