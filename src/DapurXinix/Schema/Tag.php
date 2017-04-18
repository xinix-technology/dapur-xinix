<?php

namespace Dapurxinix\Schema;

use Norm\Schema\NormArray;
use Norm\Norm;
use Bono\Helper\URL;

class Tag extends NormArray
{


    public function from($foreign,$field = null) 
    {
        $this['foreign'] = $foreign;
        $this['field'] = 'name';
        $argc = func_num_args();

        if($argc == 2){
            $this['field'] = $field;
        }
        
        
        return $this;
    }

    private function normalizeData($value,$entry = null)
    {
        if (!is_string($this['foreign'])) {
            $this->flag = 1;
            $data = array();

            if(is_callable($this['foreign'])){
                $data = call_user_func($this['foreign'],$value,$entry);
            }else{
               $data = $this['foreign']; 
            }
            $data_sources = $data;
        } else {
            $this->flag = 2;
            $data_sources = URL::site(strtolower($this['foreign']).'.json');
        }

        return $data_sources;
    }

    public function formatInput($value, $entry = null)
    {
        $data_sources = $this->normalizeData($value,$entry);

        return $this->render('_schema/tag/input', array(
            'self' => $this,
            'name' => $this->get('name'),
            'value' => $value->toArray(),
            'entry' => $entry,
            'data_sources' => $data_sources,
            'flag' => $this->flag,
        ));
    }

    public function formatReadonly($value, $entry = null)
    {
        $html = "<span class=\"field\">\n";
        if (!empty($value)) {
            foreach ($value as $key => $v) {
                $html .= '<code>'.$v."</code>\n";
            }
        }
        $html .= "</span>\n";

        return $html;
    }
}
