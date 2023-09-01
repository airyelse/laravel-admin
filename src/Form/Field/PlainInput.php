<?php

namespace Encore\Admin\Form\Field;

trait PlainInput
{
    /**
     * @var string
     * @deprecated
     */
    protected $prepend;

    /**
     * @var string
     * @deprecated
     */
    protected $append;

    /**
     * @param mixed $string
     * @deprecated
     * @return $this
     */
    public function prepend($string)
    {
        if (is_null($this->prepend)) {
            $this->prepend = $string;
        }

        return $this;
    }

    /**
     * @param mixed $string
     * @deprecated
     * @return $this
     */
    public function append($string)
    {
        if (is_null($this->append)) {
            $this->append = $string;
        }

        return $this;
    }


    /**
     * @param string $attribute
     * @param string $value
     * @deprecated
     * @return $this
     */
    protected function defaultAttribute($attribute, $value)
    {
        if (!array_key_exists($attribute, $this->attributes)) {
            $this->attribute($attribute, $value);
        }

        return $this;
    }
}
