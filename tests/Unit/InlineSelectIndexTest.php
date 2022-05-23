<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use KirschbaumDevelopment\Nova\InlineSelect;

class InlineSelectIndexTest extends TestCase
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

    public function testThatItInlinesOnIndex()
    {
        $this->inlineSelect->inlineOnIndex();

        $this->assertTrue($this->inlineSelect->meta['inlineIndex']);
    }

    public function testThatItEnablesOneStepOnIndex()
    {
        $this->inlineSelect->enableOneStepOnIndex();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }

    public function testThatItDisablesTwoStepOnIndex()
    {
        $this->inlineSelect->disableTwoStepOnIndex();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }
}
