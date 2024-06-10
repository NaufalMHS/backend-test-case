<?php
class LongestSentences {
    public function longestWord($input)
    {
        if (empty(trim($input))) {
            return "Input tidak valid.";
        }

        $words = $this->splitIntoWords($input);
        $wordCount = count($words);

        for ($i = 0; $i < $wordCount; $i++) {
            $longest = $words[$i];
            $longestIndex = $i;

            for ($j = $i + 1; $j < $wordCount; $j++) {
                if (strlen($words[$j]) > strlen($longest)) {
                    $longest = $words[$j];
                    $longestIndex = $j;
                }
            }

            $temp = $words[$longestIndex];
            $words[$longestIndex] = $words[$i];
            $words[$i] = $temp;
        }

        return $words[0] . " : " . strlen($words[0]);
    }

    private function splitIntoWords($input)
    {
        return explode(" ", $input);
    }
}


$longestSentences = new LongestSentences();
$input = "Saya sangat senang mengerjakan soal algoritma";
echo $longestSentences->longestWord($input);

?>