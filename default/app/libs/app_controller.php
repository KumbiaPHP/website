<?php
/**
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 **/

// @see Controller nuevo controller
require_once CORE_PATH . 'kumbia/controller.php';

class AppController extends Controller {

    /**
     * Nombre de la página que se mostrará en el template
     */
    public $page_title = '';
    
    final protected function initialize() {
        
    }

    final protected function finalize() {        
        $this->page_title = ($this->page_title=='') ? 'KumbiaPHP web & app Framework' : trim($this->page_title).' - KumbiaPHP';        
    }
}