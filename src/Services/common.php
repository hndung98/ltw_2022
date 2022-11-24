<?php

class Suit
{
    public $id;
    public $name;
    public $year;
    public $price;
    public $image;

    function __construct($id, $name, $year, $price, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
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