<?php

namespace App\Schema;

use Norm\Schema\Reference;
use Norm\Norm;
use Norm\Model;

class ReferenceGroup extends Reference
{

    private $groupdata = array();

    public function Group($foreinggroup,$groupKey = null){

        //foreinggroup is table for grouping data
        //groupkey is field on table for foreing data to foreigngroup
        $this['foreinggroup'] = $this['groupkey'] = $foreinggroup;

        if($groupKey){
            $this['groupkey'] = $groupKey;
        }
        
        return $this;
    }

    /**
     * [findOptions description]
     * @return [type] [description]
     *
     * @deprecated use Reference::optionData() instead.
     *
     */
    public function findOptions()
    {
        trigger_error(__METHOD__.' is deprecated.', E_USER_DEPRECATED);
        return $this->optionData();
    }

    public function optionData()
    {
        $cursor = parent::optionData();

        if(!is_null($this['foreinggroup'])){
            $group = Norm::factory($this['foreign'])->schema($this['groupkey']);
            $groupcursor = Norm::factory($this['foreinggroup'])->find();
            foreach ($groupcursor as $keygroup => $val) {
                $this->groupdata[$val[$group['foreignLabel']]] = array();
                foreach ($cursor as $key => $value) {
                    if($value[$this['groupkey']] == $val[$group['foreignKey']]){
                        $this->groupdata[$val[$group['foreignLabel']]][] = $value->toArray();
                    }
                }
            }
        }

        return $this->groupdata;
    }


    public function formatInput($value, $entry = null)
    {
        return $this->render('_schema/referencegroup/input', array(
            'self' => $this,
            'value' => $value,
            'entry' => $entry,
        ));
    }
}
