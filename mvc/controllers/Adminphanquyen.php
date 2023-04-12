<?php
    class Adminphanquyen extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/phanquyen", [
                'listctq' => $datactq,
            ]);
        }
        public function Sua($idquyen) {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $datalistq = $this->QuyenModel->listquyen1($idquyen);
            $getQuyen = $this->QuyenModel->getQuyen($idquyen);
            $getctquyen = $this->QuyenModel->getctquyen1($idquyen);

            $listquyen = $this->QuyenModel->getCTQ();
            foreach($getQuyen as $rowq) {
                $data = [
                    'tenquyen' => $rowq['tenquyen'],
                    'quyen' => '',
                    'quyenError' => '',
                    'tenquyenError' => '',
                    'listctq1' => $listquyen,
                    'listctq' => $datactq,
                    'listq' => $datalistq,
                    'quyen1' => $getctquyen,
                    'id' => $idquyen,
                ];
            }
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
                        'listq' => $datalistq,
                        'quyen1' => $getctquyen,
                        'id' => $idquyen,
                    ];
                } else {
                    $data = [
                        'tenquyen' => trim($_POST['tenquyen']),
                        'quyen' => '',
                        'quyenError' => '',
                        'tenquyenError' => '',
                        'listctq1' => $listquyen,
                        'listctq' => $datactq,
                        'listq' => $datalistq,
                        'quyen1' => $getctquyen,
                        'id' => $idquyen,
                    ];
                }

                if(empty($data['tenquyen'])) {
                    $data['tenquyenError'] = 'Please enter tên quyền.';
                    $this->view('admins/suaquyen', $data);
                    exit();
                }
                $this->QuyenModel->Suaquyen($idquyen ,$data['tenquyen'], json_encode($data['quyen']));
                $data = [
                    'tenquyen' => '',
                    'quyen' => '',
                    'quyenError' => '',
                    'tenquyenError' => '',
                    'listctq1' => $listquyen,
                    'listctq' => $datactq,
                    'id' => $idquyen,
                    'listq' => $datalistq,
                    'quyen1' => $getctquyen,    
                    'home' => '1',
                    'chuyen' => '1',
                ];
                
                $this->view('admins/phanquyen', $data);
            } else {
                $this->view('admins/suaquyen', $data);
            }
        }
    }
?>