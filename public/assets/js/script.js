$(document).ready(function(){
    
    $('[data-toggle="tooltip"]').tooltip();  
    
    $('.btnClearText').click(function(){
        $('#content').val("");
    });

    $('.btnClearSchedule').click(function(){
        $('#post_date').val("");
        $('#post_time').val("");
    });


  });

