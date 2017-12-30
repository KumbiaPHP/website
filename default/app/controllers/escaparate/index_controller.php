<?php

class IndexController extends AppController
{
    public function before_filter()
    {
        //View::template('proto'); //Realmente es necesario ??
    }

    public function index(int $page = 1)
    {
        $this->listado = (new Web())->dame_todas_paginadas($page);
    }
}
