<?php

namespace Dapurxinix\Schema;

use Norm\Schema\Field;
use Norm\Norm;
use Bono\Helper\URL;

class AutoComplete extends Field
{
    public function from($data_sources)
    {
        if (is_callable($data_sources)) {
            $this->set('data_sources', call_user_func($data_sources));
        } else {
            $this->set('data_sources', $data_sources);
        }

        return $this;
    }

    public function normalizeData($data_sources)
    {
        if (is_array($data_sources)) {
            if (is_array($data_sources[0])) {
                $this->flag = 3;
            } else {
                $this->flag = 1;
            }

            $data_sources = json_encode($data_sources);
        } else {
            $this->flag = 2;
            $this->key  = $this->get('key');
            $this->val  = $this->get('val');

            if (!filter_var($data_sources, FILTER_VALIDATE_URL)) {
                $data_sources = URL::site($data_sources);
            }
        }

        return $data_sources;
    }

    public function formatInput($value, $entry = null)
    {
        $data_sources = $this->normalizeData($this->get('data_sources'));

        return $this->render('_schema/autocomplete/input', array(
            'self' => $this,
            'value' => $value,
            'entry' => $entry,
            'data_sources' => $data_sources,
            'flag' => $this->flag,
            'key' => isset($this->key) ? $this->key : '',
            'val' => isset($this->val) ? $this->val : ''
        ));
    }

    public function formatReadonly($value, $entry = null)
    {
        return "<span class=\"field\">".($this->formatPlain($value, $entry) ?: '&nbsp;')."</span>";
    }
}
