<?php 
class Product
{
    private $id ;

    private $name;

    private $price;

    private $type;

    private $creationDate;

    private $categories;

    

    public function __construct($ID, $name, $price, $type, $creationDate,$categories)
    {
        $this->id = $ID;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type ;       
        $this->creationDate = $creationDate;
        $this->categories=$categories;
    }


    
    public function getID()
    {
        return $this->id;
    }



    public function setID($ID)
    {
        $this->id = $ID;
    }



    public function getName()
    {
        return $this->name;
    }



    public function setName($name)
    {
        $this->name = $name;
    }



    public function getPrice()
    {
        return $this->price;
    }



    public function setPrice($price)
    {
        $this->price = $price;
    }



    public function getType()
    {
        return $this->type;
    }



    public function setType($type)
    {
        $this->type = $type;
    }



    public function getCreationDate()
    {
        return $this->creationDate;
    }



    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    
    
    
    public function getCategories()
    {
        return $this->categories;
    }



    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

}
?>