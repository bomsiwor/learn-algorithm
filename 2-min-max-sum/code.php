<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr)
{
    // Count length
    $count = count($arr);

    // Sorting array ascending order
    asort($arr);

    // Grab min and max
    $min = array_sum(array_slice($arr, 0, $count - 1));
    $max = array_sum(array_slice($arr, - ($count - 1)));

    return print_r($min . " " . $max);
}

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

miniMaxSum($arr);
