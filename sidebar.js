function sidebarToggler()
{
    if(document.getElementById("sidebar").style.display === "block")
    {
        document.getElementById("sidebar").style.display = "none";
    }
    else
    {
        document.getElementById("sidebar").style.display = "block";
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




