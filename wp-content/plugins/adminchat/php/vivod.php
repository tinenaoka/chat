<?php
include_once 'connect.php';

//Да как это заебало блять нахуй мне токен нужен если я везде беру айди юзера
$sql="SELECT * FROM `message_user_chat` INNER JOIN message_chat ON (message_user_chat.id_message=message_chat.id AND message_user_chat.id_user='{$_POST['id']}')";
$result=$mysqli->query($sql);
$row=$result->num_rows;
if($row>0)
{
    $mas=Array();
   while($po=$result->fetch_assoc())
   {
       $vivod=array('date'=>$po['date'],'message'=>$po['message'],'id_admin'=>$po['id_admin']);
        array_push($mas,$vivod);
   };
   echo json_encode($mas,JSON_UNESCAPED_UNICODE);
}

?>