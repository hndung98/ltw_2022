<?php
class Suit
{
  public $name;
  public $price;

  function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
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