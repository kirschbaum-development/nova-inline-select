<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use KirschbaumDevelopment\Nova\InlineSelect;

class InlineSelectFieldTest extends TestCase
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

    public function testThatItDisablesTwoStepOnDetail()
    {
        $this->inlineSelect->disableTwoStepOnDetail();

        $this->assertTrue($this->inlineSelect->meta['detailTwoStepDisabled']);
    }

    public function testThatItDisablesTwoStepOnIndex()
    {
        $this->inlineSelect->disableTwoStepOnIndex();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }

    public function testThatItDisablesTwoStepOnLens()
    {
        $this->inlineSelect->disableTwoStepOnLens();

        $this->assertTrue($this->inlineSelect->meta['indexTwoStepDisabled']);
    }

    public function testThatItInlinesOnIndex()
    {
        $this->inlineSelect->inlineOnIndex();

        $this->assertTrue($this->inlineSelect->meta['inlineIndex']);
    }

    public function testThatItInlinesOnLens()
    {
        $this->inlineSelect->inlineOnIndex();

        $this->assertTrue($this->inlineSelect->meta['inlineIndex']);
    }

    public function testThatItInlinesOnDetail()
    {
        $this->inlineSelect->inlineOnDetail();

        $this->assertTrue($this->inlineSelect->meta['inlineDetail']);
    }
}
