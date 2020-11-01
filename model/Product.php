<?php
class Product {

    private $name;
    private $price;
    private $description;
    private $routeToPicture;
    private $categoryName;
    private $categoryID;

    public function __construct($name,$price,$description,$routeToPicture,$categoryName,$categoryID)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->routeToPicture = $routeToPicture;
        $this->categoryName = $categoryName;
        $this->categoryID = $categoryID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getRouteToPicture()
    {
        return $this->routeToPicture;
    }


    public function getCategoryName()
    {
        return $this->categoryName;
    }


    public function getID()
    {
        return $this->categoryID;
    }
}
?>