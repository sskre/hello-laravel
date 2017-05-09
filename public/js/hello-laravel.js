$(document).ready(function(){
    $('button.destroy').on('click', function(){
        $('#dialog').dialog({
            modal: true,
            draggable: false,
            buttons: {
                'OK': function(){
                    $('form#destroy-model').submit();
                },
                'Cancel': function(){
                    $(this).dialog('close');
                },
            },
        });
    });
});
