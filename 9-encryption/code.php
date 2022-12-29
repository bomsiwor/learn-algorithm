<?php

/*
 * Complete the 'encryption' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function encryption($s)
{
    $L = strlen($s);

    // $rows = floor(sqrt($L));
    // unused

    $columns = ceil(sqrt($L));
    $text = "";

    for ($i = 0; $i < $columns; $i++) :
        $j = $i;
        for ($j; $j < $L; $j += $columns) :
            $text .= $s[$j];
        endfor;

        $text .= " ";
    endfor;

    return $text;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = encryption($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
