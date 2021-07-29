Vue.component('messages-component', {

    props: ['body'],
    template :'<div class="message-container"><p class="mx-3 my-1">{{ body }}</p></div>'
})

new Vue({
    el: '#messages',
    data: function() {
        return {
          messages: [],
          id:this.getId()
        };
      },
      mounted() { setInterval( () =>
        axios.get("http://localhost/Evoltchat/api/user/messages", { headers: { Authorization: localStorage.getItem('token') }
            })
          .then(response => {
             this.messages = [...response.data];
          }), 1000)
      },
      methods: {
          getId()
          {
              return localStorage.getItem('id')
          }
      }
  })



function sendMessage()
{
      let message_info=
      {
          "user_id": window.localStorage.getItem('id'),
          "body" : $("#message-text").val()
      };
  
      $("#sendButton").prop('disabled',true);

      $.ajax({
        method: 'POST',
        headers: { Authorization: window.localStorage.getItem('token')},
        url: "http://localhost/Evoltchat/api/user/send",
        data: message_info
      }).done(function() {
        document.getElementById("message-text").value=null;
      }).fail(function() {
        alert(error.responseJSON.message);
        $("#sendButton").prop('disabled',false);
      });
}

setInterval(() =>
$(document).ready(function(){
    $('#message-text').keyup(function(){
        if($(this).val().trim() != '')
            $("#sendButton").attr('disabled', false);            
        else
            $("#sendButton").attr('disabled',true);
    })
}),1000)