<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WizytyAdmin */

$this->title = 'Utwórz rekord wizyty / wolnego terminu / dnia wolnego';

$this->params['breadcrumbs'][] = ['label' => 'Wizyty Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Aby dodać wolny termin wpisz datę, godzinę, imię i nazwisko stomatologa, a Id-pacjenta jako 0<br>
        Aby dodać dzień wolny / urlop wpisz datę, godzinę, imię i nazwisko stomatologa, a Id Pacjenta jako 1<br>
        W celu rezerwacji wizyty dla danego pacjenta należy w rubryce Id Pacjenta podać jego numer użytkownika z tabeli użytkowników (new_user)</p>
        <?php
if (Yii::$app->user->identity->role === 30){
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]); 
}
else
{
    echo 'Nie masz uprawnień do przeglądania tej strony.';
}        
        ?>

</div>
