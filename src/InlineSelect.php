<?php

namespace KirschbaumDevelopment\Nova;

use Laravel\Nova\Fields\Select;

class InlineSelect extends Select
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'inline-select';

    /**
     * Allow inline select to auto-update field value on change on detail view.
     */
    public function enableOneStepOnDetail(): InlineSelect
    {
        return $this->withMeta(['detailTwoStepDisabled' => true]);
    }

    /**
     * Allow inline select to auto-update field value on change on detail view.
     */
    public function disableTwoStepOnDetail(): InlineSelect
    {
        return $this->enableOneStepOnDetail();
    }

    /**
     * Allow inline select to auto-update field value on change on index view.
     */
    public function enableOneStepOnIndex(): InlineSelect
    {
        return $this->withMeta(['indexTwoStepDisabled' => true]);
    }

    /**
     * Allow inline select to auto-update field value on change on index view.
     */
    public function disableTwoStepOnIndex(): InlineSelect
    {
        return $this->enableOneStepOnIndex();
    }

    /**
     * Allow inline select to auto-update field value on change on index view.
     */
    public function enableOneStepOnLens(): InlineSelect
    {
        return $this->enableOneStepOnIndex();
    }

    /**
     * Allow inline select to auto-update field value on change on index view.
     */
    public function disableTwoStepOnLens(): InlineSelect
    {
        return $this->enableOneStepOnIndex();
    }

    /**
     * Enable inline editing on detail view.
     */
    public function inlineOnDetail(): InlineSelect
    {
        return $this->withMeta(['inlineDetail' => true]);
    }

    /**
     * Enable inline editing on index view.
     */
    public function inlineOnIndex(): InlineSelect
    {
        return $this->withMeta(['inlineIndex' => true]);
    }

    /**
     * Enable inline editing on index view.
     */
    public function inlineOnLens(): InlineSelect
    {
        return $this->inlineOnIndex();
    }
}
