$("#form_reg").submit(function () {
    var
            emailData = $("#inputEmail").val(),
            data = {email: emailData};

    $.post("action/registration.php", data)
            .done(function (result) {
                var res = JSON.parse(result);
        
                if(res.error){
                    $('#save_error').html(res.error);                    
                }
                
                if(res.success){                    
                    $('#form_reg').html('');                    
                    $('#save_success').html(res.success);                    
                }
            });


    return false;
});



