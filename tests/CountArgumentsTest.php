<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider countArgumentDataProvider
     */
    public function testCountArguments($expected, ...$input)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$input));
    }

    public function countArgumentDataProvider(): array
    {
        return [
            [['argument_count' => 0, 'argument_values' => []], ],
            [['argument_count' => 1, 'argument_values' => [0 => 'AKF']], 'AKF'],
            [['argument_count' => 3, 'argument_values' => [0 => 'World', 1 => 'is', 2 => 'beautiful']],
                'World', 'is', 'beautiful']
        ];
    }
}
