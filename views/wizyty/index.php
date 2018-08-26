<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Wizyty zarezerwowane');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wizyty-index">

	<h1><?= Html::encode($this->title) ?></h1>
<?php
if (Yii::$app->user->isGuest) // Dodano warunek ukrywający tabelę dla niezarejestrowanych użytkowników M.Kurant
{
    ?>
    
    <div class="jumbotron">
		<br />
		<p><?= Html::a(Yii::t('app','Zaloguj się aby zarezerwować wizytę'), ['/site/login'], ['class' => 'btn btn-success btn-lg', 'style' => 'padding: 15px;']) ?></p>
	</div>
    
    <?php
} else {
    ?>
        <p>
        <?= Html::a(Yii::t('app', 'Rezerwacja nowego terminu'), ['create'], ['class' => 'btn btn-success'])?>
        </p>


        <?=GridView::widget(['dataProvider' => $dataProvider,
                             'filterModel' => $searchModel,
                             'columns' => ['data',
                                           'godzina',
                                           'id_stomatologa',
                                           ['class' => 'yii\grid\ActionColumn',
                                            'contentOptions' => ['style' => 'width:260px'],
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                return Html::a('<button type="button" class="btn btn-primary btn-xs">Aktualizuj rezerwację</button>', $url, 
                                                       ['data-confirm' => 'UWAGA! 
Po przejsciu w tryb aktualizacji nie będzie możliwe anulowanie zmian. 
Czy na pewno chcesz kontynuować?', 'data-method' =>'POST']
                                                   );
                                                   },
                                                   'delete' => function($url, $model) {
                                                       return Html::a('<button class="btn btn-danger btn-xs">Odwłołaj rezerwację</button>', $url,
                                                           ['data-confirm' => 'Czy na pewno chcesz odwołać tę wizytę?', 'data-method' =>'POST']
                                                           );
                                                   },
                                                   ]
                                           ]
                             ]
            
        ]);
}?>
</div>
