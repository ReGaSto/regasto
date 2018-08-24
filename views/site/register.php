<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form \ActiveForm */
/* @var $model app\models\NewUser */

$this->title = 'Rejestracja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>Aby się zarejestrować, wypełnij poniższy formularz:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); 
    ?>
    
    	<?= $form->field($model, 'username')->textInput(['autofocus' => true]); //automatycznie aktywne M. Kurant ?> 
    	<?= $form->field($model, 'email')->textInput();	?>
    	<?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'imie')->textInput(); ?>
        <?= $form->field($model, 'nazwisko')->textInput(); ?>
        <?= $form->field($model, 'pesel')->textInput(); ?>
        <?= $form->field($model, 'mieszka')->textArea(); ?>
        <?= $form->field($model, 'tel')->textInput(); ?>
        
        
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
    	<?= Html::submitButton('Zarejestruj się', ['class' => 'btn-lg btn-danger']) ?>
    		</div>
    	</div>

    <?php ActiveForm::end(); ?>

    
</div><!-- site-register -->