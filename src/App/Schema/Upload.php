<?php

namespace App\Schema;

use \Norm\Schema\Field;
use \Bono\Helper\URL;

class Upload extends Field{

    public function formatInput($value, $entry = null)
    {
        if (!empty($value)) {
            $value = htmlentities($value);
        }

        if ($value) {
            return '<a href="'.URL::site('/delete_file/'.$entry->getId() . '/' . $this['name'] . '/' . $entry->getCollection()->getName()).'" class="delete-file" style="margin-left: 12px; margin-top: 12px; display: block; cursor: pointer;">Delete File '.$value.'</a>';
        } else {
            return $this->render('_schema/upload/input', array(
                        'value' => $value,
                        'entry' => $entry,
                        'self' => $this
                ));
        }
    }

    public function formatReadonly($value, $entry = null)
    {
        return "<a target='_BLANK' href='".URL::base('data/'.$value)."'><span class=\"field\">".($this->formatPlain($value, $entry) ?: '&nbsp;')."</span></a>";
    }
}
