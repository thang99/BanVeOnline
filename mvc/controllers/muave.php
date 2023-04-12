<?php
    class muave extends Controller{

        function Action() {
            $this->PhimModel = $this->model('PhimModel');
            $datave = $this->PhimModel->PhimDangChieu();
            $this->view("muave", [
                'datas' => $datave
            ]);
        }

    }
?>