<?php
namespace core;

class Utils
{
    public static function config($data)
    {

        $file = explode(".", $data);

        $file_inc = include CONFIGS_PATH . DS . $file[0] . ".php";

        if (empty($file[1])) {
            return $file_inc;
        }

        if (empty($file[2])) {
            return $file_inc[$file[1]];
        }

        return $file_inc[$file[1]][$file[2]];

    }

}
