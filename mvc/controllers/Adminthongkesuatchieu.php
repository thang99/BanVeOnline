<?php
    class Adminthongkesuatchieu extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/thongkesuatchieu", [
                'listctq' => $datactq,
            ]);
        }
    }
?>