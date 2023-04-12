<?php
    class SuatChieuModel extends DB{
        
        public function ShowRap($film) {
            $qr = "SELECT DISTINCT tenrapchieu, sc.IDrapchieu FROM suatchieu sc, rapchieu rc WHERE 
                    sc.IDrapchieu = rc.IDrapchieu AND sc.IDphim = '$film'";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ShowSuatChieu($film, $rap) {
            $qr = "SELECT * FROM suatchieu WHERE IDphim = '$film' AND IDrapchieu = '$rap' ORDER BY giobatdau ASC";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ShowDateSuatChieu($film, $rap) {
            $qr = "SELECT DISTINCT ngaychieu FROM suatchieu WHERE IDphim = '$film' AND IDrapchieu = '$rap' ORDER BY ngaychieu ASC";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function ShowTheoID($id) {
            $qr = "SELECT DISTINCT * FROM suatchieu sc, phim p, rapchieu rc, phongchieu pc 
                    WHERE sc.IDsuatchieu = '$id' AND sc.IDphim = p.IDphim 
                    AND sc.IDrapchieu = rc.IDrapchieu AND sc.IDphongchieu = pc.IDphongchieu";
            
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        
        public function ShowLoaiPhim($id) {
            $qr = "SELECT p.dinhdangphim, sc.ngaychieu, sc.giobatdau FROM suatchieu sc, phim p
                    WHERE sc.IDsuatchieu = '$id' AND sc.IDphim = p.IDphim";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function Listsc() {
            $qr = "SELECT * FROM suatchieu";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function tongtrang() {
            $qr = "SELECT * FROM suatchieu";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function Listsuatchieu($limit, $offset) {
            $qr = "SELECT * FROM suatchieu LIMIT $limit OFFSET $offset";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function deletee($id) {
            $qr = "UPDATE phim SET tinhtrang='het' WHERE IDphim = '$id'";
            mysqli_query($this->con, $qr);
        }

        public function getCTSC($idsuatchieu) {
            $qr = "SELECT * FROM suatchieu WHERE IDsuatchieu = '$idsuatchieu'";

            $rows = mysqli_query($this->con, $qr);

            if( mysqli_num_rows($rows) > 0) {
                $data = [];
                while($row = mysqli_fetch_array($rows)) {
                    array_push($data, $row);
                }
                return $data;
            } else {
                return false;
            }
        }
        public function getTenphim($idphim) {
            $qr = "SELECT tenphim FROM phim WHERE IDphim = '$idphim'";

            $result = mysqli_query($this->con, $qr);
            
            $product=mysqli_num_rows($result);

            $obj=$result -> fetch_object();

            if($product > 0) {
                return $obj->tenphim;
            }
        }
        public function getTenrap($idrap) {
            $qr = "SELECT tenrapchieu FROM rapchieu WHERE IDrapchieu = '$idrap'";

            $result = mysqli_query($this->con, $qr);
            
            $product=mysqli_num_rows($result);

            $obj=$result -> fetch_object();

            if($product > 0) {
                return $obj->tenrapchieu;
            }
        }
        public function getTenphong($idphong) {
            $qr = "SELECT tenphongchieu FROM phongchieu WHERE IDphongchieu = '$idphong'";

            $result = mysqli_query($this->con, $qr);
            
            $product=mysqli_num_rows($result);

            $obj=$result -> fetch_object();

            if($product > 0) {
                return $obj->tenphongchieu;
            }
        }

        public function getAllRap() {
            $qr = "SELECT * FROM rapchieu";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function Getphongtrong($phim, $idrap, $ngay, $gio) {
            $qrkt = "SELECT thoiluong FROM phim WHERE IDphim = '$phim'";
            $result = mysqli_query($this->con, $qrkt);
            $product=mysqli_num_rows($result);
            $obj=$result -> fetch_object();
            $timee = $obj->thoiluong + 30;
            date_default_timezone_set('Asia/Ho_Chi_Minh'); 
            $giokt = date('H:i:s',strtotime('+0 hour +'.$timee.' minutes',strtotime($gio)));


            $qrsc = "SELECT * FROM suatchieu WHERE IDrapchieu = '$idrap' AND ngaychieu = '$ngay'";
            $rowssc = mysqli_query($this->con, $qrsc);
            $datasc = [];
            while($rowsc = mysqli_fetch_array($rowssc)) {
                array_push($datasc, $rowsc);
            }
            if( mysqli_num_rows($rowssc) > 0) {
                $qrsc1 = "SELECT * FROM phongchieu WHERE phongchieu.IDrapchieu = '$idrap' 
                AND phongchieu.IDphongchieu NOT IN 
                    (SELECT suatchieu.IDphongchieu 
                        FROM suatchieu 
                        WHERE suatchieu.IDrapchieu = '$idrap' AND suatchieu.ngaychieu = '$ngay' 
                        AND  ((suatchieu.giobatdau <= '$gio' AND suatchieu.gioketthuc >= '$gio') 
                        OR (suatchieu.giobatdau >= '$gio' AND suatchieu.gioketthuc <= '$giokt') 
                        OR (suatchieu.giobatdau >= '$gio' AND suatchieu.gioketthuc >= '$giokt'))
                    )";
                $rowssc1 = mysqli_query($this->con, $qrsc1);

                
                $data = [];
                while($row = mysqli_fetch_array($rowssc1)) {
                    array_push($data, $row);
                }

                return $data;
                
                
            } else {
                $qr = "SELECT IDphongchieu, tenphongchieu FROM phongchieu WHERE IDrapchieu = '$idrap'";
                $rows = mysqli_query($this->con, $qr);
                $data = [];
                while($row = mysqli_fetch_array($rows)) {
                    array_push($data, $row);
                }

                return $data;
            }
        }
        public function CreateSC($phim, $rap, $ngay, $gio, $phong) {
            $qrkt = "SELECT thoiluong FROM phim WHERE IDphim = '$phim'";
            $result = mysqli_query($this->con, $qrkt);
            $product=mysqli_num_rows($result);
            $obj=$result -> fetch_object();
            $timee = $obj->thoiluong + 30;
            date_default_timezone_set('Asia/Ho_Chi_Minh'); 
            $giokt = date('H:i:s',strtotime('+0 hour +'.$timee.' minutes',strtotime($gio)));

            $qrsc = "SELECT * FROM suatchieu";
            $rows = mysqli_query($this->con, $qrsc);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $countsc = count($data);
            $countsc++;
            if($countsc < 10) {
                $idsuatchieu = "SC000".$countsc;
            } else if($countsc > 9 && $countsc < 100) {
                $idsuatchieu = "SC00".$countsc;
            } else if($countsc > 99 && $countsc < 1000) {
                $idsuatchieu = "SC0".$countsc;
            } else if($countsc > 999 && $countsc < 10000) {
                $idsuatchieu = "SC".$countsc;
            }

            $qrtaosc = "INSERT INTO suatchieu VALUES('$idsuatchieu', '$phim', '$rap', '$phong', '$ngay', '$gio', '$giokt',0)";            
            mysqli_query($this->con, $qrtaosc);    
            // $s['a'] = $qrtaosc;
            // return $s;        

            $qrghe = "SELECT * FROM ghengoi WHERE IDphongchieu = '$phong' AND IDrapchieu = '$rap'";
            $rowsghe = mysqli_query($this->con, $qrghe);
            $dataghe = [];
            while($rowghe = mysqli_fetch_array($rowsghe)) {
                array_push($dataghe, $rowghe);
            }
            foreach($dataghe as $rowghe1) {
                $arr = $rowghe1['IDghengoi'];
                $qrtaoctghe = "INSERT INTO chitietghengoi VALUES('$idsuatchieu', '$arr', 'trong')";
                mysqli_query($this->con, $qrtaoctghe);
            }
        }

        public function Listphimchieu($limit, $offset) {
            $qr = "SELECT DISTINCT p.IDphim FROM suatchieu sc, phim p WHERE p.IDphim = sc.IDphim LIMIT $limit OFFSET $offset";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function tongtrang1() {
            $qr = "SELECT DISTINCT p.IDphim FROM suatchieu sc, phim p WHERE p.IDphim = sc.IDphim";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            return $count;
        }
        public function tongdoanhthu($idphim, $ngaybatdau, $ngayketthuc) {
            $qr = "SELECT DISTINCT v.* FROM ve v, suatchieu sc WHERE sc.IDsuatchieu = v.IDsuatchieu AND sc.IDphim = '$idphim' AND v.ngaybanve>='$ngaybatdau' AND v.ngaybanve<='$ngayketthuc'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            $tongtien = 0;
            foreach($data as $row1) {
                $tongtien = $tongtien + $row1['giave'];
            }

            return $tongtien;
        }
        public function tongve($idphim, $ngaybatdau, $ngayketthuc) {
            $qr = "SELECT DISTINCT v.* FROM ve v, suatchieu sc WHERE sc.IDsuatchieu = v.IDsuatchieu AND sc.IDphim = '$idphim' AND v.ngaybanve>='$ngaybatdau' AND v.ngaybanve<='$ngayketthuc'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            
            $count = count($data);
            return $count;
        }
        public function tongdoanhthu1($idphim) {
            $qr = "SELECT DISTINCT v.* FROM ve v, suatchieu sc WHERE sc.IDsuatchieu = v.IDsuatchieu AND sc.IDphim = '$idphim'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            $tongtien = 0;
            foreach($data as $row1) {
                $tongtien = $tongtien + $row1['giave'];
            }

            return $tongtien;
        }
        public function tongve1($idphim) {
            $qr = "SELECT sc.IDphim, giave, COUNT(v.IDsuatchieu) AS 'So luong'
            FROM ve v, suatchieu sc WHERE v.IDsuatchieu = sc.IDsuatchieu
            GROUP BY sc.IDphim;";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            
            $count = count($data);
            return $count;
        }

        public function thongkesc($ngaybd, $ngaykt, $i) {
            $qr = "SELECT p.IDphim, p.tenphim ,COUNT(v.giave) AS tong, SUM(v.giave) AS doanhthu FROM phim p,  hoadon hd, suatchieu sc, ve v 
            WHERE hd.IDhoadon = v.IDhoadon AND v.IDsuatchieu = sc.IDsuatchieu 
            AND v.ngaybanve >= '$ngaybd' AND v.ngaybanve <= '$ngaykt'
            AND  p.IDphim = sc.IDphim Group By sc.IDphim ORDER BY tong DESC LIMIT $i";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            
            return $data;
        }
        public function thongkesc1($ngaybd, $ngaykt) {
            $qr = "SELECT p.IDphim, p.tenphim ,COUNT(v.giave) AS tong, SUM(v.giave) AS doanhthu FROM phim p,  hoadon hd, suatchieu sc, ve v 
            WHERE hd.IDhoadon = v.IDhoadon AND v.IDsuatchieu = sc.IDsuatchieu 
            AND v.ngaybanve >= '$ngaybd' AND v.ngaybanve <= '$ngaykt'
            AND  p.IDphim = sc.IDphim Group By sc.IDphim";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
           
            return $data;
        }
        public function thongkesc2($i) {
            $qr = "SELECT p.IDphim, p.tenphim ,COUNT(v.giave) AS tong, SUM(v.giave) AS doanhthu FROM phim p,  hoadon hd, suatchieu sc, ve v 
            WHERE hd.IDhoadon = v.IDhoadon AND v.IDsuatchieu = sc.IDsuatchieu 
            AND  p.IDphim = sc.IDphim Group By sc.IDphim ORDER BY tong DESC LIMIT $i";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            
            return $data;
        }
        public function thongkesc3() {
            $qr = "SELECT p.IDphim, p.tenphim ,COUNT(v.giave) AS tong, SUM(v.giave) AS doanhthu FROM phim p,  hoadon hd, suatchieu sc, ve v 
            WHERE hd.IDhoadon = v.IDhoadon AND v.IDsuatchieu = sc.IDsuatchieu 
            AND  p.IDphim = sc.IDphim Group By sc.IDphim";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            
            return $data;
        }
    }
?>