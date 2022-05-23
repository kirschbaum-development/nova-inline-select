<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use KirschbaumDevelopment\Nova\InlineSelect;

class InlineSelectLensTest extends TestCase
{
    use WithFaker;

    /**
     * @var InlineSelect
     */
    protected InlineSelect $inlineSelect;

    /**
     * @before
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->inlineSelect = new InlineSelect('inline-select');
    }

    public function testThatItInlinesOnLens()
    {
        $this->inlineSelect->inlineOnIndex();

        $this->assertTrue($this->inlineSelect->meta['inlineIndex']);
    }

    public function testThatItEnablesOneStepOnLens()
    {
        $this->inlineSelect->enableOneStepOnLens();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }

    public function testThatItDisablesTwoStepOnLens()
    {
        $this->inlineSelect->disableTwoStepOnLens();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }
}
