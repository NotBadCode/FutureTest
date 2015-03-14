<?php

function  getTimeDate($datetime){
    $arr_date=explode(' ',$datetime);

    return "$arr_date[1]   $arr_date[0]";
}