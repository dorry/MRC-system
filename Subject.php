<?php 
require_once"mydatabaseconnection.php";
class subject
{

 private $arr;
  public function __construct()
  {
    $this->arr= array();
  }
  public function add($obj)
  {
     array_push($this->arr, $obj);
  }
  public  function notify()
  {
    $DB=database::getinstance();  
    $result =$DB->query("recievednoti","isviewed = false");
    $i = 0;
    while($row = mysqli_fetch_array($result))
   {
        $array[$i]=$row;
        $i++;
   }
   if($i!=0){
   foreach($this->arr as $a)
   {
      $a->update($array);
   }
}

}


}