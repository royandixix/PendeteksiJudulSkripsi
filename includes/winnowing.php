<?php

function getKGrams($text, $k) {
    $kGrams = [];
    $length = strlen($text);
    for ($i = 0; $i <= $length - $k; $i++) {
        $kGrams[] = substr($text, $i, $k);
    }
    return $kGrams;
}


function getHashes($kGrams) {
    $hashes = [];
    foreach ($kGrams as $kGram) {
        $hashes[] = md5($kGram);
    }
    return $hashes;
}


function winnowing($text1, $text2, $k, $windowSize) {
    $kGrams1 = getKGrams($text1, $k);
    $kGrams2 = getKGrams($text2, $k);
  
    $hashes1 = getHashes($kGrams1);
    $hashes2 = getHashes($kGrams2);
    
    $selectedHashes1 = [];
    $selectedHashes2 = [];
  
    for ($i = 0; $i <= count($hashes1) - $windowSize; $i++) {
        $window = array_slice($hashes1, $i, $windowSize);
        $selectedHashes1[] = min($window);
    }

    for ($i = 0; $i <= count($hashes2) - $windowSize; $i++) {
        $window = array_slice($hashes2, $i, $windowSize);
        $selectedHashes2[] = min($window);
    }

    $commonHashes = array_intersect($selectedHashes1, $selectedHashes2);
    $similarityPercentage = (count($commonHashes) / count($selectedHashes1)) * 100;

    return $similarityPercentage;
}
?>
