<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */
$this->title = 'REZERWACJA';

/*$this->registerJs($DragJS);*/
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Rezerwacja wizyt - Regasto</h1>

        <p class="lead">Wybierz termin, który cię interesuje</p>

    </div>
    <div class="body-content">
<?php

$myUsername = \Yii::$app->user->identity->username;
$ajaxurl = Url::toRoute('kalendarz/ajaxdb');
$windowlocationurl = Url::toRoute('/kalendarz2');


$JSCode = <<<EOF
        
function(start, end) {
   var title =  '$myUsername';
   var ajaxurl = '$ajaxurl';
   var windowlocationurl = '$windowlocationurl';


   var eventData;
   eventData = {title: title, start: start};
   
   var terazdata =  start;
   $('#w0').fullCalendar('renderEvent', eventData, true);
   
   $('#w0').fullCalendar('unselect');
   var ajaxStart = start.toJSON();
   var ajaxTitle = eventData.title;
   $.ajax({
       url: ajaxurl, //index.php?r=kalendarz%2Fajaxdb
       
   type: 'GET',
       data: { ajaxTitle: ajaxTitle, ajaxStart: ajaxStart},
       success: function () {
                    alert('Zarezerwowano termin na: ' + terazdata.format());
                    //window.location.href = windowlocationurl;
                },
        error: function () {
            alert("Błąd - skontaktuj się z nami w celu rejestracji wizyty");
        }
    }); 
}
EOF;
$JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {

    $( function() {
    $( "#dialogform" ).dialog();
  } );

        
    // change the border color just for fun
    $(this).css('border-color', 'red');
}
     
EOF;
    
    ?>

 
        <?= \yii2fullcalendar\yii2fullcalendar::widget([
                'header'        => [
		'left'   => 'today prev,next',
		'center' => 'title',
		'right'  => '',
	],

              'clientOptions' => [
                    'lang' => 'pl',
                    'selectable' => true,
                    'selectHelper' => true,
                    
                    'eventLimit'=> true, // for all non-agenda views
                    'views' => [
                        'week' => [
                            'eventLimit' => 1 // adjust to 6 only for agendaWeek/agendaDay
                        ]
                    ],

                  
                    'droppable' => true,
                    'editable' => false,
                    /*'drop' => new JsExpression($JSDropEvent),*/
                    'select' => new JsExpression($JSCode),
                    'eventClick' => new JsExpression($JSEventClick),
                    'defaultDate' => date('Y-m-d'),
                    'minTime' => '08:00:00',
                    'maxTime' => '21:00:00',
                    'forceEventDuration' => true,
                    'defaultTimedEventDuration' => '00:30:00',
                    'eventOverlap' => false,
                    'defaultView'=> 'agendaWeek',
                    'height' => 'auto',
                    'allDaySlot' => false,
                    'businessHours'=> [
                       'dow'=> [ 1, 2, 3, 4, 5 ], // Monday - Thursday
                       'start'=> '08:00', // a start time (10am in this example)
                       'end'=> '20:00', // an end time (6pm in this example)
                    ],
                    'selectConstraint' => 'businessHours',
                    'selectOverlap' => false,
                  
              ],
            
               'events' => $events,
            ]);
        ?> 
        
        

    </div>
</div>