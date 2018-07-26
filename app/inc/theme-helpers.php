<?php

function num_format($num){
    if(is_numeric($num)){
        $num = number_format($num,0,'.',' ');
    }
    return $num;
}

function has_more_pages($query){
    if($query->max_num_pages > $query->query_vars['paged']){
        return true;
    } else {
        return false;
    }
}

function breakpoints(){
    return [500, 1000, 1500, 2000, 3000];
}