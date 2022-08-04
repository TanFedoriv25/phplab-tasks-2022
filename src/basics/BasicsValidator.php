<?php

namespace basics;

class BasicsValidator implements BasicsValidatorInterface
{

    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 || $minute > 60) {
            throw new \InvalidArgumentException("The function only accepts minutes in range from 0 to 60. The minute was ".$minute);
        }
    }

    public function isYearException(int $year): void
    {
        if ($year < 1900) {
            throw new \InvalidArgumentException("The function only accepts years that is bigger than 1900. The year was ".$year);
        }
    }

    public function isValidStringException(string $input): void
    {
        if (strlen($input) != 6) {
            throw new \InvalidArgumentException("The function only accept 6 digits");
        }
    }
}