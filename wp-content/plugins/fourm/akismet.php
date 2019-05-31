<?php
session_start();
/**
 * @package fourm
 */
/*
Plugin Name: fourm
Description: Превратите ваш сайт в полноценный фоурм и <strong>управляйте контентом</strong>, создовайте пользователей и получайте удовольствие.
Version: 1.0
Author: Васеев Николай
*/

/*
Превратите ваш сайт в полноценный фоурм и <strong>управляйте контентом</strong>, создовайте пользователей и получайте удовольствие.
*/

//
include_once 'config_fourm.php';



//----Active/Deactivate plugin----

//Activate plugin
register_activation_hook(__FILE__,'create_table_fourm');

//function Activate plugin
function create_table_fourm()
{
    $mysqli=new mysqli('localhost','root','','pluginauthfourm');
    $mysqli->set_charset('utf8');
    //
    $sql="CREATE TABLE `user_fourm`(
    `id_user` int(11) NOT NULL AUTO_INCREMENT,
    `login` text(255) NOT NULL,
    `password` text(255) NOT NULL,
    `email` text(255) NOT NULL,
     PRIMARY KEY(`id_user`)
      )";
    //
    $mysqli->query($sql);
    //
    $sql="CREATE TABLE `posts_fourm`(
    `id_post` int(11) NOT NULL AUTO_INCREMENT,
    `title` text(255) NOT NULL,
    `text` text(255) NOT NULL,
    `date` text(255) NOT NULL,
    `file` text(255) NOT NULL,
     PRIMARY KEY(`id_post`)
      )";
    //
    $mysqli->query($sql);

    //
    $sql="INSERT INTO `user_fourm`(`id_user`, `login`, `password`, `email`) VALUES (NULL,'admin','admin','admin@mail.ru')";
    $mysqli->query($sql);
}

//Deactivate plugin
register_deactivation_hook(__FILE__,'delete_table_fourm');

//function Deactivate plugin
function delete_table_fourm()
{
    //
    $mysqli=new mysqli('localhost','root','','pluginauthfourm');
    $mysqli->set_charset('utf8');

    //
    $sql="DROP TABLE `pluginauthfourm`.`posts_fourm`";
    $mysqli->query($sql);
    //
    $sql="DROP TABLE `pluginauthfourm`.`user_fourm`";
    $mysqli->query($sql);
    //


}
//--------------

//
add_shortcode('auth_fourm','auth_fourm_func');

//Нинада
function auth_fourm_func()
{
    global $mysqli;
    if(!isset($_GET['fagot_pass']))
    {
        ?>
        <h1 class="zagolovok_fourm">Авторизация</h1>
        <form action="http://pluginauthfourm/wp-content/plugins/fourm/auth.php" method="post" class="form_fourm">
            <input type="text" placeholder="Логин" name="login">
            <input type="password" placeholder="Пароль" name="password">
            <div class="flex">
                <?php
                if ($_SESSION['count_auth'] > 2)
                {
                    ?>
                    <input type="submit" name="submit" value="Войти">
                    <a class="forget_fourm" href="<?= get_site_url() . '/?fagot_pass=1' ?>">Забыли пароль?</a>
                    <?php
                }
                else
                {
                    ?>
                    <input type="submit" name="submit" value="Войти">
                    <?php
                }
                ?>
            </div>
        </form>
        <?
    }
    else
    {
        ?>
        <h1 style="margin-bottom: 0px;"><?= $_SESSION['email']?></h1>
        <h1 class="zagolovok_fourm">Востановление пароля</h1>
        <form action="http://pluginauthfourm/wp-content/plugins/fourm/forgot_pass.php" method="post" class="form_fourm">
            <input type="email" placeholder="Логин" name="email">
            <div class="flex">
                <input type="submit" name="submit" value="Востанавить">
                <a class="forget_fourm" href="<?= get_site_url() . '/' ?>">Назад</a>
            </div>
        </form>
        <?php
    }
    ?>
<style>
    .zagolovok_fourm {
        font-weight: bold;
        font-family: Tahoma;
        margin-top: 2rem;
        padding: 0px !important;
    }

    .form_fourm {
        width: 100%;
    }

    .form_fourm > input {
        margin-top: 2rem;
    }

    .form_fourm > input[type=submit] {
        margin-bottom: 2rem;
    }

    .forget_fourm {
        margin-left: auto;
        display: block;
        cursor: pointer;
    }

    .flex {
        margin-top: 2rem;
        display: flex;
        width: 100%;
    }
</style>
<?php
}

//
add_shortcode('user_fourm','user_fourm_func');

//
function user_fourm_func()
{
    global $mysqli;
    global $wpdb;
    ?>
    <h1 class="zagolovok_fourm">Список пользователей</h1>
        <div class="fourm">
            <div class="width-25">
                <ul>
                    <?php
                    $table_name = $wpdb->get_blog_prefix().'users';
                    $sql="SELECT * FROM `".$table_name."`";
                    $result=$mysqli->query($sql);
                    while ($po=$result->fetch_assoc())
                    {
                        echo '<li><a href="'.$_SESSION['page_user'].'?author_fourm='.$po['ID'].'">'.$po['user_login'].'</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    <style>
        #primary
        {
            max-width: 1000px !important;
        }
        .zagolovok_fourm
        {
            font-weight: bold;
            font-family: Tahoma;
            margin-top: 0rem;
            padding: 0px !important;
        }
        .fourm
        {
            width: 100%;
            height: auto;
        }
        .width-25
        {
            float: left;
            width: 100%;
            height: 500px;
            overflow-y: auto;
        }
        .width-25>ul
        {
            padding: 0px;
            margin: 0px;
            list-style-type: none;
        }
        .width-25>ul>li
        {
            text-align: center;
            background: #333;
            padding: 10px;
            border-radius: 25px;
            width: 25%;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
        }
        .width-25>ul>li>a
        {
            color: white !important;
            font-weight: bold !important;
            box-shadow:none !important;
        }
        .width-25>ul>li>a:hover
        {
            text-decoration: none;
            border-bottom: 1px solid white;
            transition: 0.5s ease;
        }
        .width-25>ul>li:first-child
        {
           margin-top: 10px;
        }
        .width-75
        {
            padding-left: 0px;
            padding-right: 0px;
            width: 75%;
            float: left;
            height: 500px;
            overflow-x: auto;
        }
        .width-75>div:first-child{
            margin-top: 0px !important;
        }
        .post_fourm
        {
            margin-top: 1.5rem;
            width: 100%;
            height: auto;
            border: 1px solid #333;
            padding: 15px;
            border-radius: 25px;
        }
        .post_fourm>img
        {
            margin-top: 1rem;
        }
        .post_fourm>p
        {
            margin-top: 1rem;
            font-size: 20px;
        }
    </style>
    <?php
}

//
add_shortcode('news_fourm','news_fourm_func');
//
function news_fourm_func()
{
    global $mysqli;
    global $wpdb;
    $_SESSION['page_user']=get_permalink();
 ?>
    <div class="width-75">
        <?php

        $authormain=1;
        $page_fourm_main=1;
        $pagin=0;
        if(isset($_GET['author_fourm']))
        {
            $authormain=$_GET['author_fourm'];
        }
        // print_r($wpdb);
        $postall=get_posts(array('numberposts'=>-1,'orderby'=>'author'));
        //
        $pagin_fourm=0;
        $pagin_fourm_min=0;
        $pagin_fourm_max=3;
        if(isset($_GET['page_fourm']))
        {
            $pagin_fourm_max=$_GET['page_fourm']*3;
            $page_fourm_main=$_GET['page_fourm'];
        }
        $pagin_fourm_min=$pagin_fourm_max-3;
        //

        foreach ($postall as $value)
        {
            if($value->post_author==$authormain&&$value->post_status=='publish')
            {
                if($pagin_fourm<$pagin_fourm_max&&$pagin_fourm>=$pagin_fourm_min)
                {
                    //login_user
                    $table_name = $wpdb->get_blog_prefix().'users';
                    $sql="SELECT `user_login` FROM `".$table_name."` WHERE `ID`='$value->post_author'";
                    $result=$mysqli->query($sql);
                    $po=$result->fetch_assoc();
                    //img_post
                    $pagin=get_post($value->ID);
                    //print_r($pagin_fourm);
                    ?>
                    <div class="post_fourm">
                        <h4><?=$value->post_title?><span style="float: right"><?= $po['user_login'] ?></span></h4>
                        <?= get_the_post_thumbnail($value->ID); ?>
                        <p><?=$value->post_content?></p>
                    </div>
                    <?php
                }
                $pagin_fourm++;
            }
        }
        ?>
        <div class="pagin_fourm123" style="width: 100%;text-align:right;display: flex">
            <?php
            //
            $div=intval($pagin_fourm/3);
            $mod=$pagin_fourm%3;
            if($mod>0)
            {
                $div=$div+1;
            }
            //
            $prev=$page_fourm_main-1;
            if($prev>0)
            {
                echo '<div style="width: 100%;text-align: left">
                <a style="" href="'.get_permalink().'?author_fourm='.$authormain.'&page_fourm='.$prev.'">prev</a>
                </div>';
            }
            //
            $next=$page_fourm_main+1;
            if($next<=$div)
            {
                echo '<div style="width: 100%;">
                <a style="" href="'.get_permalink().'?author_fourm='.$authormain.'&page_fourm='.$next.'">next</a>
                </div>';
            }
            ?>
        </div>
    </div>
    <style>
        #primary
        {
            max-width: 1000px !important;
        }
        .zagolovok_fourm
        {
            font-weight: bold;
            font-family: Tahoma;
            margin-top: 0rem;
            padding: 0px !important;
        }
        .fourm
        {
            width: 100%;
            height: auto;
        }
        .width-25
        {
            float: left;
            width: 100%;
            height: auto;
        }
        .width-25>ul
        {
            padding: 0px;
            margin: 0px;
            list-style-type: none;
        }
        .width-25>ul>li
        {
            text-align: center;
            background: #333;
            padding: 10px;
            border-radius: 25px;
            width: 25%;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
        }
        .width-25>ul>li>a
        {
            color: white !important;
            font-weight: bold !important;
            box-shadow:none !important;
        }
        .width-25>ul>li>a:hover
        {
            text-decoration: none;
            border-bottom: 1px solid white;
            transition: 0.5s ease;
        }
        .width-25>ul>li:first-child
        {
            margin-top: 10px;
        }
        .width-75
        {
            padding-left: 0px;
            padding-right: 0px;
            width: 100%;
            float: left;
            height:auto;
        }
        .width-75>div:first-child{
            margin-top: 0px !important;
        }
        .post_fourm
        {
            margin-top: 1.5rem;
            width: 100%;
            height: auto;
            border: 1px solid #333;
            padding: 15px;
            border-radius: 25px;
        }
        .post_fourm>img
        {
            margin-top: 1rem;
        }
        .post_fourm>p
        {
            margin-top: 1rem;
            font-size: 20px;
        }
    </style>
<?
}

//
function wpdocs_register_my_custom_menu_page()
{
    add_menu_page(
        __( 'fourm', 'textdomain' ),
        'fourm',
        'manage_options',
        'custompage',
        'admin_view_fourm'
    );
}
//
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

//
function admin_view_fourm()
{
    global $mysqli;
}
