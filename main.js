new Vue({
    el: '#messages',
    data: 
    {
        items: [
            { message: 'Foo' },
            { message: 'Bar' },
            { message: 'Foo' },
            { message: 'Foo' },
            { message: 'Foo' },
            { message: 'Foo' },
            { message: 'Ti si bila vec zena udatadj'+
                           'gčds  jčglk jsdlčkjglksfdjl'+
                        'ddgf ffffff fflkfff fffa' },
            { message: 'Bar' },
            { message: 'Bar' },
            { message: 'lfkdjfaslkjfdskaljflkjdsaldjdfaslkjfalksjfakddfsfsdfsdfdfsfddddddddsdfsdsddddddddddd' },
            { message: 'Bar' },
            { message: 'Foo' }
        ]
    }
  })

  new Vue({
    el: '#users',
    data: 
    {

        users: [
            { username : 'user001'},
            { username : 'user003'},
            { username : 'user005'},
            {username : 'user009'}
        ]
    }
  })

function sidebarToggler()
{
    if(document.getElementById("sidebar").style.display === "block")
    {
        document.getElementById("sidebar").style.display = "none"
    }
    else
    {
        document.getElementById("sidebar").style.display = "block"
    }
}

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
        window.localStorage.setItem('user', JSON.stringify(data));
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
            window.localStorage.setItem('user', JSON.stringify(data));
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