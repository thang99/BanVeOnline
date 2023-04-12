<?php
    class Admintaotaikhoan extends Controller{

        function Action() {

            $this->UserModel = $this->model("UserModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $listquyen = $this->UserModel->getQuyen();
            $a = 0;
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'diachi' => '',
                'sodienthoai' => '',
                'ngaysinh' => '',
                'phanquyen' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'diachiError' => '',
                'sodienthoaiError' => '',
                'ngaysinhError' => '',
                'phanquyenError' => '',
                'listq' => $listquyen,
                'listctq' => $datactq,
            ];  
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'diachi' => trim($_POST['diachi']),
                    'sodienthoai' => trim($_POST['sodienthoai']),
                    'ngaysinh' => trim($_POST['ngaysinh']),
                    'phanquyen' => trim($_POST['phanquyen']),
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'phanquyenError' => '',
                    'listq' => $listquyen,
                    'listctq' => $datactq,
                ];


                if(empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                }
                // } else if(!preg_match("/^[a-z ,.'-]+$/i", $data['username'])) {
                //     $data['usernameError'] = 'Name only contain letters and space.';
                //     $this->view('admins/taotaikhoan', $data);
                //     exit();
                // }

                if(empty($data['email'])) {
                    $data['emailError'] = 'Please enter EMAIL.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else {
                    if($this->UserModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken.';
                        $this->view('admins/taotaikhoan', $data);
                        exit();
                    }
                }

                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else if(strlen($data['password'] < 7)) {
                    $data['passwordError'] = 'Password must be at least 8 characters.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $data['password'])) {
                    $data['passwordError'] = 'Password it nhat co 1 chu va 1 so';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                }

                if(empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please enter confirmPassword.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else {
                    if($data['password'] != $data['confirmPassword']) {
                        $data['confirmPasswordError'] = 'Password do not match, please try again.';
                        $this->view('admins/taotaikhoan', $data);
                        exit();
                    }
                }

                if(empty($data['diachi'])) {
                    $data['diachiError'] = 'Please enter dia chi.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                }

                if(empty($data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'Please enter so dien thoai.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } else if(!preg_match("/^\d{3}[-\s]?\d{3}[-\s]?\d{4}$/", $data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'So dien thoai phai la so va co 10 so';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                }

                if(empty($data['ngaysinh'])) {
                    $data['ngaysinhError'] = 'Please enter ngay sinh.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                }

                if(empty($data['phanquyen'])) {
                    $data['phanquyenError'] = 'Please enter phan quyen.';
                    $this->view('admins/taotaikhoan', $data);
                    exit();
                } 



                if(empty($data['usernameError']) && empty($data['emailError']) 
                && empty($data['passwordError']) && empty($data['confirmPasswordError'])
                && empty($data['diachiError']) && empty($data['sodienthoaiError'])
                && empty($data['ngaysinhError']) && empty($data['phanquyenError'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                }

                $this->UserModel->CreateNV( $data['username'], $data['email'], $data['password'], 
                $data['diachi'], $data['sodienthoai'], $data['ngaysinh'], $data['phanquyen']);
                

                $data1 = [
                    'username' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'diachi' => '',
                    'sodienthoai' => '',
                    'ngaysinh' => '',
                    'phanquyen' => '',
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'phanquyenError' => '',
                    'listq' => $listquyen,
                    'listctq' => $datactq,
                    'home' => '1', 
                ];

                $this->view('admins/taotaikhoan', $data1);
            } else {
                $this->view('admins/taotaikhoan', $data);
            }
        }
        
    }
?>