<?php
    class chitietve extends Controller{

        function Action() {
            $this->PhimModel = $this->model("PhimModel");
            $data = $this->PhimModel->PhimDangChieu();
            if(isset($_SESSION['IDkhachhang'])) {
                $this->HoaDonModel = $this->model("HoaDonModel");
                $datakh = $this->HoaDonModel->getTenKH($_SESSION['IDkhachhang']);
                $datakh1 = $this->HoaDonModel->getsdt($_SESSION['IDkhachhang']);
            } else {
                $datakh = "";
                $datakh = "";
            }
            if(isset($_SESSION['idsuatchieu'])) {
                $this->HoaDonModel = $this->model("HoaDonModel");
                $datasc = $this->HoaDonModel->getCTSC($_SESSION['idsuatchieu']);
                if($datasc != false) {
                    foreach($datasc as $rowsc) {
                        $datap = $this->HoaDonModel->getTenphim($rowsc['IDphim']);
                        $datap1 = $this->HoaDonModel->getTenrap($rowsc['IDrapchieu']);
                        $datap2 = $this->HoaDonModel->getTenphong($rowsc['IDphongchieu']);
                        $datap3 = $this->HoaDonModel->getngay($rowsc['ngaychieu']);
                    }
                } else {
                    $datap = "";
                    $datap1 = "";
                    $datap2 = "";
                    $datap3 = "";
                }
            } else {
                $datap = "";
                $datap1 = "";
                $datap2 = "";
                $datap3 = "";
            }
            $this->view("chitietve", [
                'datas' => $data,
                'datakh' => $datakh,
                'datakh1' => $datakh1,
                'datap' => $datap,
                'datap1' => $datap1,
                'datap2' => $datap2,
                'datap3' => $datap3,
            ]);
        }
        
    }
?>