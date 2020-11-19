<?php

namespace app\core;

class Form
{
    public static function beginForm($action,$method, $classes)
    {
        return "<form action='$action' method='$method' class='$classes'>";
    }
    public static function endForm()
    {
        return "</form>";
    }

    public static function field($model,$attribute,$type){
        return new Field($model,$attribute,$type);
    }
}


?>