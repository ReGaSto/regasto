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



$JSCode = <<<EOF
function(start, end) {
   var title =  '$myUsername';;

   var eventData;
   eventData = {title: title, start: start};
   
   var terazdata =  start;
   $('#w0').fullCalendar('renderEvent', eventData, true);
   
   $('#w0').fullCalendar('unselect');
   var ajaxStart = start.toJSON();
   var ajaxTitle = eventData.title;
   $.ajax({
       url:"index.php?r=kalendarz%2Fajaxdb",
       type: 'GET',
       data: { ajaxTitle: ajaxTitle, ajaxStart: ajaxStart},
       success: function (json) {
                    alert('Zarezerwowano termin na: ' + terazdata.format());
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
    $( "#dialog" ).dialog();
  } );

        
    // change the border color just for fun
    $(this).css('border-color', 'red');
}
EOF;
    
    ?>

<div style="display: none">

    <div id="dialog" title="Wybierz Stomatologa">
  
  <form>
    <fieldset>
        <label for="name">Stomatolodzy</label><br>
          Marek Barek <input type="radio" name="stomat" value="1"><br>
          Farek Czarek <input type="radio" name="stomat" value="2">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

</div>
        <?= \yii2fullcalendar\yii2fullcalendar::widget([
                'header'        => [
		'left'   => 'today prev,next',
		'center' => 'title',
		'right'  => '',
	],
              'clientOptions' => [
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