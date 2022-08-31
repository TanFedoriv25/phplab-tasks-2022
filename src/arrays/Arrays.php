<?php

namespace arrays;

class Arrays implements ArraysInterface
{

    /**
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $resultArray = [];

        for ($i = 0; $i < sizeof($input); $i++) {
            $resultArray = array_merge($resultArray, array_fill(0, $input[$i], $input[$i]));
        }

        return $resultArray;
    }

    /**
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $unique = array_unique($input);
        $duplicate = array_diff_key($input, $unique);
        $superUnique = array_diff($input, $duplicate);

        return count($superUnique) ? min($superUnique) : 0;
    }

    /**
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        foreach ($input as $a) {
            foreach ($a['tags'] as $tag) {
                $result[$tag][] = $a['name'];
            }
        }

        ksort($result);

        foreach ($result as $key => &$value) {
            sort($value);
        }

        return $result;
    }
}
