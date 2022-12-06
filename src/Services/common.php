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

class SuitDetails
{
    public $id;
    public $name;
    public $year;
    public $price;
    public $image1;
    public $image2;
    public $image3;
    public $image4;
    public $brand;
    public $category;
    public $description;

    function __construct($id, $name, $year, $price, $image1, $image2, $image3, $image4, $brand, $category, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
        $this->price = $price;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->image4 = $image4;
        $this->brand = $brand;
        $this->category = $category;
        $this->description = $description;
    }
}

class UserInfo
{
    public $id;
    public $fname;
    public $lname;
    public $phone;
    public $email;

    function __construct($id, $fname, $lname, $phone, $email)
    {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->email = $email;
    }
}

// function includeFileWithVariables($fileName, $variables)
// {
//   extract($variables);
//   include($fileName);
// }

?>