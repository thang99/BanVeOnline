<?php
    class PhimModel extends DB{
        public function ShowNoiDung($id) {
            $qr = "SELECT * FROM phim WHERE IDphim = '$id'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            return $data;
        }
        public function ListPhimquery1($limit, $offset ,$query) {
            $qr = "SELECT * FROM phim p, chitiettheloai ct WHERE p.tinhtrang != 'xoa' AND ct.IDphim = p.IDphim AND ct.IDtheloai = '$query' ORDER BY p.IDphim ASC LIMIT $limit OFFSET $offset";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function ListPhimquery($limit, $offset ,$query) {
            $qr = "SELECT * FROM phim WHERE tinhtrang != 'xoa' AND tenphim LIKE '%".str_replace(" ", "%", $query)."%' ORDER BY IDphim ASC LIMIT $limit OFFSET $offset";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function ListPhim($limit, $offset) {
            $qr = "SELECT * FROM phim WHERE tinhtrang != 'xoa' LIMIT $limit OFFSET $offset";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function tongtrangquery1($query) {
            $qr =  "SELECT * FROM phim p, chitiettheloai ct WHERE p.tinhtrang != 'xoa' AND ct.IDphim = p.IDphim AND ct.IDtheloai = '$query' ORDER BY p.IDphim ASC";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function tongtrangquery($query) {
            $qr =  "SELECT * FROM phim WHERE tinhtrang != 'xoa' AND tenphim LIKE '%".str_replace(" ", "%", $query)."%' ORDER BY IDphim ASC";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function tongtrang() {
            $qr =  "SELECT * FROM phim WHERE tinhtrang != 'xoa'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }

        public function ListPhim1() {
            $qr = "SELECT * FROM phim LIMIT 8 OFFSET 0";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function PhimDangChieu() {
            $qr = "SELECT * FROM phim WHERE tinhtrang = 'dang'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function PhimSapChieu() {
            $qr = "SELECT * FROM phim WHERE tinhtrang = 'sap'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getListp() {
            $qr = "SELECT * FROM phim";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function deletee($id) {
            $qr = "UPDATE phim SET tinhtrang='xoa' WHERE IDphim = '$id'";
            mysqli_query($this->con, $qr);
        }
        public function updatee($id, $value) {
            $temp = '';
            if($value == 0) {
                $temp = 'dang';
            } else if($value == 1) {
                $temp = 'sap';
            } else {
                $temp = 'het';
            }
            $qr = "UPDATE phim SET tinhtrang='$temp' WHERE IDphim = '$id'";
            mysqli_query($this->con, $qr);
        }
        public function getTheLoai($id) {
            $qr = "SELECT tentheloai FROM theloaiphim tlp, chitiettheloai cttl WHERE cttl.IDphim = '$id' AND tlp.IDtheloai = cttl.IDtheloai";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function kiemtra($id) {
            $today = date("Y-m-d");
            
            $qr = "SELECT * FROM suatchieu WHERE ngaychieu >= '$today' AND IDphim = '$id'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);

            return $count;
        }
        public function listtloai() {
            $qr = "SELECT * FROM theloaiphim ";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function listtloai1($idphim) {
            $qr = "SELECT * FROM theloaiphim WHERE theloaiphim.IDtheloai NOT IN (SELECT chitiettheloai.IDtheloai FROM chitiettheloai WHERE chitiettheloai.IDphim = '$idphim')";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function Themphim($tenphim, $noidung, $thoiluong, $ngaycongchieu, $daodien, $dienvien, $dinhdangphim, $gioihantuoi, $hinh, $theloai) {
            $qr = "SELECT * FROM phim";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            $count++;
            if($count < 10) {
                $idphim = "P000".$count;
            } else if($count > 9 && $count < 100) {
                $idphim = "P00".$count;
            } else if($count > 99 && $count < 1000) {
                $idphim = "P0".$count;
            } else if($count > 999 && $count < 10000) {
                $idphim = "P".$count;
            }

            if($dinhdangphim == 1) {
                $ddp = "2D";
            } else {
                $ddp = "3D";
            }
            if($gioihantuoi == 1) {
                $ght = "13";
            } else if($gioihantuoi == 2) {
                $ght = "16";
            } else {
                $ght = "18";
            }

            
            $qr1 = "INSERT INTO phim VALUES('$idphim', '$tenphim', '$noidung', '$thoiluong', '$ngaycongchieu', '$daodien', '$dienvien', '$ddp', '$ght', 'sap', '$hinh')";
            mysqli_query($this->con, $qr1);

            $arr = json_decode($theloai);
            for($i = 0; $i < count($arr); $i++) {
                $arr1 = $arr[$i];
                $qr2 = "INSERT INTO chitiettheloai VALUES('$idphim', '$arr1')";
                mysqli_query($this->con, $qr2);
            }
            
        }

        public function findtenphim($tenphim) {
            $qr = "SELECT * FROM phim WHERE tenphim = '$tenphim'";

            $rows = mysqli_query($this->con, $qr);

            if( mysqli_num_rows($rows) > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function getPhim($idphim) {
            $qr = "SELECT * FROM phim WHERE IDphim = '$idphim'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function getTheloai1($idphim) {
            $qr = "SELECT * FROM chitiettheloai ct, theloaiphim tl WHERE IDphim = '$idphim' AND ct.IDtheloai = tl.IDtheloai";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function updatephim($idphim, $tenphim, $noidung, $thoiluong, $ngaycongchieu, $daodien, $dienvien, $dinhdangphim, $gioihantuoi, $hinh, $theloai) {
            
            if($dinhdangphim == 1) {
                $ddp = "2D";
            } else {
                $ddp = "3D";
            }
            if($gioihantuoi == 1) {
                $ght = "13";
            } else if($gioihantuoi == 2) {
                $ght = "16";
            } else {
                $ght = "18";
            }
            
            $qr1 = "UPDATE phim SET tenphim = '$tenphim', noidung = '$noidung', thoiluong = '$thoiluong', ngaycongchieu='$ngaycongchieu', daodien = '$daodien', dienvien = '$dienvien', dinhdangphim='$ddp', gioihantuoi='$ght', tinhtrang='sap', hinhphim ='$hinh' WHERE IDphim = '$idphim'";
            mysqli_query($this->con, $qr1);
            $arr = json_decode($theloai);
            $qr2 = "DELETE FROM chitiettheloai WHERE IDphim = '$idphim'";
            mysqli_query($this->con, $qr2);
            for($i = 0; $i < count($arr); $i++) {
                $arr1 = $arr[$i];
                $qr3 = "INSERT INTO chitiettheloai VALUES('$idphim', '$arr1')";
                mysqli_query($this->con, $qr3);
            }
            
        }
        public function listt($limit, $offset, $query) {
            $qr="SELECT * FROM phim WHERE tenphim LIKE  '%".$query."%'  ORDER BY IDphim ASC LIMIT $limit OFFSET $offset ";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getAllTl() {
            $qr="SELECT * FROM theloaiphim ";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
    }
?>