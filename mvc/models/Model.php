<?php
    class Model extends DB{

        public function GetSV() {
            return "Duy";
        }

        public function Tong($a, $b){
            return $a + $b; 
        }

        public function SinhVien() {
            $qr = "SELECT * FROM sinhvien";
            return mysqli_query($this->con, $qr);
        }
    }
?>