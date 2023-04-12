<?php
    class UserModel extends DB{

        public function InsertNewUser($hoten, $email, $password, $diachi, $sodienthoai, $ngaysinh) {
            $qr = "SELECT * FROM users";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            $count++;
            $idtaikhoan = "TK"+$count;

            $today = date("Y-m-d");
            $qrtk =   "INSERT INTO users VALUES('$idtaikhoan', 'khachhang','$email', '$password', '0', '$today')";
            $result = false;
            if( mysqli_query($this->con, $qrtk) ) {
                $result = true;
            }

            return json_encode( $result );
        }
        
        public function check($un, $pwd) {
            $qr =  "SELECT * FROM users WHERE email='$un'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            $hashedPwd = '';
            while($row = mysqli_fetch_array($rows)) {
                $hashedPwd = $row['password'];
                array_push($data, $row);
            }
            if(password_verify($pwd, $hashedPwd)) {
                return json_encode("true");
            } else {
                return json_encode('false');
            }
        }
        
        public function findUserByEmail($email) {
            $qr = "SELECT * FROM users WHERE email = '$email'";

            $rows = mysqli_query($this->con, $qr);

            if( mysqli_num_rows($rows) > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function register($hoten, $email, $password, $diachi, $sodienthoai, $ngaysinh) {
            
            $qr = "SELECT * FROM users";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            $count++;
            if($count < 10) {
                $idtaikhoan = "TK000".$count;
            } else if($count > 9 && $count < 100) {
                $idtaikhoan = "TK00".$count;
            } else if($count > 99 && $count < 1000) {
                $idtaikhoan = "TK0".$count;
            } else if($count > 999 && $count < 10000) {
                $idtaikhoan = "TK".$count;
            }
            $today = date("Y-m-d");
            $qrtk =   "INSERT INTO users VALUES('$idtaikhoan', 'Q0004', '$email', '$password', '0', '$today')";
            $result = false;
            if( mysqli_query($this->con, $qrtk) ) {
                $result = true;
            }
            


            $qr1 = "SELECT * FROM khachhang";
            $rows = mysqli_query($this->con, $qr1);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $countkh = count($data);
            $countkh++;
            if($countkh < 10) {
                $idkhachhang = "KH000".$countkh;
            } else if($countkh > 9 && $countkh < 100) {
                $idkhachhang = "KH00".$countkh;
            } else if($countkh > 99 && $countkh < 1000) {
                $idkhachhang = "KH0".$countkh;
            } else if($countkh > 999 && $countkh < 10000) {
                $idkhachhang = "KH".$countkh;
            }

            $date = DateTime::createFromFormat('d/m/Y', $ngaysinh);
            $birthday = $date->format('Y-m-d');
            $qrkh =   "INSERT INTO khachhang VALUES('$idkhachhang', '$idtaikhoan', '$hoten', '$diachi', '$sodienthoai', '$birthday')";
            mysqli_query($this->con, $qrkh);


            
            return json_encode( $result );
        }
        
        public function getName($email) {
            $qr = "SELECT kh.hoten, kh.IDkhachhang  FROM khachhang kh, users u WHERE kh.IDtaikhoan = u.IDtaikhoan AND u.email = '$email'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function getName2($idtk) {
            $qr = "SELECT nv.*  FROM nhanvien nv, users u WHERE nv.IDtaikhoan = u.IDtaikhoan AND u.IDtaikhoan = '$idtk'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        public function getName1($email) {
            $qr = "SELECT nv.hoten, nv.IDtaikhoan  FROM nhanvien nv, users u WHERE nv.IDtaikhoan = u.IDtaikhoan AND u.email = '$email'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function getList($limit, $offset) {
            $qr = "SELECT * FROM users WHERE tinhtrangtaikhoan!=2 LIMIT $limit OFFSET $offset";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }
        

        public function tongtrang() {
            $qr =  "SELECT * FROM users WHERE tinhtrangtaikhoan!=2";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            $count = count($data);

            return $count;
        }

        public function deletee($id) {
            $qr = "UPDATE users SET tinhtrangtaikhoan=2 WHERE IDtaikhoan = '$id'";
            mysqli_query($this->con, $qr);
        }
        public function updatee($id, $value) {
            $qr = "UPDATE users SET tinhtrangtaikhoan=$value WHERE IDtaikhoan = '$id'";
            mysqli_query($this->con, $qr);
        }

        public function getQuyen() {
            $qr = "SELECT * FROM quyen WHERE IDquyen != 'Q0004'";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function CreateNV($hoten, $email, $password, $diachi, $sodienthoai, $ngaysinh, $idquyen) {
            $qr = "SELECT * FROM users";
            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $count = count($data);
            $count++;
            if($count < 10) {
                $idtaikhoan = "TK000".$count;
            } else if($count > 9 && $count < 100) {
                $idtaikhoan = "TK00".$count;
            } else if($count > 99 && $count < 1000) {
                $idtaikhoan = "TK0".$count;
            } else if($count > 999 && $count < 10000) {
                $idtaikhoan = "TK".$count;
            }
            $today = date("Y-m-d");
            $qrtk =   "INSERT INTO users VALUES('$idtaikhoan', '$idquyen', '$email', '$password', '0', '$today')";
            $result = false;
            if( mysqli_query($this->con, $qrtk) ) {
                $result = true;
            }



            $qr1 = "SELECT * FROM nhanvien";
            $rows = mysqli_query($this->con, $qr1);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }
            $countnv = count($data);
            $countnv++;
            if($countnv < 10) {
                $idnhanvien = "NV000".$countnv;
            } else if($countnv > 9 && $countnv < 100) {
                $idnhanvien = "NV00".$countnv;
            } else if($countnv > 99 && $countnv < 1000) {
                $idnhanvien = "NV0".$countnv;
            } else if($countnv > 999 && $countnv < 10000) {
                $idnhanvien = "NV".$countnv;
            }

            
            $qrkh =   "INSERT INTO nhanvien VALUES('$idnhanvien', '$idtaikhoan', '$hoten', '$diachi', '$sodienthoai', '$ngaysinh')";
            mysqli_query($this->con, $qrkh);

            return json_encode($result);
        }

        public function GetMNV($idtaikhoan) {
            $qr = "SELECT IDnhanvien FROM nhanvien WHERE IDtaikhoan ='$idtaikhoan'";
            $result = mysqli_query($this->con, $qr);
            $product=mysqli_num_rows($result);
            $obj=$result -> fetch_object();
            if($product > 0) {
                return $obj->IDnhanvien;
            }
        }
        
        public function GetQuyen1($un, $pwd) {
            $qr =  "SELECT * FROM users WHERE email='$un'";
            $rows = mysqli_query($this->con, $qr);
            $hashedPwd = '';
            if(mysqli_num_rows($rows) > 0) {
                while($row = mysqli_fetch_array($rows)) {
                    $hashedPwd = $row['password'];
                }
                if(password_verify($pwd, $hashedPwd)) {
                    $qrtk = "SELECT IDquyen FROM users WHERE email='$un'";
                    $result = mysqli_query($this->con, $qrtk);
                    $product=mysqli_num_rows($result);
                    $obj=$result -> fetch_object();
                    if($product > 0) {
                        if($obj->IDquyen != 'Q0004') {
                            return json_encode('1');
                        } else {
                            return json_encode('0');
                        }
                    }
                } else {
                    return json_encode('0');
                }
            }
        }
        public function GetQuyen2($idtaikhoan) {
            $qr =  "SELECT IDquyen FROM users WHERE IDtaikhoan = '$idtaikhoan'";
            $result = mysqli_query($this->con, $qr);
            $product=mysqli_num_rows($result);
            $obj=$result -> fetch_object();
            if($product > 0) {
                return $obj->IDquyen;
            }
        }
        public function tinhtrang($un, $pwd) {
            $qr =  "SELECT * FROM users WHERE email='$un'";
            $rows = mysqli_query($this->con, $qr);
            $hashedPwd = '';
            if(mysqli_num_rows($rows) > 0) {
                while($row = mysqli_fetch_array($rows)) {
                    $hashedPwd = $row['password'];
                }
                if(password_verify($pwd, $hashedPwd)) {
                    $qrtk = "SELECT tinhtrangtaikhoan FROM users WHERE email='$un'";
                    $result = mysqli_query($this->con, $qrtk);
                    $product=mysqli_num_rows($result);
                    $obj=$result -> fetch_object();
                    if($product > 0) {
                        if($obj->tinhtrangtaikhoan < 1) {
                            return json_encode('1');
                        } else {
                            return json_encode('0');
                        }
                    }
                } else {
                    return json_encode('0');
                }
            }
        }
        public function gettaikhoan($idtk) {
            $qr = "SELECT * FROM users WHERE IDtaikhoan = '$idtk'";

            $rows = mysqli_query($this->con, $qr);
            $data = [];
            while($row = mysqli_fetch_assoc($rows)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function Suatk($idtk, $hoten, $diachi, $sodienthoai, $ngaysinh, $idquyen) {
            $qr1 = "UPDATE nhanvien SET hoten = '$hoten', diachi = '$diachi', sodienthoai = '$sodienthoai',  ngaysinh ='$ngaysinh' WHERE IDtaikhoan = '$idtk'";
            mysqli_query($this->con, $qr1);
            $qr2 = "UPDATE users SET IDquyen ='$idquyen' WHERE IDtaikhoan = '$idtk'";
            mysqli_query($this->con, $qr2);
        }
    }
?>