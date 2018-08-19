$(function(){
    
    $(document).on('click','.fc-day',function(){
        var date = $(this).attr('data-date');

        
        $.get('index.php?r=wizyty-kalendarz/create',{'date':date},function(data){
                $('#modal').modal('show')
                .find('#modalContent')
                .html(data);
         });
    });
    
    //get click of the create button
    $('#modalButton').click(function (){
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
            
        });
});


       