<?php

function generateSubstrings($s)
{
    $substrings = [];
    $currentChar = $s[0];
    $currentCount = 1;

    for ($i = 1; $i <= strlen($s); $i++) {
        if ($i < strlen($s) && $s[$i] == $currentChar) {
            // Karakter berulang, tingkatkan count
            $currentCount++;
        } else {
            // Tambahkan substring ke array
            for ($j = 1; $j <= $currentCount; $j++) {
                $substrings[] = substr($s, $i - $currentCount, $j);
            }

            // Reset variabel
            if ($i < strlen($s)) {
                $currentChar = $s[$i];
                $currentCount = 1;
            }
        }
    }

    return $substrings;
}

function weightedStrings($s, $queries)
{
    $alphabetWeights = array_flip(range('a', 'z')) + array_fill_keys(range(1, 26), 1);
    $cumulativeWeights = [];

    $cumulativeWeight = 0;
    $substrings = generateSubstrings($s);

    foreach ($substrings as $substring) {
        $substringWeight = 0;

        for ($i = 0; $i < strlen($substring); $i++) {
            $substringWeight += $alphabetWeights[$substring[$i]];
        }

        $cumulativeWeights[] = $substringWeight;
    }

    $results = [];

    foreach ($queries as $query) {
        if (in_array($query, $cumulativeWeights)) {
            $results[] = 'Yes';
        } else {
            $results[] = 'No';
        }
    }

    return $results;
}

// Contoh penggunaan:
$string = 'abbcccd';
$queries = [1, 4, 9, 4];

$output = weightedStrings($string, $queries);

// Menampilkan output
print_r($output);
// echo "Output: [" . implode(', ', $output) . "]\n";
