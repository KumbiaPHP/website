<?php
/**
 * ActiveRecord.
 *
 * Esta clase es la clase padre de todos los modelos
 * de la aplicacion
 *
 * @category Kumbia
 */

// Carga el active record
require_once CORE_PATH.'libs/kumbia_active_record/kumbia_active_record.php';

class ActiveRecord extends KumbiaActiveRecord
{
    //public $debug = true;
}
