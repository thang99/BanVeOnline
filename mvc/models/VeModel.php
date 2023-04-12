<?php
    class VeModel extends DB{

        public function GiaVe() {
            $qr = "SELECT * FROM loaive";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ListVe() {
            $qr = "SELECT * FROM ve";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
    }
?>