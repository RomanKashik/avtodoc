$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: maroder.langs.delete,
                click: function() {
                    window.location = maroder.base_url + '?page=user&action=delete&id=' + maroder.user.id  + '&secret=' + maroder.user.secret;
                }
            },
            {
                text: maroder.langs.cancel,
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});