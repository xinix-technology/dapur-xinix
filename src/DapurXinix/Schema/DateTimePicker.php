<?php

namespace Dapurxinix\Schema;

use \Norm\Norm;
use \Bono\Helper\URL;
use \Bono\App;
use \Norm\Schema\DateTime;

class DatePicker extends DateTime{

    public function cell($value, $entry = NULL) {
        if($value instanceof \Norm\Type\DateTime){
            $result = date("d-m-Y", strtotime($value->__toString()));
        }else{
            $result = $value;
        }
        return $result;
    }

    public function formatReadonly($value, $entry = NULL){
        return "<span class=\"field\">".date("d-m-Y", strtotime($value->__toString()))."</span>";
    }

    public function formatInput($value, $entry = NULL) {
        $app = App::getInstance();

        if($value instanceof \Norm\Type\DateTime){
            $value = date("d-m-Y", strtotime($value->__toString()));
        }else{
            if(!empty($value)){
                $value =  date("d-m-Y", strtotime($value));
            }
        }

        if ($this['formatReadonly']) {
            return '<span class="field">'.date('d-m-Y', strtotime($value)).'</span>';
        }

        return $app->theme->partial('_schema/datepicker', array(
            'value' => $value,
            'entry' => $entry,
            'self' => $this
        ));
    }


}
