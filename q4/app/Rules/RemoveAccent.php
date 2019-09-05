<?php
namespace App\Rules;

class RemoveAccent
{

    public static function remove ($string)
    {
        return preg_replace( '/[`^~\'"]/' , null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string));
    }

}
