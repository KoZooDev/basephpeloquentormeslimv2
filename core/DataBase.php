<?php

namespace core;

use Illuminate\Database\Capsule\Manager as Capsule;

class DataBase
{
    public function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection(Utils::config("database.settings.db"));

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    }
}
