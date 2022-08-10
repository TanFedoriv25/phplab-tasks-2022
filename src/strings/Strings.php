<?php

namespace strings;

class Strings implements StringsInterface
{

    /**
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return str_replace('_', '', lcfirst(ucwords($input, '_')));
    }

    /**
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        $str = explode(' ', $input);
        $mirrorString = array();

        $i = 0;
        foreach ($str as $s) {
            $mirrorString[$i] = '';
            for ($j = mb_strlen($s); $j>=0; $j--) {
                $mirrorString[$i] .= mb_substr($s, $j, 1);
            }
            $i++;
        }

        return implode(' ', $mirrorString);
    }

    /**
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        if ($noun[0] === $noun[(strlen($noun) - 1)]) {
            return ucfirst($noun . substr($noun, 1));
        } else {
            return 'The ' . ucfirst($noun);
        }
    }
}
