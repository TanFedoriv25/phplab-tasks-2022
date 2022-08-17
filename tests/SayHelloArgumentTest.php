<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHelloArgument($input));
    }

    public function positiveDataProvider(): array
    {
        return [
            ['world', 'Hello world'],
            [25, 'Hello 25'],
            [2.35, 'Hello 2.35'],
            [true, 'Hello 1']
        ];
    }
}
