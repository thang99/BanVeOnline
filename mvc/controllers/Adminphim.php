<?php
    class Adminphim extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/phim", [
                'listctq' => $datactq,
            ]);
        }

        public function Sua($idphim) {
            $this->PhimModel = $this->model("PhimModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $datatl = $this->PhimModel->listtloai1($idphim);
            $a = 0;
            $getPhim = $this->PhimModel->getPhim($idphim);
            $getTheloai = $this->PhimModel->getTheloai1($idphim);
            foreach($getPhim as $rowww) {
                $datah = $rowww['hinhphim'];
                $data1 = [
                    'tenphim' => $rowww['tenphim'],
                    'daodien' => $rowww['daodien'],
                    'dienvien' => $rowww['dienvien'],
                    'thoiluong' => $rowww['thoiluong'],
                    'ngaycongchieu' => $rowww['ngaycongchieu'],
                    'noidungphim' => $rowww['noidung'],
                    'dinhdangphim' => $rowww['dinhdangphim'],
                    'gioihantuoi' => $rowww['gioihantuoi'],
                    'theloai' => '',
                    'tenphimError' => '',
                    'daodienError' => '',
                    'dienvienError' => '',
                    'thoiluongError' => '',
                    'ngaycongchieuError' => '',
                    'noidungphimError' => '',
                    'dinhdangphimError' => '',
                    'gioihantuoiError' => '',
                    'theloaiError' => '',
                    'hinhphimError' => '',
                    'listtl' => $datatl,
                    'listctq' => $datactq,
                    'id' => $idphim,
                    'theloai1' => $getTheloai,
                    'hinhphim' => $rowww['hinhphim']
                ]; 
            } 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['theloai'])) {
                    $data = [
                        'tenphim' => trim($_POST['tenphim']),
                        'daodien' => trim($_POST['daodien']),
                        'dienvien' => trim($_POST['dienvien']),
                        'thoiluong' => trim($_POST['thoiluong']),
                        'ngaycongchieu' => trim($_POST['ngaycongchieu']),
                        'noidungphim' => trim($_POST['noidungphim']),
                        'dinhdangphim' => trim($_POST['dinhdangphim']),
                        'gioihantuoi' => trim($_POST['gioihantuoi']),
                        'theloai' => $_POST['theloai'],
                        'tenphimError' => '',
                        'daodienError' => '',
                        'dienvienError' => '',
                        'thoiluongError' => '',
                        'ngaycongchieuError' => '',
                        'noidungphimError' => '',
                        'dinhdangphimError' => '',
                        'gioihantuoiError' => '',
                        'theloaiError' => '',
                        'hinhphimError' => '',
                        'listtl' => $datatl,
                        'listctq' => $datactq,
                        'id' => $idphim,
                        'theloai1' => $getTheloai,
                        'hinhphim' => $datah,
                    ];
                } else {
                    $data = [
                        'tenphim' => trim($_POST['tenphim']),
                        'daodien' => trim($_POST['daodien']),
                        'dienvien' => trim($_POST['dienvien']),
                        'thoiluong' => trim($_POST['thoiluong']),
                        'ngaycongchieu' => trim($_POST['ngaycongchieu']),
                        'noidungphim' => trim($_POST['noidungphim']),
                        'dinhdangphim' => trim($_POST['dinhdangphim']),
                        'gioihantuoi' => trim($_POST['gioihantuoi']),
                        'theloai' => '',
                        'tenphimError' => '',
                        'daodienError' => '',
                        'dienvienError' => '',
                        'thoiluongError' => '',
                        'ngaycongchieuError' => '',
                        'noidungphimError' => '',
                        'dinhdangphimError' => '',
                        'gioihantuoiError' => '',
                        'theloaiError' => '',
                        'hinhphimError' => '',
                        'listtl' => $datatl,
                        'listctq' => $datactq,
                        'id' => $idphim,
                        'theloai1' => $getTheloai,
                        'hinhphim' => $datah,
                    ];
                }

               

                
                
                if(empty($data['tenphim'])) {
                    $data['tenphimError'] = 'Please enter tên phim.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 
                if(empty($data['daodien'])) {
                    $data['daodienError'] = 'Please enter đạo diễn.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                if(empty($data['dienvien'])) {
                    $data['dienvienError'] = 'Please enter diễn viên.';
                    $this->view('admins/suaphim', $data);
                    exit();
                }

                if(empty($data['thoiluong'])) {
                    $data['thoiluongError'] = 'Please enter thời lượng.';
                    $this->view('admins/suaphim', $data);
                    exit();
                }else if(!preg_match("/^[0-9]+$/", $data['thoiluong'])) {
                    $data['thoiluongError'] = 'Thời lượng phim phải là số và là phút(example:120)';
                    $this->view('admins/suaphim', $data);
                    exit();
                }

                if(empty($data['ngaycongchieu'])) {
                    $data['ngaycongchieuError'] = 'Please enter ngày công chiếu.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                if(empty($data['noidungphim'])) {
                    $data['noidungphimError'] = 'Please enter nội dung phim.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                if(empty($data['dinhdangphim'])) {
                    $data['dinhdangphimError'] = 'Please select định dạng phim.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                if(empty($data['gioihantuoi'])) {
                    $data['gioihantuoiError'] = 'Please select giới hạn tuổi.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                if(empty($data['theloai'])) {
                    $data['theloaiError'] = 'Please select thể loại.';
                    $this->view('admins/suaphim', $data);
                    exit();
                } 

                

                if(isset($_POST['submit'])) {
                    $file = $_FILES['file'];

                    $fileName = $_FILES['file']['name'];
                    $fileTmpName = $_FILES['file']['tmp_name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileError = $_FILES['file']['error'];
                    $fileType = $_FILES['file']['type'];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

                    if(in_array($fileActualExt, $allowed)) {
                        if($fileError === 0) {
                            if($fileSize < 1000000) {
                                //$fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = './public/images/'.$fileName;
                                
                                move_uploaded_file($fileTmpName, $fileDestination);
                                
                            } else {
                                $data['hinhphimError'] = 'Tệp mà bạn tải lên quá lớn.';
                                $this->view('admins/suaphim', $data);
                                exit();
                            }
                        } else {
                            $data['hinhphimError'] = 'Đã xảy ra lỗi khi tải tệp của bạn.';
                            $this->view('admins/suaphim', $data);
                            exit();
                        }
                    } else {
                        $data['hinhphimError'] = 'Không có tệp hoặc không thể tải những tệp này.';
                        $this->view('admins/suaphim', $data);
                        exit();
                    }
                }
                $this->PhimModel->updatephim($idphim, $data['tenphim'], $data['noidungphim'], $data['thoiluong'], $data['ngaycongchieu'], 
                $data['daodien'], $data['dienvien'], 
                $data['dinhdangphim'], $data['gioihantuoi'], $fileDestination, json_encode($data['theloai']));
                


            
                
                $this->view("admins/phim", [
                    'listctq' => $datactq,
                    'chuyen' => "1",
                    'sua'=> '1',
                ]);
            } else {
                $this->view('admins/suaphim', $data1);
            }
                
        }
    }
?>