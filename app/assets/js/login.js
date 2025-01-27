$(document).ready(function() {
    $("#login-form").validate({
        rules:
            {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            },
        messages:
            {
                email:{
                    required: 'Bitte geben Sie Ihre Email adresse ein um ein neues Passwort zu vergeben. Sie werden eine Email erhalten.'
                },
                password:{
                    required: 'Passwort vergessen'
                }
            },
        submitHandler: submitForm
    });

    function submitForm() {
        var data = $("#login-form").serialize();
        $.ajax({
            type : 'POST',
            url  : 'admin-login',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i> &nbsp; Loading...');
            },
            success :  function(response)
            {
                if(response=="ok"){
                    $("#btn-login").html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i> &nbsp; Login...');
                    setTimeout(' window.location.href = "index"; ',2000);
                }
                else{
                    $("#error").fadeIn(500, function(){
                        $("#error").html('<div class="alert alert-danger"> <span class="fa fa-info"></span> &nbsp; <b>'+response+'</b></div>');
                        $("#btn-login").html('<span class="fa fa-lock"></span> &nbsp; Repeat');
                    });
                }
            }
        });
        return false;
    }
});