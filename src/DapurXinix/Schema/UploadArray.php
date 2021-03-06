<?php

namespace Dapurxinix\Schema;

use \Norm\Schema\NormArray;
use \Bono\Helper\URL;

class Upload extends NormArray{

    public function formatInput($value, $entry = null)
    {
        if (!empty($value)) {
            $value = htmlentities($value);
        }

        
        return $this->render('_schema/upload/input', array(
                    'value' => $value,
                    'entry' => $entry,
                    'self' => $this,
                    'url' => \Bono\Helper\URL::site('upload_file'),
            ));
        
    }

    public function formatReadonly($value, $entry = null)
    {
        return "<a target='_BLANK' href='".URL::base('data/'.$value)."'><span class=\"field\">".($this->formatPlain($value, $entry) ?: '&nbsp;')."</span></a>";
    }
}
