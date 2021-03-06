<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'ReGaSto';
?>
<div class="site-index">

    <div class="jumbotron">
        <img style="width: 40%;" src="http://pp43704.wsbpoz.solidhost.pl/ReGaSto/bitmap.png">
        <h1>Witaj <strong><?php //echo \Yii::$app->user->identity->username; ?></strong>!</h1>

        <p class="lead">Zapraszamy do zapoznania się z ofertą gabinetu stomatologicznego "Ząbek".</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute('wizyty/index'); ?>">Zarezerwuj wizytę</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Usługi Stomatologiczne</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?php echo Url::toRoute('site/oferta'); ?>">Usługi Stomatologiczne &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Lekarze Stomatolodzy</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?php echo Url::toRoute('site/stomatolodzy'); ?>">Nasi Stomatolodzy &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Kilka Słów O Nas</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?php echo Url::toRoute('site/about'); ?>">O Nas &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
