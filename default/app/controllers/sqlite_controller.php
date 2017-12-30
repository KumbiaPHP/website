<?php

/**
 * Controller: prueba de sqlite.
 */
class SqliteController extends ScaffoldController
{
    public $model = 'Markus';

    public function index2($page = 1)
    {
        //View::select(null, null);
        //$this->data = (new Markus())->find();
        $this->data = (new Markus())->paginate_by_sql('select * from markus', 'page: 1', 'order: 10');
        //$this->data = (new Markus())->find_all_by_sql('SELECT COUNT(*) FROM (select * from markus) AS t');
        //Flash::info($this->data);
        echo '<pre>';
        print_r($this->data);
        echo '</pre>';
    }
}
