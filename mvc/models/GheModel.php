<?php
    class GheModel extends DB{

        public function ShowGhe($idrap, $idphong, $idsuatchieu) {
            $qr = "SELECT * FROM ghengoi gn, chitietghengoi ctgn WHERE gn.IDrapchieu = '$idrap' 
                    AND gn.IDphongchieu = '$idphong' AND ctgn.IDsuatchieu = '$idsuatchieu' AND gn.IDghengoi = ctgn.IDghengoi";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ShowDayGhe($idrap, $idphong) {
            $qr = "SELECT DISTINCT dayghe FROM ghengoi WHERE IDrapchieu = '$idrap' AND IDphongchieu = '$idphong'";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        
        public function ShowGheTrong($idsuatchieu) {
            $qr = "SELECT * FROM chitietghengoi WHERE IDsuatchieu = '$idsuatchieu' AND tinhtrangghengoi ='trong'";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function SetGhe($idghe, $idsuatchieu) {
            $qr = "UPDATE chitietghengoi SET tinhtrangghengoi = 'daban' WHERE IDghengoi = '$idghe' AND IDsuatchieu = '$idsuatchieu'";
            mysqli_query($this->con, $qr);
        }
    }
?>