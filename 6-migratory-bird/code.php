<?php

/*
 * Complete the 'migratoryBirds' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function migratoryBirds($arr)
{
    $output = [];

    // Append array as assoc
    foreach ($arr as $a) :
        $output[$a] = ($output[$a] ?? 0) + 1;
    endforeach;

    // Create an array to keep the highest number by the bird's types
    $key = array_keys($output, max($output));

    // Find the minimum bird types
    return min($key);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = migratoryBirds($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
