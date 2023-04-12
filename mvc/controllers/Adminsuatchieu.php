<?php
    class Adminsuatchieu extends Controller{

        function Action() {
            $this->SuatChieuModel = $this->model("SuatChieuModel");
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/suatchieu", [
                'listctq' => $datactq,
            ]);
        }
    }
?>