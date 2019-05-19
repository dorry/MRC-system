<?php
require_once "radiologypricedecorator.php";
require_once "radiologyprice.php";
require_once "mydatabaseconnection.php";

class PET extends radiologypricedecorator
{
    public function __construct($rad)
    {
        parent::__construct($rad);
    }

  public function price()
    {
        return parent::price() + $this::addradprice();
    }
    public function lis()
    {
        return parent::lis() . $this::addlist(); 
    }
    private function addlist()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'PET' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return "<h4>  - ". $row['Name'] . " ". $row['price']. "</h4>" ." " ;
    }
    private function addradprice()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'PET' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return $row['price'];

    }
}
class Tax extends radiologypricedecorator
{
    public function __construct($rad)
    {
        parent::__construct($rad);
    }

  public function price()
    {
        return parent::price() + $this::addradprice();
    }
    public function lis()
    {
        return parent::lis() . $this::addlist(); 
    }
    private function addlist()
    {
        return "<h4>- Tax -50  </h4>" ;
    }
    private function addradprice()
    {

        return -50;

    }
}
class XRay extends radiologypricedecorator
{
    public function __construct($rad)
    {
        parent::__construct($rad);
    }

  public function price()
    {
        return parent::price() + $this::addradprice();
    }
    public function lis()
    {
        
        return parent::lis() . $this::addlist(); 
    }
    private function addlist()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'XRay' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return "<h4>  - ". $row['Name'] . " ". $row['price']. "</h4>" ." " ;
    }
    private function addradprice()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'XRay' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return $row['price'];

    }
}
class CT extends radiologypricedecorator
{
    public function __construct($rad)
    {
        parent::__construct($rad);
    }
    public function price()
    {
    	return parent::price() + $this::addradprice();
    }
    public function lis()
    {
        return parent::lis() . $this::addlist(); 
    }
    private function addlist()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'CT' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return "<h4>  - ". $row['Name'] . " ". $row['price']. "</h4>" ." " ;
    }
    private function addradprice()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'CT' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return $row['price'];

    }
}

class UVray extends radiologypricedecorator
{
    public function __construct($rad)
    {
        parent::__construct($rad);
    }

    public function price()
    {
        return parent::price() + $this::addradprice(); 
    }

        public function lis()
    {
        return parent::lis() . $this::addlist(); 
    }
    private function addlist()
    {
        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'UV-Ray' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return "<h4>  - ". $row['Name'] . " ". $row['price']. "</h4>" ." " ;
    }

    private function addradprice()
    {

        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'UV-Ray' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
       // echo "Totsaal Cost : ";
        return  $row['price'];

    }
}

?>