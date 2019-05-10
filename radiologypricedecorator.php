<?php
require_once "Iinvoice.php";
abstract class radiologypricedecorator implements Iinvoice
{
	public $cost;
	public $desc;
	public function __construct(Iinvoice $in)
	{
     $this->cost = $in;
    }
    public  function price()
    {
        return $this->cost->price();
    }
    public  function list()
    {
        return $this->desc->list();
    }
}
?>
