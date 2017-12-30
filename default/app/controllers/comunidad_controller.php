<?php
/**
 * Controller sección comunidad
 * Descripción y enlaces a: foro, wiki, IRC, ...
 *
 */
class ComunidadController extends AppController
{
    
    public $menu = "comunidad"; //para el menu

    public function index()
    {
        $this->page_title = 'Comunidad';
    }
        
    public function page($page)
    {
    }
    
    public function categoria($categoria = null, $pag = 1)
    {
    }

    public function tag($tag = null, $pag = 1)
    {
    }
    
    public function pais($pais = null, $pag = 1)
    {
    }
    
    public function enviar()
    {
    }
    
    public function web($web)
    {
    }
}
