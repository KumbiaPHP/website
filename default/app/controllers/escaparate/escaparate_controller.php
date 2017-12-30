<?php

class EscaparateController extends AppController
{
    public function before_filter()
    {
        //View::template('proto'); //Realmente es necesario ??
    }

    public function index($page = 1)
    {
        $this->listado = (new Web())->dame_todas_paginadas($page);
    }

    public function agregar()
    {
        if (Input::hasPost('web', 'autor')) {
            if ((new Site())->addNew(Input::post('web'), Input::post('autor'), Input::post('social'), $_FILES['imagenweb'])) {
                Flash::valid(_('Sitio agregado exitosamente. Gracias.'));

                return Redirect::to();
            }
            Flash::error(_('Error al añadir website.'));
        }
    }

    public function autorizar($id = null)
    {
        if ($id == null) {
            $this->listado = (new Web())->find('conditions: activa = 0'); // elementos pendientes
            return;
        }
        if ((new Web())->activar($id)) {
            Flash::valid(_('Sitio activado exitosamente'));

            return Redirect::to();
        }
        Flash::error(_('Error al activar website.'));
    }
}
