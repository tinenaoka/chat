<?php
include_once 'connect.php';
if(!empty($_POST))
{
    $date=date('H:i');
    $sql="INSERT INTO `message_chat`(`id`, `date`, `message`) VALUES (NULL,'$date','{$_POST['message']}')";//Добавляю данные в таблицу сообщений
    $mysqli->query($sql);
    $last_id=$mysqli->insert_id;
    $sql="INSERT INTO `message_user_chat`(`id_mu`, `id_user`, `id_admin`, `id_message`) 
        VALUES (NULL,'{$_POST['id']}','0','$last_id')";
    ///После этого беру это сообщение и добавляю в таблицу чат юзер где мне похуй нихуя не понял что это сами разбирайтесь
    $mysqli->query($sql);
    $date=date('Y.m.d H:i');
    $sql="UPDATE `user_chat` SET `lastmess`='$date' WHERE `token`='{$_POST['id']}'";//А это апдейт даты последнего сообщения

    $mysqli->query($sql);
    //echo $sql;

}



?>