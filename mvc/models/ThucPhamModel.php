<?php
    class ThucPhamModel extends DB{

        public function GiaThucPham() {
            $qr = "SELECT * FROM thucpham";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ListThucPham() {
            $qr = "SELECT * FROM thucpham";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
    }
?>