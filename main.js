function doLogin()
{
    var login_info=
    {
        "username": $("#username").val(),
        "password": $("#login-password").val()
    };

    $("#loginButton").prop('disabled',true);
    $.post("http://localhost/Evoltchat/api/login", login_info).done(function( data ) 
    {
        window.localStorage.setItem('username', data.username);
        window.localStorage.setItem('token', data.jwt);
        window.localStorage.setItem('id', data.id);
        window.location="evoltchat.html";
    }).fail(function( error ) {
        alert(error.responseJSON.message);
        $("#loginButton").prop('disabled',false);
    });
}

function doRegister()
{
    var register_info=
    {
        "password": $("#registration-password").val()
    };
    if($("#registration-password").val() == $("#repeat-password").val())
    {
        $("#registrationButton").prop('disabled',true);
        $.post("http://localhost/Evoltchat/api/register", register_info).done(function( data ) 
        {
            window.localStorage.setItem('username', data.username);
            window.localStorage.setItem('id', data.id);
            window.localStorage.setItem('token', data.jwt);
            window.location="evoltchat.html";
        }).fail(function( error ) {
            alert(error.responseJSON.message);
            $("#registrationButton").prop('disabled',false);
        });
    }
    else
    {
        alert("Passwords must match");
    }
}

function doLogout()
{
        let logout_info=
        {
            "username": window.localStorage.getItem('username')
        };

        $.ajax({
            method: 'POST',
            headers: { Authorization: window.localStorage.getItem('token')},
            url: "http://localhost/Evoltchat/api/user/logout",
            data: logout_info
          }).done(function() {
            window.localStorage.clear();
            window.location="pocetna.html";
          }).fail(function() {
            alert(error.responseJSON.message);
            $("#logoutButton").prop('disabled',false);
          });
}

