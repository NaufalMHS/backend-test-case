<?php
class CountArray {
    public function getCountArray($input, $query)
    {
        if (empty($input) || empty($query)) {
            return "Array tidak valid.";
        }

        $output = [];

        foreach($query as $q)
        {
            $count = array_count_values($input)[$q] ?? 0;
            $output[] = $count;
        }

        return $output;
    }
}

$countArray = new CountArray();
$input = ['xc', 'dz', 'bbb', 'dz'];
$query = ['bbb', 'ac', 'dz'];
$output = $countArray->getCountArray($input, $query);
echo "[" . implode(", ", $output) . "]";


?>