<?php
require_once "Iinvoice.php";
class radiologyprice  implements Iinvoice
{
    public  function price()
    {
        return 0;
    }
    public  function lis()
    {
        return "Radiologies reserved : ";
    }

}

?>
