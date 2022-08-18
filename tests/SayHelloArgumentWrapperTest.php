<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider exceptionDataProvider
     */
    public function testException($input)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->sayHelloArgumentWrapper($input);
    }

    public function exceptionDataProvider(): array
    {
        return [
            [['hello', 2, -1.6]],
            [null],
            [new DateTime()]
        ];
    }
}
