<?php
namespace controllers;

use models\User;

class Home
{
    public static function main($app)
    {
        $test = User::all();
        $page = new \core\Theme();
        $page->setTpl("layout/main", []);
    }

}
