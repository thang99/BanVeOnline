<?php
    class Admintaoquyen extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $listquyen = $this->QuyenModel->getCTQ();
            $data = [
                'tenquyen' => '',
                'quyen' => '',
                'quyenError' => '',
                'tenquyenError' => '',
                'listctq1' => $listquyen,
                'listctq' => $datactq,
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['quyen'])) {
                    $data = [
                        'tenquyen' => trim($_POST['tenquyen']),
                        'quyen' => $_POST['quyen'],
                        'quyenError' => '',
                        'tenquyenError' => '',
                        'listctq1' => $listquyen,
                        'listctq' => $datactq,
                    ];
                } else {
                    $data = [
                        'tenquyen' => trim($_POST['tenquyen']),
                        'quyen' => '',
                        'quyenError' => '',
                        'tenquyenError' => '',
                        'listctq1' => $listquyen,
                        'listctq' => $datactq,
                    ];
                }

                if(empty($data['tenquyen'])) {
                    $data['tenquyenError'] = 'Please enter tên quyền.';
                    $this->view('admins/taoquyen', $data);
                    exit();
                }else {
                    if($this->QuyenModel->findByten($data['tenquyen'])) {
                        $data['tenquyenError'] = 'Tên quyền đã tồn tại!!!';
                        $this->view('admins/taoquyen', $data);
                        exit();
                    }
                }
                $this->QuyenModel->Themquyen($data['tenquyen'], json_encode($data['quyen']));
                $data = [
                    'tenquyen' => '',
                    'quyen' => '',
                    'quyenError' => '',
                    'tenquyenError' => '',
                    'listctq1' => $listquyen,
                    'listctq' => $datactq,
                    'home' => '1'
                ];
                
                $this->view('admins/taoquyen', $data);
            } else {
                $this->view('admins/taoquyen', $data);
            }
        }
    }
?>