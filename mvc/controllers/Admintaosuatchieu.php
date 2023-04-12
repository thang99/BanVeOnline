<?php
    class Admintaosuatchieu extends Controller{

        function Action() {
            $this->PhimModel = $this->model("PhimModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $listphim = $this->PhimModel->PhimDangChieu();

            $this->SuatChieuModel = $this->model("SuatChieuModel");
            $listrap = $this->SuatChieuModel->getAllRap();
            $data = [
                'phim' => '',
                'rap' => '',
                'ngay' => '',
                'gio' => '',
                'phong' => '',
                'phimError' => '',
                'rapError' => '',
                'ngayError' => '',
                'gioError' => '',
                'phongError' => '',
                'listphong' => '',
                'listphim' => $listphim,
                'listrap' => $listrap,
                'listctq' => $datactq,
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'phim' => trim($_POST['phim']),
                    'rap' => trim($_POST['rap']),
                    'ngay' => trim($_POST['ngay']),
                    'gio' => trim($_POST['gio']),
                    'phong' => trim($_POST['phong']),
                    'phimError' => '',
                    'rapError' => '',
                    'ngayError' => '',
                    'gioError' => '',
                    'phongError' => '',
                    'listphong' => '',
                    'listphim' => $listphim,
                    'listrap' => $listrap,
                    'listctq' => $datactq,
                ];
                if(empty($data['phim'])) {
                    $data['phimError'] = 'Please enter phim phiếu.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                }

                if(empty($data['rap'])) {
                    $data['rapError'] = 'Please enter rạp chiếu.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                }

                if(empty($data['ngay'])) {
                    $data['ngayError'] = 'Please enter ngày chiếu.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                }

                if(empty($data['gio'])) {
                    $data['gioError'] = 'Please enter giờ bắt đầu.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                } else if(!preg_match("/^([0-9]|[0-1]\d|2[0-3]):([0-5]\d):([0-5]\d)$/", $data['gio'])) {
                    $data['gioError'] = 'Vui lòng chọn giờ đúng định dạng 0:00:00 hoặc 00:00:00.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                }

                // if(empty($data['phimError']) && empty($data['rapError']) && empty($data['ngayError']) && empty($data['gioError'])) {
                //     $listphong = $this->SuatChieuModel->Getphongtrong($data['rap'], $data['ngay'], $data['gio']);
                //     $data1 = [
                //         'phim' => trim($_POST['phim']),
                //         'rap' => trim($_POST['rap']),
                //         'ngay' => trim($_POST['ngay']),
                //         'gio' => trim($_POST['gio']),
                //         'phong' => trim($_POST['phong']),
                //         'phimError' => '',
                //         'rapError' => '',
                //         'ngayError' => '',
                //         'gioError' => '',
                //         'phongError' => '',
                //         'listphong' => $listphong,
                //         'listphim' => $listphim,
                //         'listrap' => $listrap,
                //     ];
                //     $this->view('admins/taosuatchieu', $data1);
                //     exit();
                // }
                if(empty($data['phong'])) {
                    $data['phongError'] = 'Please enter phòng.';
                    $this->view('admins/taosuatchieu', $data);
                    exit();
                }

                $this->SuatChieuModel->CreateSC($data['phim'], $data['rap'], $data['ngay'], $data['gio'], $data['phong']);
                $data = [
                    'phim' => '',
                    'rap' => '',
                    'ngay' => '',
                    'gio' => '',
                    'phong' => '',
                    'phimError' => '',
                    'rapError' => '',
                    'ngayError' => '',
                    'gioError' => '',
                    'phongError' => '',
                    'listphong' => '',
                    'listphim' => $listphim,
                    'listrap' => $listrap,
                    'listctq' => $datactq,
                    'home' => 1,
                ];
                $this->view("admins/taosuatchieu", $data);
            } else {
                $this->view('admins/taosuatchieu', $data);
            }
        }
    }
?>