<?php
/*include"stemming.php";
stemming();
$similarity;
*/
//function similarity(){
//$myfile1 = fopen("stemming1.txt", "r") or die("Unable to open file!");
//$myfile2 = fopen("stemming2.txt", "r") or die("Unable to open file!");

/**
 *
 * @param $str
 * @return mixed
 */
 function wordLetterPairs ($str)
{
    $allPairs = array();

    // Tokenize the string and put the tokens/words into an array

    $words = explode(' ', $str);

    // For each word
    for ($w = 0; $w < count($words); $w ++) {
        // Find the pairs of characters
        $pairsInWord = letterPairs($words[$w]);

        for ($p = 0; $p < count($pairsInWord); $p ++) {
            $allPairs[$pairsInWord[$p]] = $pairsInWord[$p];
        }
    }

    return array_values($allPairs);
}

/**
 *
 * @param $str
 * @return array
 */
 function letterPairs ($str)
{
    $numPairs = mb_strlen($str) - 1;
    $pairs = array();

    for ($i = 0; $i < $numPairs; $i ++) {
        $pairs[$i] = mb_substr($str, $i, 2);
    }

    return $pairs;
}

/**
 *
 * @param $str1
 * @param $str2
 * @return float
 */
 function compareStrings ($str1, $str2)
{
    $pairs1 = wordLetterPairs(mb_strtolower($str1));
    $pairs2 = wordLetterPairs(mb_strtolower($str2));


    $union = count($pairs1) + count($pairs2);

    $intersection = count(array_intersect($pairs1, $pairs2));
//echo $union.' , ';
    return ((2.0 * $intersection) / $union)*100;
}
/*
$str1=fgets($myfile1);
$str2 = fgets($myfile2);

$similarity= compareStrings($str1,$str2) ;
echo $similarity;*/
//}
?>