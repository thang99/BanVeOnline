<?php
    class Admintaikhoan extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/taikhoan", [
                'listctq' => $datactq,
            ]);
        }

        public function Sua($idtaikhoan) {
            $this->UserModel = $this->model("UserModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $listquyen = $this->UserModel->getQuyen();
            $gettk = $this->UserModel->gettaikhoan($idtaikhoan);
            $getname = $this->UserModel->getName2($idtaikhoan);

            $a = 0;
            foreach($getname as $rows) {
                $hoten = $rows['hoten'];
                $diachi = $rows['diachi'];
                $sodienthoai = $rows['sodienthoai'];
                $ngaysinh = $rows['ngaysinh'];
            }
            foreach($gettk as $rowss) {
                $data = [
                    'username' =>  $hoten,
                    
                    'diachi' => $diachi,
                    'sodienthoai' => $sodienthoai,
                    'ngaysinh' => $ngaysinh,
                    'phanquyen' => $rowss['IDquyen'],
                    'usernameError' => '',
                    'emailError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'phanquyenError' => '',
                    'listq' => $listquyen,
                    'listctq' => $datactq,
                    'id' => $idtaikhoan,
                ];  
            }
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    
                    'diachi' => trim($_POST['diachi']),
                    'sodienthoai' => trim($_POST['sodienthoai']),
                    'ngaysinh' => trim($_POST['ngaysinh']),
                    'phanquyen' => trim($_POST['phanquyen']),
                    'usernameError' => '',
                    'emailError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'phanquyenError' => '',
                    'listq' => $listquyen,
                    'listctq' => $datactq,
                    'id' => $idtaikhoan,
                ];


                if(empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                }
                // } else if(!preg_match("/^[a-z ,.'-]+$/i", $data['username'])) {
                //     $data['usernameError'] = 'Name only contain letters and space.';
                //     $this->view('admins/suataikhoan', $data);
                //     exit();
                // }

                



                if(empty($data['diachi'])) {
                    $data['diachiError'] = 'Please enter dia chi.';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                }

                if(empty($data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'Please enter so dien thoai.';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                } else if(!preg_match("/^\d{3}[-\s]?\d{3}[-\s]?\d{4}$/", $data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'So dien thoai phai la so va co 10 so';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                }

                if(empty($data['ngaysinh'])) {
                    $data['ngaysinhError'] = 'Please enter ngay sinh.';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                }

                if(empty($data['phanquyen'])) {
                    $data['phanquyenError'] = 'Please enter phan quyen.';
                    $this->view('admins/suataikhoan', $data);
                    exit();
                } 



                $this->UserModel->Suatk($idtaikhoan, $data['username'], 
                $data['diachi'], $data['sodienthoai'], $data['ngaysinh'], $data['phanquyen']);
                

                $data1 = [
                    'username' => '',
                    'email' => '',
                    'diachi' => '',
                    'sodienthoai' => '',
                    'ngaysinh' => '',
                    'phanquyen' => '',
                    'usernameError' => '',
                    'emailError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'phanquyenError' => '',
                    'listq' => $listquyen,
                    'listctq' => $datactq,
                    'home' => '1', 
                    'id' => $idtaikhoan,
                ];

                $this->view('admins/taikhoan', [
                    'listctq' => $datactq,
                    'chuyen' => "1",
                    'sua'=> '1',
                ]);
            } else {
                $this->view('admins/suataikhoan', $data);
            }
        }
    }
?>