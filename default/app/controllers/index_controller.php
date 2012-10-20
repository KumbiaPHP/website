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
	}

	public function descargas() {
		$this->page_title = 'Descargar KumbiaPHP Framework';
	}
	
	public function documentacion() {
		
	}
	
	public function irc() {
		$this->page_title = 'IRC';
	}

}