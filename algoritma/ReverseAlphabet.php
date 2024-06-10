<?php
class ReverseString {
    
    public function reverse($input)
    {
        $string = $input;
        $length = strlen($string);
        $new_string = "";
        $numbers = "";

        // Pisahkan huruf dan angka
        for ($i = 0; $i < $length; $i++) {
            $char = $string[$i];
            if (is_numeric($char)) {
                $numbers .= $char;
            } else {
                $new_string .= $char;
            }
        }
        $new_string = strrev($new_string);
        $new_string .= $numbers;

        return $new_string; 
    }

}

$reverser = new ReverseString();
$input = "NEGIE1";
$result = $reverser->reverse($input);
echo "Hasil pembalikan string: $result\n";

?>
