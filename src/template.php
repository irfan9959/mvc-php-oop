<?php
class Template{
    private $layout;
    function __construct($layout)
    {
        $this->layout=$layout;
    }
    function view($template,$variables){
        extract($variables);
        include(ROOT_PATH.'layout/'.$this->layout.'.html');
    }
}