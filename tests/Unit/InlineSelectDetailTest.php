<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use KirschbaumDevelopment\Nova\InlineSelect;

class InlineSelectDetailTest extends TestCase
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

    public function testThatItInlinesOnDetail()
    {
        $this->inlineSelect->inlineOnDetail();

        $this->assertTrue($this->inlineSelect->meta['inlineDetail']);
    }

    public function testThatItEnablesOneStepOnDetail()
    {
        $this->inlineSelect->enableOneStepOnDetail();

        $this->assertTrue($this->inlineSelect->meta['detailTwoStepDisabled']);
    }

    public function testThatItDisablesTwoStepOnDetail()
    {
        $this->inlineSelect->disableTwoStepOnDetail();

        $this->assertTrue($this->inlineSelect->meta['detailTwoStepDisabled']);
    }
}
