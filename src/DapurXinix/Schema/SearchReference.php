<?php

namespace Dapurxinix\Schema;

use Norm\Schema\Reference;
use Norm\Norm;
use Bono\Helper\URL;

class SearchReference extends Reference
{
   

    public function normalizeData()
    {
            
        $data_sources = URL::site(strtolower($this['foreign']).'.json');
        return $data_sources;
    }

     public function optionLabel($key, $entry)
    {
        
        if (is_scalar($entry)) {
            $label = $entry;
        } elseif ($this['foreignLabel'] instanceof \Closure) {
            $getLabel = $this['foreignLabel'];
            $label = $getLabel($entry);
        }else {
            $label = @$entry[$this['foreignLabel']];
        }

        return $label;
    }

    public function rowData($value){
        
        $model = Norm::factory($this['foreign'])->findOne(array($this['foreignKey'] => $value));
        if(!$model){
            return array();
        }
        return $model;

    }



    public function formatInput($value, $entry = null)
    {
        $data_sources = $this->normalizeData($this->get('data_sources'));
        
        return $this->render('_schema/searchreference/input', array(
            'self' => $this,
            'value' => $value,
            'entry' => $entry,
            'data_sources' => $data_sources
        ));
    }
}
