<?php

namespace Kdg\InlineSelect;

use Laravel\Nova\Fields\Field;

class InlineSelect extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'inline-select';

    /**
     * Set the options for the select menu.
     *
     * @param  array  $options
     *
     * @return $this
     */
    public function options($options)
    {
        return $this->withMeta([
            'options' => collect($options ?? [])->map(function ($label, $value) {
                return is_array($label) ? $label + ['value' => $value] : ['label' => $label, 'value' => $value];
            })->values()->all(),
        ]);
    }

    /**
     * Allow inline select to auto-update field value on change on detail view.
     *
     * @return $this
     */
    public function disableTwoStepOnDetail()
    {
        return $this->withMeta(['detailTwoStepDisabled' => true]);
    }

    /**
     * Allow inline select to auto-update field value on change on index view.
     *
     * @return $this
     */
    public function disableTwoStepOnIndex()
    {
        return $this->withMeta(['indexTwoStepDisabled' => true]);
    }

    /**
     * Display values using their corresponding specified labels.
     *
     * @return $this
     */
    public function displayUsingLabels()
    {
        return $this->withMeta(['displayUsingLabels' => true]);
    }

    /**
     * Enable inline editing on index view.
     *
     * @return $this
     */
    public function inlineOnIndex()
    {
        return $this->withMeta(['inlineIndex' => true]);
    }

    /**
     * Enable inline editing on detail view.
     *
     * @return $this
     */
    public function inlineOnDetail()
    {
        return $this->withMeta(['inlineDetail' => true]);
    }
}
