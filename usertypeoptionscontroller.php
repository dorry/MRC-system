<?php 
require_once 'usertypeoptions.php';
require_once 'usertypeoptionsview.php';


class usertypeoptionscontroller
{

	static function selectforeav($rid){
		$UTO = new usertypeoptions();
		$UTO->selectUTOeav($rid);
	}



}