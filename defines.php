<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", __DIR__);
define("CONFIGS_PATH", ROOT . DS . "configs");

define("VIEWS_DIR", ROOT . DS . "views");

define("THEME_PATH", "views/" . core\Utils::config("app.theme"));
