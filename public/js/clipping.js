$(document).ready(function(){
    $('button.destroy').on('click', function(){
        $('#dialog').dialog({
            modal: true,
            draggable: false,
            buttons: {
                'OK': function(){
                    $('form#destroy-clipping').submit();
                },
                'Cancel': function(){
                    $(this).dialog('close');
                },
            },
        });
    });
});
