<?php

namespace Popbox\Loging;

class LogModel{

    public $app_name;
    public $types;
    public $content;

    function __construct($app_name, $types, $content){
        $this->app_name = $app_name;
        $this->types = $types;
        $this->content = $content;
    }
}