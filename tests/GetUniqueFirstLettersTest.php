<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    [
                        "name" => "Aniak Airport",
                        "code" => "ANI",
                        "city" => "Aniak",
                        "state" => "Alaska",
                        "address" => "Aniak, AK 99557, USA",
                        "timezone" => "America/Anchorage",
                    ],
                    [
                        "name" => "Merle K.",
                        "code" => "CDV",
                        "city" => "Cordova",
                        "state" => "Alaska",
                        "address" => "Cordova, AK 99574, USA",
                        "timezone" => "America/Anchorage",
                    ],
                    [
                        "name" => "Deadhorse Airport",
                        "code" => "SCC",
                        "city" => "Deadhorse / Prudhoe Bay",
                        "state" => "Alaska",
                        "address" => "1 Airport Way, Prudhoe Bay, AK 99734, USA",
                        "timezone" => "America/Anchorage",
                    ],
                ],
                ['A', 'D', "M"]
            ],
        ];
    }

}
