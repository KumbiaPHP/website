<?php
/**
 * Controller sección comunidad
 * Descripción y enlaces a: foro, wiki, IRC, ...
 * 
 */
class ComunidadController extends AppController {
	
	
	public function index()	{
		$this->page_title = 'Comunidad';
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