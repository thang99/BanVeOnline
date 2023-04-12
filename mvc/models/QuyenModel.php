<?php
    class QuyenModel extends DB{

        public function getListQuyen($limit, $offset) {
            $qr = "SELECT * FROM quyen LIMIT $limit OFFSET $offset";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        

        public function tongtrangquyen() {
            $qr =  "SELECT * FROM quyen ";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }

        public function getCTQ() {
            $qr = "SELECT * FROM chucnang";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function Themquyen($tenquyen, $quyen) {
            $qr = "SELECT * FROM quyen";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            $count++;
            if($count < 10) {
                $idquyen = "Q000".$count;
            } else if($count > 9 && $count < 100) {
                $idquyen = "Q00".$count;
            } else if($count > 99 && $count < 1000) {
                $idquyen = "Q0".$count;
            } else if($count > 999 && $count < 10000) {
                $idquyen = "Q".$count;
            }

            $qr1 = "INSERT INTO quyen VALUES('$idquyen', '$tenquyen')";
            mysqli_query($this->con, $qr1);

            if(!empty(json_decode($quyen))) {
                $arr = json_decode($quyen);
                for($i = 0; $i < count($arr); $i++) {
                    $arr1 = $arr[$i];
                    $qr2 = "INSERT INTO chitietquyen VALUES('$idquyen', '$arr1')";
                    mysqli_query($this->con, $qr2);
                }
            }
        }

        public function getCTQid($idquyen) {
            $qr = "SELECT DISTINCT * FROM chitietquyen WHERE IDquyen = '$idquyen'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function findByten($ten) {
            $qr = "SELECT * FROM quyen WHERE tenquyen = '$ten'";

            $rows = mysqli_query($this->con, $qr);

            if( mysqli_num_rows($rows) > 0) {
                return true;
            } else {
                return false;
            }
        }
        public function getTencn($idchucnang) {
            $qr = "SELECT tenchucnang FROM chucnang WHERE IDchucnang = '$idchucnang'";

            $result = mysqli_query($this->con, $qr);
            
            $product=mysqli_num_rows($result);

            $obj=$result -> fetch_object();

            if($product > 0) {
                return $obj->tenchucnang;
            }
        }
        public function listquyen1($quyen) {
            $qr = "SELECT * FROM chucnang WHERE chucnang.IDchucnang NOT IN (SELECT chitietquyen.IDchucnang FROM chitietquyen WHERE chitietquyen.IDquyen = '$quyen')";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function getQuyen($quyen) {
            $qr = "SELECT * FROM quyen WHERE IDquyen = '$quyen'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function getctquyen1($quyen) {
            $qr = "SELECT * FROM chitietquyen ct, chucnang cn WHERE ct.IDquyen = '$quyen' AND ct.IDchucnang = cn.IDchucnang";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function Suaquyen($idquyen, $tenquyen, $ctquyen) {
            $qr1 = "UPDATE quyen SET tenquyen = '$tenquyen' WHERE IDquyen = '$idquyen'";
            mysqli_query($this->con, $qr1);

            if(!empty(json_decode($ctquyen))) {
                $arr = json_decode($ctquyen);
                $qr2 = "DELETE FROM chitietquyen WHERE IDquyen = '$idquyen'";
                mysqli_query($this->con, $qr2);
                for($i = 0; $i < count($arr); $i++) {
                    $arr1 = $arr[$i];
                    $qr3 = "INSERT INTO chitietquyen VALUES('$idquyen', '$arr1')";
                    mysqli_query($this->con, $qr3);
                }
            }
        }
    }
?>