//Код пизда простой и одновременно туопй не поймете будете дэбилами


//Открыт или закрыт чат @closetab()
var flagchat=true;

///

//  отправить сообщение, передаю айди юзера, дада да айди  а не токен и че ебать ты мне сделаешь мой чат, че хочу то и делаю
function send(id)
{
    var message=$('#message').val();
    //alert(id);
    if(message!=='')
    {
        $('#message').css('border','1px solid #e8e8e8');
        $.ajax({
            type:'POST',
            url:'http://chat/wp-content/plugins/adminchat/php/send.php',
            data:{"message":message,"id":id},
            success:function (result)
            {
                $('#message').val('');
            }

        });
    }
    else
    {
        $('#message').css('border','1px solid red');
    }

}

//Вывод чата для отдельного пользователя, передаю айди юзера, дада да айди  а не токен и че ебать ты мне сделаешь мой чат, че хочу то и делаю
function vivod(id)
{
    $.ajax
    ({
        type:'POST',
        url:'http://chat/wp-content/plugins/adminchat/php/vivod.php',
        data:{"id":id},
        success:function (result)
        {
           var mas=JSON.parse(result);
           if(mas!='')
           {
               var html='';
               mas.forEach(function (item,i,mas)
               {
                   if(item['id_admin']==1)
                   {
                       html+='<div class="messageadmin">' +
                           '                    <span>'+item['message']+'</span>' +
                           '                    <span>'+item['date']+'</span>' +
                           '                </div>';//Он тут типо зеленый мессаге
                   }
                   if(item['id_admin']==0)
                   {
                       html+='<div class="messageuser">' +
                           '                    <span>'+item['date']+'</span>' +
                           '                    <span>'+item['message']+'</span>' +
                           '                </div>';//Он тут типо синий мессаге
                   }

               });
               document.getElementById('messeges').innerHTML=html;//Хуй знает почему не сделал $.html()
               html='';
           }

        }

    });
}


//alluser

function alluser()//Вывод всех польхоавтелей в админ панеле
{
    $.ajax
    ({
        type:'POST',
        url:'http://chat/wp-content/plugins/adminchat/php/admin.php',
        data:{"type":'getuser'},
        success:function (result)
        {
            var mas=JSON.parse(result);
            if(mas!='')
            {
                var html='';
                mas.forEach(function (item,i,mas)
                {
                    html+='<li onclick="vivodadmin('+item['id']+')">User'+item['id']+'</li>';
                });
                document.getElementById('user').innerHTML=html;
                html='';
            }
        }
    });
}


//Получение 1 чата с пользователем, передаю айди юзера, дада да айди  а не токен и че ебать ты мне сделаешь мой чат, че хочу то и делаю
var intervalmess='';
function vivodadmin(id)
{
    clearInterval(intervalmess);
    intervalmess=setInterval(function ()
    {
        $.ajax
        ({
            type:'POST',
            url:'http://chat/wp-content/plugins/adminchat/php/admin.php',
            data:{"id":id,"type":'getchat'},
            success:function (result)
            {
                localStorage['id']=id;
                var mas=JSON.parse(result);
                if(mas!='')
                {
                    var html='';
                    mas.forEach(function (item,i,mas)
                    {
                        if(item['id_admin']==1)
                        {
                            html+='<div class="messageadmin">' +
                                '                    <span style="width: 100%">'+item['message']+'</span>' +
                                '                    <span>'+item['date']+'</span>' +
                                '                </div>';//Зелененький
                        }
                        if(item['id_admin']==0)
                        {
                            html+='<div class="messageuser">' +
                                '                    <span>'+item['date']+'</span>' +
                                '                    <span style="width: 100%">'+item['message']+'</span>' +
                                '                </div>';//Сининький
                        }

                    });
                    document.getElementById('messeges').innerHTML=html;
                    document.getElementById('login').innerHTML='User'+id;
                    html='';
                }

            }

        });
    },100);

}

//
function sendadmin(id)//Хуй его знает чем это отличается от той функции, просто идет обновление данных по чату у админа
{
    var message=$('#message').val();
    //alert(id);
    if(message!='')
    {
        $('#message').css('border','1px solid #e8e8e8');
        $.ajax
        ({
            type:'POST',
            url:'http://chat/wp-content/plugins/adminchat/php/admin.php',
            data:{"message":message,"id":id,"type":'send'},
            success:function (result)
            {
                $('#message').val('');
                vivodadmin(id);
            }

        });
    }
    else
    {
        $('#message').css('border','1px solid red');
    }
}


//
function closetab()//При нажатии на КРЕСТЕК дисплей наню блок с чатом у юзера
{
    flagchat=!flagchat;
    if(flagchat)
    {
        $('.chat').css('display','block');
        $('.chatcole').css('display','none');
    }
    else
    {
        $('.chat').css('display','none');
        $('.chatcole').css('display','block');
    }
}



