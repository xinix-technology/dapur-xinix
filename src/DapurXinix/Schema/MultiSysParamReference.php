<?php

namespace DapurXinix\Schema;

use \Norm\Norm;
use Norm\Schema\ReferenceArray;

class MultiSysParamReference extends ReferenceArray {

    public function with($group) {
        $this->foreignGroup = $group;

        $this->set('foreignGroup',$group);
        $this->set('foreign','Sysparam');
        $this->set('foreignLabel','value');
        $this->set('foreignKey','keyz');
        return $this;
    }

    public function defaults($defaults = 0) {
        $this->set('defaults', $defaults);
        return $this;
    }

    public function optionData()
    {
        $cursor =  Norm::factory($this['foreign'])->find(array('groups'=>$this['foreignGroup']));
        if (isset($this['bySort'])) {
            $cursor->sort($this['bySort']);
        }

        return $cursor;
    }

    public function optionValue($key, $entry)
    {
        if (is_scalar($entry)) {
            return $key;
        } else {
            return $entry[$this['foreignKey']];
        }
    }

    public function optionLabel($key, $entry)
    {
      
        $label = $entry[$this['foreignLabel']];

        return $label;
    }

    public function formatReadonly($value, $entry = null)
    {
        $html = "<span class=\"field\">\n";
        if (!empty($value)) {
            foreach ($value as $key => $v) {
                $foreignEntry = Norm::factory($this['foreign'])->findOne(array('groups'=>$this['foreignGroup'],'keyz'=>$v));
                
                $label = $foreignEntry[$this['foreignLabel']];
                
                $html .= '<code>'.$label."</code>\n";
            }
        }
        $html .= "</span>\n";
        return $html;
    }

    public function formatInput($value, $entry = null)
    {
        return $this->render('_schema/multi_sysparam_reference/input', array(
            'value' => $value,
            'entry' => $entry,
        ));
    }

    public function toJSON($value)
    {
        

        $foreignCollection = Norm::factory($this['foreign']);

        if (Norm::options('include')) {
            $foreignKey = $this['foreignKey'];
            $newValue = array();
            foreach ($value as $k => $v) {
                    $newValue[] = $foreignCollection->findOne(array('groups'=>$this['foreignGroup'],'keyz'=>$value));
            }

            $value = $newValue;
        }

        return $value;
    }


}
