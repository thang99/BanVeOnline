<?php
    class Admin extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            if(isset($_SESSION['idquyen'])) {
                $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            } else {
                $datactq = "";
            }
            $this->view("admins/admin", [
                'listctq' => $datactq,
            ]);
        }

    }
?>