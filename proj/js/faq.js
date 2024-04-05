$(function() {
    $('ul .qea .answer').hide();
    
    $('ul .qea .question').on('click', function() {
    $(this).next('.qea .answer').slideToggle(250);
    });
    });