<?php

/*
 * Complete the 'candies' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY arr
 */

function candies($n, $arr)
{
    function createArray()
    {
        return 1;
    };

    $candies = array_map('createArray', range(1, $n)); // create an array which have same value

    // Check forward
    for ($i = 0; $i < $n; $i++) :
        if (isset($arr[$i + 1]) && ($arr[$i + 1] > $arr[$i])) :
            $candies[$i + 1] = $candies[$i] + 1;
        endif;
    endfor;

    // Check backward
    for ($i = $n - 1; $i > 0; $i--) :
        if (($arr[$i - 1] > $arr[$i]) && ($candies[$i - 1] <= $candies[$i]) && isset($arr[$i - 1])) :
            $candies[$i - 1] = $candies[$i] + 1;
        endif;
    endfor;


    return array_sum($candies);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_item = intval(trim(fgets(STDIN)));
    $arr[] = $arr_item;
}

$result = candies($n, $arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
