<?php
session_start();
/**
 * @package adminchat123
 */
/*
Plugin Name: adminchat123
Description: Создайте <strong> удобный </strong> и  <strong> красивый </strong> чат для общения пользователя и администрации.
Version: 1.0
Author: Васеев Николай
Text Domain: adminchat123
*/

/*
Создайте <strong> удобный </strong> и  <strong> красивый </strong> чат для общения пользователя и администрации.
*/
$mysqli=new mysqli('localhost','root','','chat');
$mysqli->set_charset('utf8');


//Вывод в панель админа плагина
add_action('admin_menu','addmenu');
function addmenu()
{
    add_menu_page('chat menu','chat menu','manage_options','adminchat/akismet.php','admin_view','',3);
}
function admin_view()
{
   ?>
    <script src="http://chat/wp-content/plugins/adminchat/js/jquery-3.2.1.min.js"></script>
    <script src="http://chat/wp-content/plugins/adminchat/js/javascript.js"></script>
    <link rel="stylesheet" href="http://chat/wp-content/plugins/adminchat/css/style.css">
    <h1 class="zagolovokosn">adminchat123</h1>
    <p class="blogchat">
        Plugin Name: adminchat123 <br>
        Description: Создайте <strong> удобный </strong> и  <strong> красивый </strong> чат для общения пользователя и администрации. <br>
        Version: 1.0 <br>
        Author: Васеев Николай <br>
        Text Domain: adminchat123 <br>
        <br>
        Создайте <strong> удобный </strong> и  <strong> красивый </strong> чат для общения пользователя и администрации.
    </p>
        <h1 class="zagolovokosn paddingbot15">Чат</h1>
    <div class="chatadmin">
        <div class="users">
           <ul id="user">

          </ul>
        </div>
        <div class="chatadminform">
        <h3 class="login" id="login"></h3>
            <div class="messagechat" id="messeges">

            </div>
         </div>

    </div>
    <div class="formaadmin">
        <form action="" method="POST">
            <textarea name="message" id="message" cols="30" rows="2" placeholder="Сообщение"></textarea><input type="submit" id="submit" onclick="sendadmin(localStorage['id']);return false">
        </form>
    </div>
    <script>
        //Я не понимаю нахуй мне айдишник тут ебать
        if(localStorage['id']!='')
        {
            vivodadmin(localStorage['id']);
        }
        alluser();
        setInterval(function ()
        {
            alluser();
        },1000);
    </script>
    <?
}




//Добавление в старницу по шорткоду
add_shortcode('adminchat123','chat');

function chat()
{
global $mysqli;
    error_reporting(1);
    if(empty($_SESSION['id']))
    {
        //вот блять нахуй мне тут токен скижите кто НИТЬ аАААААА
        $rand=md5(rand(1,10000000000).'123');
        $_SESSION['id']=$rand;
        $iduser=$_SESSION['id'];
        $sql="INSERT INTO `user_chat`(`id`, `token`,`lastmess`) VALUES (NULL,'$iduser','')";
        $mysqli->query($sql);
    }
    else
    {
        $iduser=$_SESSION['id'];
    }
    ?>
    <script src="http://chat/wp-content/plugins/adminchat/js/jquery-3.2.1.min.js"></script>
    <script src="http://chat/wp-content/plugins/adminchat/js/javascript.js"></script>
    <link rel="stylesheet" href="http://chat/wp-content/plugins/adminchat/css/style.css">
    <div class="chat">
        <div class="head_chat">
            <img src="http://chat/wp-content/plugins/adminchat/images/images.jpg" alt="" class="avatarchat">
            <span class="namechat">Сергей</span>
            <span class="statuschat">Online</span>
            <span class="closechat" onclick="closetab()">X</span>
        </div>
        <div class="chatbody">
            <div class="messagechat" id="messeges">

            </div>
        </div>
        <form action="" method="POST">
            <textarea name="message" id="message" cols="30" rows="1" placeholder="Сообщение"></textarea><input type="submit" id="submit" onclick="send('<?php echo $iduser ?>');return false">
        </form>
    </div>
    <div class="chatcole" onclick="closetab()">
        <span>FAQ</span>
    </div>
    <script>
        vivod('<?php echo $iduser ?>');
        setInterval(function ()
        {
            vivod('<?php echo $iduser ?>');
        },1000);
    </script>
<?

}



