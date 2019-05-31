<?php
session_start();
include_once 'config_fourm.php';
if(isset($_POST['submit']))
{
    if(!empty($_POST['email']))
    {
        $sql="SELECT * FROM `user_fourm` WHERE `email`='{$_POST['email']}'";
        $result=$mysqli->query($sql);
        $row=$result->num_rows;
        if($row>0)
        {
            $header='http://pluginauthfourm/?fagot_pass=1';
            //
            $_SESSION['email']='Письмо отправленно';
            //
            $po=$result->fetch_assoc();
            //
            $passnew=md5(time().rand(0,1000));
            //
            $passnew=substr($passnew,0,7);
            //
            mail('admin@pluginauthfourm.com',$_POST['email'],'Ваш логин '.$po['login'].' .Ваш новый пароль '.$passnew,'Востановление пароля');
            //
            $_SESSION['count_auth']=0;
            //
            header('Location: '.$header);
        }
        else
        {
            $header='http://pluginauthfourm/?fagot_pass=1';
            $_SESSION['email']='Пользователя не найдено';
            header('Location: '.$header);
        }
    }
}
?>