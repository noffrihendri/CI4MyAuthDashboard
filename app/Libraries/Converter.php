<?php

namespace App\Libraries;

class Converter
{
    function __construct()
    {
    }
    function objectToArray($d)
    {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            return array_map(null, $d);
        } else {
            return $d;
        }
    }


    function arrayToObject($d)
    {
        if (is_array($d)) {
            return (object) array_map(null, $d);
        } else {
            return $d;
        }
    }
}
