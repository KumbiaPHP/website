<?php

class AutorSocial extends ActiveRecord
{
    public function initialize()
    {
        $this->belongs_to('autor');
    }
}
