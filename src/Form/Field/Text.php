<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

class Text extends Field
{
    use PlainInput;
    use HasValuePicker;

    /**
     * @var string
     */
    protected $icon = 'fa-pencil';

    /**
     * @var bool
     */
    protected $withoutIcon = false;

    /**
     * Set custom fa-icon.
     *
     * @param string $icon
     *
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Render this filed.
     */
    public function rendering(): void
    {
        if (empty($this->view)) {
            $this->view = 'admin::form.input';
        }

        if (!$this->withoutIcon) {
            $this->setProperty("prepend", '<i class="fa ' . $this->icon . ' fa-fw"></i>');
        }

        $this->attribute('type', 'text')
            ->attribute('id', $this->id)
            ->attribute('name', $this->elementName ?: $this->formatName($this->column))
            ->attribute('value', old($this->elementName ?: $this->column, $this->value()))
            ->attribute('class', 'form-control ' . $this->getElementClassString())
            ->attribute('placeholder', $this->getPlaceholder())
            ->mountPicker()
            ->addVariables([
                'prepend' => $this->getProperty("prepend", ""),
                'append' => $this->getProperty("append", ""),
            ]);

        if ($this->hasProperty("datalist")) {
            $this->attribute("list", "list-{$this->id}");
            $datalist = "<datalist id=\"list-{$this->id}\">";
            foreach ($this->getProperty("datalist") as $k => $v) {
                $datalist .= "<option value=\"{$k}\">{$v}</option>";
            }
            $datalist .= '</datalist>';
            $this->addVariables([
                'append' => $datalist
            ]);
        }


    }

    /**
     * Add inputmask to an elements.
     *
     * @param array $options
     *
     * @return $this
     */
    public function inputmask(array $options): static
    {
        $options = json_encode_options($options);

        $this->script = "$('{$this->getElementClassSelector()}').inputmask($options);";

        return $this;
    }

    /**
     * Add datalist element to Text input.
     *
     * @param array $entries
     * @return $this
     * @deprecated use setProperty instead
     */
    public function datalist(array $entries = []): static
    {
        $this->setProperty("datalist", $entries);
        return $this;
    }

    /**
     * show no icon in font of input.
     *
     * @return $this
     */
    public function withoutIcon(): static
    {
        $this->withoutIcon = true;
        return $this;
    }
}
