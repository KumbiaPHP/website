<?php
/**
 * Controller por defecto de la documentación
 * 
 * 
 */
class IndexController extends AppController {
	
	public $menu = "aprender"; //para el menu
	
	public function index()	{
		$this->page_title = 'Documentación, aprende en español';
	}

}