<?php 
require_once 'links.php';
require_once 'LinksView.php';
require_once 'usertype.php';


class LinksController
{
	static  function CreateLinkForm()
	{
		$view = new LinksView();
		$view->CreateLinkForm();
	}
	static  function ShowUserTypedropdown()
	{
		$view = new LinksView();
		$view->ShowUserTypedropdown();
	}
	static  function ShowLinksdropdown()
	{
		$view = new LinksView();
		$view->ShowLinksdropdown();
	}
}
?>