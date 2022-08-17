<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider exceptionDataProvider
     */
    public function testException(...$input)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->countArgumentsWrapper(...$input);
    }

    public function exceptionDataProvider(): array
    {
        return [
            [array(-1.23, 56)],
            [array('flower', true)],
            [array('25', NULL)],
            [array('array', array('one', 'two'))]
        ];
    }
}
