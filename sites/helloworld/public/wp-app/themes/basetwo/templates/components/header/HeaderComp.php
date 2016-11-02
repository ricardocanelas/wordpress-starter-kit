<?php namespace BaseT\Components;

class HeaderComp
{
    public $data = array();

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    public function renderHtml()
    {
        include('HeaderComp.template.phtml');
    }
}

class HeaderCompData
{
    public $title = '';
    public $sub_title = '';

    public function __construct($data = null)
    {
        if(is_object($data) || is_array($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }
}