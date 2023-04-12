<?php
    class Adminhoadon extends Controller{

        function Action() {
            $this->HoaDonModel = $this->model("HoaDonModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/hoadon", [
                'listctq' => $datactq,
            ]);
        }
    }
?>