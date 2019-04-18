<?php 
require_once 'links.php';
require_once 'LinksView.php';


class LinksController
{
	static  function CreateLinkForm()
	{
		$view = new LinksView();
		$view->CreateLinkForm();
	}

}
?>