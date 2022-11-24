<?php

class Suit
{
    public $name;
    public $price;
    public $image;

    function __construct($name, $price, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    // Methods
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
}

// function includeFileWithVariables($fileName, $variables)
// {
//   extract($variables);
//   include($fileName);
// }

?>