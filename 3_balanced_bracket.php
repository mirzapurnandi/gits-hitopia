<?php

function isBalanced($str)
{
    $stack = [];
    $openingBrackets = ['(', '[', '{'];
    $closingBrackets = [')' => '(', ']' => '[', '}' => '{'];

    // Iterasi melalui setiap karakter dalam string
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if (in_array($char, $openingBrackets)) {
            // Jika karakter adalah braket buka, tambahkan ke stack
            array_push($stack, $char);
        } elseif (array_key_exists($char, $closingBrackets)) {
            // Jika karakter adalah braket tutup
            // Periksa apakah stack kosong atau tidak cocok dengan braket buka terakhir
            if (empty($stack) || array_pop($stack) !== $closingBrackets[$char]) {
                return "NO";
            }
        }
    }

    // Jika setelah iterasi stack masih tidak kosong, maka braket tidak seimbang
    return empty($stack) ? "YES" : "NO";
}

// Contoh penggunaan:
$input1 = "{ [ ( ) ] }";
$input2 = "{ [ ( ] ) }";
$input3 = "{ ( ( [ ] ) [ ] ) [ ] }";

echo "Sample 1: " . isBalanced($input1) . "\n";
echo "Sample 2: " . isBalanced($input2) . "\n";
echo "Sample 3: " . isBalanced($input3) . "\n";


// Kompleksitas Waktu dan Ruang:
// Kompleksitas Waktu:

// Iterasi melalui setiap karakter dalam string, yang memakan waktu O(n), dengan n adalah panjang string.
// Kompleksitas Ruang:

// Penggunaan stack untuk menyimpan braket buka, yang membutuhkan ruang O(n), dengan n adalah panjang string.
// Jadi, kompleksitas waktu dan ruang kodingan ini adalah O(n). Ini merupakan solusi yang efisien dan optimal untuk menentukan apakah suatu rangkaian bracket seimbang atau tidak.