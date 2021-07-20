new Vue({
    el: '#messages',
    data() {
        return {
          messages: [],
          id:this.getId()
        };
      },
      created() { setInterval( () =>
        axios.get("http://localhost/Evoltchat/api/messages")
          .then(response => {
             this.messages = [...response.data];
             var objDiv = document.getElementById("messages");
             objDiv.scrollTop = objDiv.scrollHeight;
          }), 3000),

          setInterval(() => {
              var objDiv = document.getElementById("messages");
             objDiv.scrollTop = objDiv.scrollHeight;
          }, 100);
      },
      methods: {
          getId()
          {
              return localStorage.getItem('id')
          }
      }
    
  })
  new Vue({
    el: '#users',
    data() {
        return {
          users: []
        };
      },
      mounted() { setInterval(() =>
        axios.get("http://localhost/Evoltchat/api/users")
          .then(response => {
             this.users = [...response.data]
          }), 3000)
      }
    
  });

function sidebarToggler()
{
    if(document.getElementById("sidebar").style.display === "block")
    {
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("logoutButton").style.display = "block";
        document.getElementById("comButton").style.display = "block";

    }
    else
    {
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("logoutButton").style.display = "none";
        document.getElementById("comButton").style.display = "none";
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
        window.localStorage.setItem('username', data.username);
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
    
        $("#logoutButton").prop('disabled',true);
        $.post("http://localhost/Evoltchat/api/logout", logout_info).done(function( data ) 
        {
            window.localStorage.setItem('username', null);
            window.location="pocetna.html";
        }).fail(function( error ) {
            alert(error.responseJSON.message);
            $("#logoutButton").prop('disabled',false);
        });
}

function sendMessage()
{
    let message_info=
    {
        "user_id": window.localStorage.getItem('id'),
        "body" : $("#message-text").val()
    };

    $("#sendButton").prop('disabled',true);
    $.post("http://localhost/Evoltchat/api/send", message_info).done(function( data ) 
    {
        document.getElementById("message-text").value=null;
        $("#sendButton").prop('disabled',false);

    }).fail(function( error ) {
        alert(error.responseJSON.message);
        $("#sendButton").prop('disabled',false);
    });
}