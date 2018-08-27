<?php

/* @var $this yii\web\View */
require_once '../config/param_stomatolog.php';

$this->title = 'Stomatolodzy - Gabinetu Stomatologicznego "Ząbek"';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Lekarze Stomatolodzy</h1>

        <p class="lead">Oferta Gabinetu Stomatologicznego "Ząbek".</p>
 </div>

    <div class="body-content">
        <div class="row">
        <div class="col-md-6"><img  src="http://pp43704.wsbpoz.solidhost.pl/ReGaSto/stom1.jpg" title="Stomatolog <?php echo $stom1;?>" alt="<?php echo $stom1;?>"></div>
        <div class="col-md-6"><img src="http://pp43704.wsbpoz.solidhost.pl/ReGaSto/stom2.jpg" title="Stomatolog <?php echo $stom2;?>" alt="<?php echo $stom2;?>"/></div>
        </div>
        <div class="row">
            <div class="col-md-6"><h4>Lek. Stom. <?php echo $stom1;?></h4></div>
            <div class="col-md-6"><h4>Lek. Stom. <?php echo $stom2;?></h4></div>
        </div>
    </div>
</div>
