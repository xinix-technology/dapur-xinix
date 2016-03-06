<?php

namespace Dapurxinix\Schema;

use Norm\schema\Float;

class Rate extends Float
{

	public function formatInput($value, $entry = null)
    {
        if(is_null($value)){
        	$value = 0;
        }

        return $this->render('_schema/rate/input', array(
                        'value' => $value,
                        'entry' => $entry,
                        'self' => $this
                ));
    }

    public function multiple($multiple = false){
    	$this['multiple'] = $multiple;

    	return $this;
    }

    public function formatReadonly($value, $entry = null)
    {

    	$this['readonly'] = true;
        return $this->render('_schema/rate/input', array(
                        'value' => $value,
                        'entry' => $entry,
                        'self' => $this
                ));
    }
 
}