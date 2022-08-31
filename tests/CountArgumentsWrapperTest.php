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
            [[-1.23, 56]],
            [['flower', true]],
            [['25', null]],
            [['array', ['one', 'two']]]
        ];
    }
}
