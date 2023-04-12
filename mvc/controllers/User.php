<?php
    class User extends Controller{
        
        public function Action() {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'diachi' => '',
                'sodienthoai' => '',
                'ngaysinh' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmpasswordError' => '',
                'diachiError' => '',
                'sodienthoaiError' => '',
                'ngaysinhError' => ''
            ];  
            $this->view('blocks/login', $data);
        }

        public function Khachhangdangky() {
            $this->UserModel = $this->model("UserModel");
            $a = 0;
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'diachi' => '',
                'sodienthoai' => '',
                'ngaysinh' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmpasswordError' => '',
                'diachiError' => '',
                'sodienthoaiError' => '',
                'ngaysinhError' => ''
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
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmpasswordError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => ''
                ];


                if(empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                    $this->view('blocks/login', $data);
                    exit();
                }
                // } else if(!preg_match("/^[a-z ,.'-]+$/i", $data['username'])) {
                //     $data['usernameError'] = 'Name only contain letters and space.';
                //     $this->view('blocks/login', $data);
                //     exit();
                // }

                if(empty($data['email'])) {
                    $data['emailError'] = 'Please enter EMAIL.';
                    $this->view('blocks/login', $data);
                    exit();
                } else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                    $this->view('blocks/login', $data);
                    exit();
                } else {
                    if($this->UserModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken.';
                        $this->view('blocks/login', $data);
                        exit();
                    }
                }

                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password.';
                    $this->view('blocks/login', $data);
                    exit();
                } else if(strlen($data['password'] < 7)) {
                    $data['passwordError'] = 'Password must be at least 8 characters.';
                    $this->view('blocks/login', $data);
                    exit();
                } else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $data['password'])) {
                    $data['passwordError'] = 'Password it nhat co 1 chu va 1 so';
                    $this->view('blocks/login', $data);
                    exit();
                }

                if(empty($data['confirmPassword'])) {
                    $data['confirmpasswordError'] = 'Please enter password.';
                    $this->view('blocks/login', $data);
                    exit();
                } else {
                    if($data['password'] != $data['confirmPassword']) {
                        $data['confirmpasswordError'] = 'Password do not match, please try again.';
                        $this->view('blocks/login', $data);
                        exit();
                    }
                }

                if(empty($data['diachi'])) {
                    $data['diachiError'] = 'Please enter dia chi.';
                    $this->view('blocks/login', $data);
                    exit();
                }

                if(empty($data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'Please enter so dien thoai.';
                    $this->view('blocks/login', $data);
                    exit();
                } else if(!preg_match("/^\d{3}[-\s]?\d{3}[-\s]?\d{4}$/", $data['sodienthoai'])) {
                    $data['sodienthoaiError'] = 'So dien thoai phai la so va co 10 so';
                    $this->view('blocks/login', $data);
                    exit();
                }

                if(empty($data['ngaysinh'])) {
                    $data['ngaysinhError'] = 'Please enter ngay sinh.';
                    $this->view('blocks/login', $data);
                    exit();
                } else if(!preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19\d{2}|200\d{1})))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19\d{2}|200\d{1}))))$/", $data['ngaysinh'])) {
                    $data['ngaysinhError'] = 'Please enter dd/mm/YYYY(1900->2009)';
                    $this->view('blocks/login', $data);
                    exit();
                }

                if(empty($data['usernameError']) && empty($data['emailError']) 
                && empty($data['passwordError']) && empty($data['confirmPasswordError'])
                && empty($data['diachiError']) && empty($data['sodienthoaiError'])
                && empty($data['ngaysinhError'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                }

                $this->UserModel->register( $data['username'], $data['email'], $data['password'], 
                                            $data['diachi'], $data['sodienthoai'], $data['ngaysinh'] );
                

                $data1 = [
                    'username' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'diachi' => '',
                    'sodienthoai' => '',
                    'ngaysinh' => '',
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmpasswordError' => '',
                    'diachiError' => '',
                    'sodienthoaiError' => '',
                    'ngaysinhError' => '',
                    'home' => '1', 
                    'chuyen' => '1',
                ];  
                $this->view('blocks/login', $data1);
            }
        }
        
    }
?>