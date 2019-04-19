<?php
require_once"reserve.php";


class reservecontroller(){




	static  function selectforadminview()
	{
		$model = new reserve();
		$model->selectforviewadmin();
	}



}





?>