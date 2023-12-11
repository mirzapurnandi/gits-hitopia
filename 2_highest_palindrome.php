<?php

function highestPalindrome($string, $k)
{
    return findHighestPalindrome($string, $k, 0, strlen($string) - 1);
}

function findHighestPalindrome($string, $k, $left, $right)
{
    if ($k < 0) {
        // Jika k < 0, tidak mungkin membentuk palindrome dengan jumlah penggantian yang cukup.
        return -1;
    }

    if ($left >= $right) {
        // Jika left >= right, sudah selesai memeriksa seluruh string.
        return $string;
    }

    // Pilih karakter yang akan diganti (kiri atau kanan) berdasarkan yang memiliki nilai lebih besar.
    $charToReplace = max($string[$left], $string[$right]);

    // Jika karakter di kedua sisi tidak sama, kurangi k karena kita akan melakukan penggantian.
    $k -= ($string[$left] != $string[$right]);

    // Ganti karakter pada kedua sisi dengan karakter yang dipilih.
    $string[$left] = $charToReplace;
    $string[$right] = $charToReplace;

    // Panggil rekursif untuk memeriksa karakter berikutnya.
    return findHighestPalindrome($string, $k, $left + 1, $right - 1);
}

// Contoh penggunaan:
$string = '3943';
$k = 1;
$result = highestPalindrome($string, $k);

echo "Input:\n";
echo "string: '$string'\n";
echo "k: $k\n";
echo "Output: '$result'\n";
