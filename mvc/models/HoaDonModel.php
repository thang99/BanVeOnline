<?php
    class HoaDonModel extends DB{

        public function LapHoaDon($idsuatchieu, $idkhachhang, $idloaive, $soluongve, $arrghengoi, $idthucpham, $soluongthucpham, $tongtien) {
            $arrgn = json_decode($arrghengoi);
            if(json_decode($idthucpham) != "" ) {
                $arridtp = json_decode($idthucpham);
                $arrsltp = json_decode($soluongthucpham);
            }
            $today = date("Y-m-d");
            


            $qrslhd = "SELECT * FROM hoadon";
            $rowss = mysqli_query($this->con, $qrslhd);
            $data = [];
            while($row = mysqli_fetch_array($rowss)) {
                array_push($data, $row);
            }
            $counthd = count($data);
            $counthd++;
            if($counthd < 10) {
                $idhoadon = "HD000".$counthd;
            } else if($counthd > 9 && $counthd < 100) {
                $idhoadon = "HD00".$counthd;
            } else if($counthd > 99 && $counthd < 1000) {
                $idhoadon = "HD0".$counthd;
            } else if($counthd > 999 && $counthd < 10000) {
                $idhoadon = "HD".$counthd;
            }
            $qrhoadon = "INSERT INTO hoadon VALUES('$idhoadon', '$idkhachhang', '$idsuatchieu', '$today', '$tongtien' )";
            mysqli_query($this->con, $qrhoadon);

            if(json_decode($idthucpham) != "") {
                for($i = 0; $i < count($arridtp); $i++) {
                    $arrtpid = $arridtp[$i];
                    $arrtpsl = $arrsltp[$i];
                    $qrchitiethoadon = "INSERT INTO chitiethoadon VALUES('$idhoadon', '$arrtpid', '$arrtpsl')";
                    mysqli_query($this->con, $qrchitiethoadon);
                }
            }

            $qrgiave = "SELECT giave FROM loaive WHERE IDloaive = '$idloaive'";
            $rows = mysqli_query($this->con, $qrgiave);
            $datagiave = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($datagiave, $row);
            }
            foreach($datagiave as $rowgiave) {
                $giave = $rowgiave['giave'];
            }
            

            for($i = 0; $i < count($arrgn); $i++) {
                $arr1 = $arrgn[$i];
                $qrve = "INSERT INTO ve VALUES(null, '$idloaive', '$idhoadon', '$idsuatchieu', '$idkhachhang', '$arr1', '$giave', '$today')";
                mysqli_query($this->con, $qrve);
            }
        }

        public function listhd() {
            $qr = "SELECT * FROM hoadon";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function tongtrang4($idkh) {
            $qr = "SELECT * FROM hoadon WHERE IDkhachhang = '$idkh'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function tongtrang3($ngaybt, $ngaykt, $idkh) {
            $qr = "SELECT * FROM hoadon WHERE ngaylaphoadon>='$ngaybt' AND ngaylaphoadon<='$ngaykt' AND IDkhachhang = '$idkh'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function tongtrang2($ngaybt, $ngaykt) {
            $qr = "SELECT * FROM hoadon WHERE ngaylaphoadon>='$ngaybt' AND ngaylaphoadon<='$ngaykt'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
        public function tongtrang1() {
            $qr = "SELECT * FROM hoadon";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }
       

        public function Listhoadon1($limit, $offset) {
            $qr = "SELECT * FROM hoadon LIMIT $limit OFFSET $offset";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function Listhoadon2($limit, $offset, $ngaybd, $ngaykt) {
            $qr = "SELECT * FROM hoadon WHERE ngaylaphoadon >= '$ngaybd' AND ngaylaphoadon <= '$ngaykt' LIMIT $limit OFFSET $offset ";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function Listhoadon3($limit, $offset, $ngaybd, $ngaykt, $idkh) {
            $qr = "SELECT * FROM hoadon WHERE ngaylaphoadon >= '$ngaybd' AND ngaylaphoadon <= '$ngaykt' AND IDkhachhang = '$idkh' ORDER BY ngaylaphoadon DESC LIMIT $limit OFFSET $offset ";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function Listhoadon4($limit, $offset, $idkh) {
            $qr = "SELECT * FROM hoadon WHERE IDkhachhang = '$idkh' ORDER BY ngaylaphoadon DESC LIMIT $limit OFFSET $offset ";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        
        public function getCTHD($idhoadon) {
            $qr = "SELECT * FROM chitiethoadon WHERE IDhoadon = '$idhoadon'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getCTve($idsuatchieu, $idkhachhang, $idhoadon) {
            $qr = "SELECT * FROM ve WHERE IDsuatchieu = '$idsuatchieu' AND IDkhachhang = '$idkhachhang' AND IDhoadon = '$idhoadon'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getDayGhe($idghengoi) {
            $qr = "SELECT * FROM ghengoi WHERE IDghengoi = '$idghengoi'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
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

        public function getThucPham($idthucpham) {
            $qr = "SELECT * FROM thucpham WHERE IDthucpham = '$idthucpham'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getTenKH($idkhachhang) {
            $qr = "SELECT * FROM khachhang WHERE IDkhachhang = '$idkhachhang'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
                $tenkh = $row['hoten'];
            }

            
            return $tenkh;
        }
        public function getsdt($idkhachhang) {
            $qr = "SELECT * FROM khachhang WHERE IDkhachhang = '$idkhachhang'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
                $sdt = $row['sodienthoai'];
            }

            
            return $sdt;
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
        public function getngay($ngay) {
            $qr = "SELECT ngaychieu FROM suatchieu WHERE ngaychieu = '$ngay'";

            $result = mysqli_query($this->con, $qr);
            
            $product=mysqli_num_rows($result);

            $obj=$result -> fetch_object();

            if($product > 0) {
                return $obj->ngaychieu;
            }
        }

        public function tongdoanhthu($ngaybatdau, $ngayketthuc) {
            $qr = "SELECT * FROM hoadon WHERE ngaylaphoadon>='$ngaybatdau' AND ngaylaphoadon<='$ngayketthuc'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            $tongtien = 0;
            foreach($data as $row1) {
                $tongtien = $tongtien + $row1['tongtien'];
            }

            return $tongtien;
        }
        public function tongdoanhthu1() {
            $qr = "SELECT * FROM hoadon";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }
            $tongtien = 0;
            foreach($data as $row1) {
                $tongtien = $tongtien + $row1['tongtien'];
            }

            return $tongtien;
        }

        public function GetAllRap() {
            $qr = "SELECT * FROM rapchieu";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            
            return $data;
        }

        public function thongkerap($limit, $offset, $ngaybatdau, $ngayketthuc, $tenrap) {
            $qr = "SELECT SUM(hd.tongtien) AS tong , rc.IDrapchieu, rc.tenrapchieu AS tong FROM rapchieu rc, hoadon hd, suatchieu sc 
			WHERE hd.ngaylaphoadon >= '$ngaybatdau' 
            AND rc.IDrapchieu = sc.IDrapchieu
            AND hd.ngaylaphoadon <= '$ngayketthuc' AND sc.IDrapchieu = '$tenrap' 
            AND hd.IDsuatchieu = sc.IDsuatchieu";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function thongkerap1($limit, $offset, $ngaybatdau, $ngayketthuc) {
            $qr = "SELECT SUM(hd.tongtien) AS tong , rc.IDrapchieu, rc.tenrapchieu FROM rapchieu rc, hoadon hd, suatchieu sc 
            WHERE hd.ngaylaphoadon >= '$ngaybatdau' 
            AND hd.ngaylaphoadon <= '$ngayketthuc' 
            AND hd.IDsuatchieu = sc.IDsuatchieu 
            AND rc.IDrapchieu = sc.IDrapchieu Group By rc.IDrapchieu ORDER BY `rc`.`IDrapchieu` DESC";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function thongkerap2($limit, $offset, $tenrap) {
            $qr = "SELECT SUM(hd.tongtien) AS tong, rc.IDrapchieu, rc.tenrapchieu FROM rapchieu rc, hoadon hd, suatchieu sc 
            WHERE rc.IDrapchieu = sc.IDrapchieu AND hd.IDsuatchieu = sc.IDsuatchieu AND sc.IDrapchieu = '$tenrap'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function thongkerap3($limit, $offset) {
            $qr = "SELECT SUM(hd.tongtien) AS tong, rc.IDrapchieu, rc.tenrapchieu FROM rapchieu rc, hoadon hd, suatchieu sc 
            WHERE rc.IDrapchieu = sc.IDrapchieu AND hd.IDsuatchieu = sc.IDsuatchieu GROUP BY rc.IDrapchieu ORDER BY tong DESC";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_array($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
    }
?>