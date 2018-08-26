<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\web\JqueryAsset;
require_once '../config/param_stomatolog.php';

$this->title = 'REZERWACJA';
$this->params['breadcrumbs'][] = $this->title;

/*$this->registerJs($DragJS);*/
?>
<div class="site-index">

    <div class="jumbotron">
        
        <h1>Regasto - szybka rezerwacja</h1>

        <p class="lead">Wybierz termin, który cię interesuje</p>
        <p>poniedziałek, środa, piątek - przyjmuje dr. <?php echo $stom1 ?><br>wtorek, czwartek -  przyjmuje dr. <?php echo $stom2 ?></p>

    </div>
    <div class="body-content">
<?php
if(Yii::$app->user->isGuest === false){     //M.Kurant dodano warunek bo bez tego wywalało error gdy nie było się zalogowanym (problem z $myusername)
$myUsername = \Yii::$app->user->identity->id;

// Deklaracja adresów na potrzeby kalendarza rezerwacji
$ajaxurl = Url::toRoute('kalendarz/ajaxdb');
$windowlocationurl = Url::toRoute('/wizyty');
// Wyliczanie daty i dnia tygodnia (integer 0-6) na potrzeby kalendarza
$dzisiaj = date('Y-m-d', time());
$dzisiajArray = explode('-',$dzisiaj);
$dzisiajJulian = gregoriantojd($dzisiajArray[1], $dzisiajArray[2], $dzisiajArray[0]);
// gregoriantojd($month, $day, $year)
$dzien_tygodnia = jddayofweek($dzisiajJulian,0);

$JSTodayDate = <<<EOF

        
        
EOF;

$JSCode = <<<EOF

            
function(start, end) {
   var title =  '$myUsername';
   var ajaxurl = '$ajaxurl';
   var windowlocationurl = '$windowlocationurl';
   var eventData;
    
   if(start.isBefore(moment())) {
   $('#w0').fullCalendar('unselect');
   alert('Błędna data, zarezerwuj termin przyszły:');     
   return false;
   }
   else {
        
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
        
    complete: function(xhr,status){
    alert('Zarezerwowano termin na: ' + terazdata.format()); 
    window.location.href = windowlocationurl;
        
    },
        

       success: function () {
                   
        
                    //window.location.href = windowlocationurl;
        
                },
        error: function () {
            alert("Coś poszło nie tak - spróbuj zarezerwować ponownie");
        }
    });} 
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
                    'defaultDate' => $dzisiaj, //date('Y-m-d'),
                    'firstDay' => $dzien_tygodnia,
                    'minTime' => '08:00:00',
                    'maxTime' => '21:00:00',
                    'forceEventDuration' => true,
                    'defaultTimedEventDuration' => '00:30:00',
                    'eventOverlap' => false,
                    'defaultView'=> 'agendaWeek',
                    'height' => 'auto',
                    'allDaySlot' => false,
                    'businessHours'=> [
                       'dow'=> [ 1, 2, 3, 4, 5 ], // Monday - Friday
                       'start'=> '08:00', // a start time (10am in this example)
                       'end'=> '22:00', // an end time (6pm in this example)
                    ],
                    'selectConstraint' => 'businessHours',
                    'selectOverlap' => false,
                  
              ],
            
               'events' => $events,
            ]);
}    
        ?> 
        
        

    </div>
</div>