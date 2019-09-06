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
    protected $inlineSelect;

    /**
     * @before
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->inlineSelect = new InlineSelect('inline-select');
    }

    public function testThatItHandlesOptionsProperly()
    {
        $value = $this->faker->word;
        $label = $this->faker->word;

        $this->inlineSelect->options([$value => $label]);

        $this->assertEquals($label, $this->inlineSelect->meta['options'][0]['label']);
        $this->assertEquals($value, $this->inlineSelect->meta['options'][0]['value']);
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

    public function testThatItDisplaysUsingLabels()
    {
        $this->inlineSelect->displayUsingLabels();

        $this->assertTrue($this->inlineSelect->meta['displayUsingLabels']);
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

    public function testCallbackCanBeUsedAsOptionsArgument()
    {
        $this->inlineSelect->options(function () {
            $value = 'foo';
            $label = 'bar';

            return [$value => $label];
        });

        $this->assertSame('bar', $this->inlineSelect->meta['options'][0]['label']);
        $this->assertSame('foo', $this->inlineSelect->meta['options'][0]['value']);
    }
}
