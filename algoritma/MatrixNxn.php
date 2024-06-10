<?php
class MatrixNxn {
    private $matrix;

    public function __construct($matrix) {
        $this->matrix = $matrix;
    }

    public function getSelisihMatrix() {
        return $this->hitungDiagonalPertama() - $this->hitungDiagonalKedua();
    }

    private function hitungDiagonalPertama() {
        $diagonal = 0;
        $size = count($this->matrix);
        for ($i = 0; $i < $size; $i++) {
            $diagonal += $this->matrix[$i][$i];
        }
        return $diagonal;
    }

    private function hitungDiagonalKedua() {
        $diagonal = 0;
        $size = count($this->matrix);
        for ($i = 0; $i < $size; $i++) {
            $diagonal += $this->matrix[$i][$size - $i - 1];
        }
        return $diagonal;
    }
}

$matrix = [
    [1, 2, 0], 
    [4, 5, 6], 
    [7, 8, 9]
];

$matrixNxn = new MatrixNxn($matrix);
echo "Selisih diagonal: " . $matrixNxn->getSelisihMatrix() . "\n";
?>