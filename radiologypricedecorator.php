<?php
class radiologypricedecorator extends Iradiologyprice implements Iradiologyprice
{
    public $price = new radiologyprice();
    public static function tax()
    {
        return $price.tax();
    }
}

?>