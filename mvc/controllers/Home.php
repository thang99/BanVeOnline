<?php
    class Home extends Controller{

        function Action() {
            $this->PhimModel = $this->model("PhimModel");
            $data = $this->PhimModel->PhimDangChieu();
            $datas = $this->PhimModel->PhimSapChieu();
            $this->view("MasterLayout1", [
                'datas' => $data,
                'datass' => $datas,
            ]);
        }
        
    }
?>