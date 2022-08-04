<?php

namespace basics;

class Basics implements BasicsInterface
{
    private BasicsValidator $validator;

    public function __construct(BasicsValidator $validator)
    {
        $this->validator = $validator;
    }

    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        if ($minute > 0 && $minute < 16) {
            return "first";
        }
        elseif ($minute > 15 && $minute < 31) {
            return "second";
        }
        elseif ($minute > 30 && $minute < 46) {
            return "third";
        }
        else {
            return "fourth";
        }
    }

    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);

        return ($year % 4 == 0) && ($year % 100 != 0 || $year % 400 == 0);
    }

    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);

        $array = str_split($input);
        return (array_sum(array_slice($array, 0, 3)) == array_sum(array_slice($array, 3, 3)));
    }
}