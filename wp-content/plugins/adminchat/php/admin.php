<?php
//Код пизда простой и одновременно туопй не поймете будете дэбилами


//Файл отвечающий чисто за все в админке, передаю аджаксом посто параметр и сверяю ниже

include_once 'connect.php';

//P.S. Вместо апи хуйни, я сделал 1 файл с дохуя проверок, чисто флекс, мой чат что хочу то и делаю,




//Думаю все понятно
if($_POST['type']=='send')
{
    $sql="SELECT * FROM `user_chat` WHERE `id`='{$_POST['id']}'";
    $result=$mysqli->query($sql);
    $po=$result->fetch_assoc();
    $token=$po['token'];

    $date=date('H:i');
    $sql="INSERT INTO `message_chat`(`id`, `date`, `message`) VALUES (NULL,'$date','{$_POST['message']}')";
    $mysqli->query($sql);
    $last_id=$mysqli->insert_id;
    $sql="INSERT INTO `message_user_chat`(`id_mu`, `id_user`, `id_admin`, `id_message`) VALUES (NULL,'$token','1','$last_id')";
    $mysqli->query($sql);
}
//тут тоже все понятно
if($_POST['type']=='getuser')
{
    $sql="SELECT * FROM `user_chat` ORDER BY `user_chat`.`lastmess`  DESC";
    $result=$mysqli->query($sql);
    $mas=Array();
    while($po=$result->fetch_assoc())
    {
        $vivod=array('id'=>$po['id'],'token'=>$po['token']);
        array_push($mas,$vivod);
    };
    echo json_encode($mas,JSON_UNESCAPED_UNICODE);
}
//Получения чата с определенным юзером, передаю айди получаю токен, да да айди че хочу то и делаю нахуй мне токен все еще не пойму
if($_POST['type']=='getchat')
{
    $sql="SELECT * FROM `user_chat` WHERE `id`='{$_POST['id']}'";
    $result=$mysqli->query($sql);
    $po=$result->fetch_assoc();
    $token=$po['token'];


    $sql="SELECT * FROM `message_user_chat` INNER JOIN message_chat ON (message_user_chat.id_message=message_chat.id AND message_user_chat.id_user='$token')";
    $result=$mysqli->query($sql);
    $mas=Array();
    while($po=$result->fetch_assoc())
    {
        $vivod=array('date'=>$po['date'],'message'=>$po['message'],'id_admin'=>$po['id_admin']);
        array_push($mas,$vivod);
    };
    echo json_encode($mas,JSON_UNESCAPED_UNICODE);

}
//Получение последнего сообщения, что бы вывести в верх стараницы
if($_POST['type']=='messagelast')
{
    $sql="SELECT * FROM `message_user_chat` WHERE `id_admin`='0'";
    $result=$mysqli->query($sql);
    $row=$result->num_rows;
    echo $row;
//    $po=$result->fetch_assoc();
//    $token=$po['token'];
}
?>