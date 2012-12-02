<?php
/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController {
	
	
	public function index()	{
		
	}
	
	public function caracteristicas() {
		$this->page_title = 'Características del framework KumbiaPHP';
		$this->menu = 'caracteristicas';
	}

	public function descargas() {
		$this->page_title = 'Descargar KumbiaPHP Framework';
		$this->menu = 'descargas';
	}
	

	public function irc() {
		$this->page_title = 'IRC';
	}

}