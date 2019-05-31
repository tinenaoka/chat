<?php
session_start();
include_once 'config_fourm.php';
if(isset($_POST['submit']))
{
    if(!empty($_POST['login']&&$_POST['password']))
    {
        $sql="SELECT * FROM `user_fourm` WHERE `login`='{$_POST['login']}' AND `password`='{$_POST['password']}'";
        $result=$mysqli->query($sql);
        $row=$result->num_rows;
        if($row>0)
        {
            $_SESSION['count_auth']=0;
            $_SESSION['login']=$_POST['login'];
            $header='http://pluginauthfourm/%D1%81%D0%BF%D0%B8%D1%81%D0%BE%D0%BA-%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D0%B5%D0%B9/';
            header('Location: '.$header);
        }
        else
        {
            $header='http://pluginauthfourm';
            $_SESSION['count_auth']=$_SESSION['count_auth']+1;
            header('Location: '.$header);

        }
    }
}
?>