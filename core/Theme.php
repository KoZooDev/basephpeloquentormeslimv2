<?php
namespace core;

use Rain\Tpl;

require_once "vendor/rain/raintpl/library/Rain/autoload.php";

class Theme
{

    private $tpl;
    private $path;
    private $theme;
    private $options = [];
    private $defaults = [
        "header" => false,
        "footer" => false,
        "data" => [],
        "tpl_dir" => "",
    ];

    public function __construct($options = [])
    {
        $this->options = array_merge($this->defaults, $options);

        $rainConfig = [
            "tpl_dir" => $this->setPath(),
            "cache_dir" => Utils::config("app.cache"),
            "debug" => Utils::config("app.debug"),
            "php_enabled" => false,
            "tpl_ext" => "tpl.php",
        ];

        Tpl::configure($rainConfig);

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);

        if ($this->options["header"] === true) {
            $this->tpl->draw("header/header");
        }

    }

    private function setData($data = [])
    {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = [], $returnHTML = false)
    {
        $this->setData($data);
        return $this->tpl->draw($name, $returnHTML);
    }

    private function setPath()
    {
        if ($this->options["tpl_dir"] === 'dashboard') {
            return VIEWS_DIR . DS . Utils::config("app.dashboard") . DS;
        }

        return VIEWS_DIR . DS . Utils::config("app.theme") . DS;
    }
    public function __destruct()
    {
        if ($this->options["footer"] === true) {
            $this->tpl->draw("footer/footer");
        }
    }
}
