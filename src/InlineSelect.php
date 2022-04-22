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
     * Allow inline select to auto-update field value on change on index view.
     *
     * @return $this
     */
    public function disableTwoStepOnLens()
    {
        return $this->disableTwoStepOnIndex();
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
     * Enable inline editing on index view.
     *
     * @return $this
     */
    public function inlineOnLens()
    {
        return $this->inlineOnIndex();
    }
}
