<?php

function dd($vars){
    echo "<pre>";
    var_dump($vars);
    die;
    echo "</pre>";
}