<?php
/**
 * ActiveRecord
 *
 * Esta clase es la clase padre de todos los modelos
 * de la aplicacion
 *
 * @category Kumbia
 * @package Db
 * @subpackage ActiveRecord
 */

// Carga el active record
Load::coreLib('kumbia_active_record');

class ActiveRecord extends KumbiaActiveRecord {
    
    function createSlug(){
			$this->slug = $this->slug($this->title);
	}
    
    function slug($str, $delimiter='-', $length=100) {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
        $str = strtolower(trim($str, '-'));
        $str = preg_replace("/[\/_|+ -]+/", $delimiter, $str);
        if (strlen($str) > $length) {
			$str = substr($str, 0, $length);
		}

        return $str;
    }

}
