<?php
interface ISubject
{
	public function add($Subject); 
	public function notify(); 
}
interface IObserver
{
	public function update($price);
}

?>