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