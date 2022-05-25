$(function ($) {

    $("#callback_form form").unbind('submit');
    $('#callback_form .validateMe').validationEngine({
        //binded: false,
        scroll: false,
        showPrompts: true,
        showArrow: false,
        addSuccessCssClassToField: 'success',
        addFailureCssClassToField: 'error',
        parentFieldClass: '.form_cell',
        //parentFormClass: '.order_block',
        //promptPosition: "centerRight",
        //doNotShowAllErrosOnSubmit: true,
        //focusFirstField          : false,
        autoPositionUpdate: true,
        //prettySelect             : true,
        validationEventTrigger: 'submit',
        //useSuffix                : "_VE_field",
        addPromptClass: 'relative_mode single_msg_mode',
        showOneMessage: false
    });


    // send email on submit form
    $(".send-request, .send-callback").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        if(!form.find('.error').size()) {
            $.ajax({
                url: form.attr('action'),
                dataType: "json",
                type: "POST",
                data: form.serialize()
            }).done(function(data){
                if(data.success) {
                    document.location.replace("thanks.html");
                } else {
                    // error
                }
            });
        }
    });    

});