<?php
    class Adminthongketheorap extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            $this->HoaDonModel = $this->model('HoaDonModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $tenrap = $this->HoaDonModel->GetAllRap();
            $this->view("admins/thongketheorap", [
                'listctq' => $datactq,
                'tenrap' => $tenrap,
            ]);
        }
    }
?>