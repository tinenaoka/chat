<?php
/**
 * @package slabovesion
 */
/*
Plugin Name: slabovesion
Description: Добавте в вашу стринцу по шотркоду <b>[slabovesion]</b> понятную панель управления внешним видом сайта, для людей нуждающимся в версии для слобовидящих.
Version: 1.0
Author: Васеев Нкиолай
*/

/*
Добавте в вашу стринцу по шотркоду <b>[slabovesion]</b> понятную панель управления внешним видом сайта, для людей нуждающимся в версии для слобовидящих.
*/


add_shortcode('slabovesion','user_view');

function user_view()
{
    ?>
        <h1 class="my-name-slabo">Изменение шрифта</h1>
        <div class="slabovesion_panel">
            <div class="shrift_firs" style="font-size: 20px;padding-top: 10px"  onclick="shrift(30)">A</div>
            <div class="shrift" style="font-size: 23px;padding-top: 7px"  onclick="shrift(33)">A</div>
            <div class="shrift" style="font-size: 26px;padding-top: 5px"  onclick="shrift(36)">A</div>
            <div class="shrift" style="font-size: 28px;padding-top: 3px"  onclick="shrift(38)">A</div>
            <div class="shrift_last"  style="font-size: 30px" onclick="shrift(40)">A</div>
        </div>
    <h1 class="my-name-slabo l-25">Изменение цвета</h1>
        <div class="slabovesion_panel l-25" style="margin-bottom: 20px">
            <div class="shrift_firs" style="background-color:white;color:#333" onclick="cvet('white','#333')">6</div>
            <div class="cvet" style="background-color:black;color:#fff" onclick="cvet('black','white')">7</div>
            <div class="cvet" style="background-color:#5959f7;color:#333" onclick="cvet('#5959f7','#333')">8</div>
            <div class="cvet" style="background-color:#822800;color:green" onclick="cvet('#822800','green')">9</div>
            <div class="shrift_last" style="background-color:#fbdec0;color:#333" onclick="cvet('#fbdec0','#333')">10</div>
        </div>

    <style>
        .my-name-slabo{
        }
        .slabovesion_panel
        {
            width: 100%;
            display: flex;
            top: 45px;
            z-index: 10;
        }
        .l-25
        {
            left: 60%;
        }
        .shrift_firs
        {
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }
        .shrift,.cvet,.shrift_last,.shrift_firs
        {
            padding-left: 10px;
            padding-right: 10px;
            background-color: white;
            border: 1px solid #DEDEDE;
            color: black;
            cursor: pointer;
        }
        .shrift_last
        {
            margin-right: 10px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
    <script src="http://chat/wp-content/plugins/slabovesion/js/jquery-3.2.1.min.js"></script>
    <script src="http://chat/wp-content/plugins/slabovesion/js/slabovesion.js"></script><script src=""></script>
    <?php
}
