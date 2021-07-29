function sidebarToggler()
{
    if(document.getElementById("active-users-sidebar").style.display === "block")
    {
      document.getElementById("active-users-sidebar").style.display = "none";
    }
    else
    {
      document.getElementById("notifications-sidebar").style.display = "none";
      document.getElementById("active-users-sidebar").style.display = "block";
    }
}

function notificationSidebarToggler()
{
    if(document.getElementById("notifications-sidebar").style.display === "block")
    {
      document.getElementById("notifications-sidebar").style.display = "none";
    }
    else
    {
      document.getElementById("active-users-sidebar").style.display = "none";
      document.getElementById("notifications-sidebar").style.display = "block";
    }
}

new Vue({
    el: "#users",
    data() {
        return {
          users: []
        };
      },
    mounted() { setInterval(() =>
        axios.get("http://localhost/Evoltchat/api/user/users",  { headers: { Authorization: localStorage.getItem('token') } } )
          .then(response => {
             this.users = [...response.data]
          }), 1000)
      }
})




