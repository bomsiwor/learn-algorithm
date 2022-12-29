<?php

// Complete the getMinimumCost function below.
function getMinimumCost($k, $c)
{
    // Sorting the flower price
    sort($c);

    // Determine how many loop
    $N = count($c);

    // Variables
    $total = $count = $perPerson = $round = 0;
    $selected = $N - 1; // Selected Flower to buy

    // Start Buying flowers
    while ($count < $N) :
        $total += $c[$selected] * ($perPerson + 1);
        $round++;
        if ($round == $k) :
            $round = 0;
            $perPerson++; // Increase the price
        endif;

        $selected--;
        $count++;
    endwhile;
    return $total;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$minimumCost = getMinimumCost($k, $c);

fwrite($fptr, $minimumCost . "\n");

fclose($stdin);
fclose($fptr);
