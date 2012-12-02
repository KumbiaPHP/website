<?php
/**
 * Controller para crear un escaparate de webs en KumbiaPHP
 * 
 */
class EscaparateController extends AppController {
	
	public $menu = "escaparate"; //para el menu

	public function index()	{
		$this->page_title = 'Escaparate de webs y aplicaciones';
	}
        
        public function page($page) {
                
        }
	
	public function categoria($categoria = NULL, $pag = 1) {
	
	}

	public function tag($tag = NULL, $pag = 1) {
		
	}
	
        public function pais($pais = NULL, $pag = 1) {
		
	}
	
	public function enviar() {
		
	}
	
        public function web($web) {
                
        }
}