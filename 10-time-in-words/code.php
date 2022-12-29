<?php

/*
 * Complete the 'timeInWords' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER h
 *  2. INTEGER m
 */

function timeInWords($h, $m)
{
    $res = "";
    $jam = [
        'zero', 'one', 'two', 'three', 'four', 'five',
        'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve'
    ];

    $menit = [
        'zero', 'one', 'two', 'three', 'four', 'five',
        'six', 'seven', 'eight', 'nine', 'ten',
        'eleven', 'twelve', 'thirteen', 'fourteen',
        'fifteen', 'sixteen', 'seventeen', 'eighteen',
        'nineteen', 'twenty', 'twenty one', 'twenty two',
        'twenty three', 'twenty four', 'twenty five',
        'twenty six', 'twenty seven', 'twenty eight',
        'twenty nine', 'thirty'
    ];

    if ($m == 0) :
        $res = $jam[$h] . " o' clock";
    elseif ($m == 15) :
        $res = "quarter past " . $jam[$h];
    elseif ($m == 30) :
        $res = "half past " . $jam[$h];
    elseif ($m == 45) :
        $res = "quarter to " . (($h == 12) ? $jam[1] : $jam[$h + 1]);
    elseif ($m > 0 && $m < 30) :
        $res = $menit[$m] . " minute" . (($m !== 1) ? "s " : " ") . "past " . $jam[$h];
    elseif ($m > 30 && $m < 60) :
        $min_remain = 60 - $m;
        $pre = ($min_remain === 1) ? " minute to " : " minutes to ";

        $res = $menit[$min_remain] . $pre . (($h == 12) ? $jam[1] : $jam[$h + 1]);
    endif;

    return $res;
};

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$h = intval(trim(fgets(STDIN)));

$m = intval(trim(fgets(STDIN)));

$result = timeInWords($h, $m);

fwrite($fptr, $result . "\n");

fclose($fptr);
