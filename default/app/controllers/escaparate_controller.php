<?php

/**
 * Controller para crear un escaparate de webs en KumbiaPHP
 * 
 */
class EscaparateController extends AppController
{

    public $menu = "escaparate"; //para el menu

    public function index($pag = 1)
    {
        $this->page_title = 'Escaparate de webs y aplicaciones';

        $this->items = Load::model('escaparate')->findByStatus(1, $pag);
    }

    public function categoria($categoria = NULL, $pag = 1)
    {
        View::select('index');
        $this->items = Load::model('escaparate')->findByCategoria($categoria, $pag);
    }

    public function tag($tag = NULL, $pag = 1)
    {
        View::select('index');
        $this->items = Load::model('escaparate')->findByTag($tag, $pag);
    }

    public function pais($pais = NULL, $pag = 1)
    {
        View::select('index');
        $this->items = Load::model('escaparate')->findByPais($pais, $pag);
    }

    public function enviar()
    {
        if (Input::hasPost('form')) {
            $image = Upload::factory('image', 'image');
            if (Load::model('escaparate')->add(Input::post('form'), $image)) {
                Flash::valid('Web agregada con exito');
                Flash::info('Ahora deberás esperar que tu web sea activada por los administradores');
            } else {
                Flash::warning('No se pudieron guardar las datos');
            }
        }
    }

    public function web($web)
    {
        if (!$this->item = Load::model('escaparate')->findByTitle($web)) {
            throw new KumbiaException('No existe esta web');
        }
    }

}