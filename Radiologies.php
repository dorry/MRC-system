<?php
require_once "radiologypricedecorator.php";
require_once "radiologyprice.php";
require_once "mydatabaseconnection.php";
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

    private function addradprice()
    {

        $DB=database::getinstance();  
        $result = $DB->query("radiology", "Name = 'UV-Ray' and isdeleted='false'");
        $row = mysqli_fetch_array($result);
        return $row['price'];

    }
}

?>