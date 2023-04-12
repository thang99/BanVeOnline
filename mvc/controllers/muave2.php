<?php
    class muave2 extends Controller{

        function Action() {
            $this->view("muave2", [

            ]);
        }
        public function ShowMuaVe($idsuatchieu) {
            $this->ThucPhamModel = $this->model("ThucPhamModel");
            $this->VeModel = $this->model("VeModel");
            $this->SuatChieuModel = $this->model("SuatChieuModel");
            $this->GheModel = $this->model("GheModel");
            
            $dataphim = [
                "Loaiphim" => "",
                "ngaychieu" => "",
                "giobatdau" => ""
            ];
            $dataloaiphim = $this->SuatChieuModel->ShowLoaiPhim($idsuatchieu);
            foreach($dataloaiphim as $row) {
                $dataphim = [
                    "loaiphim" => $row['dinhdangphim'],
                    "ngaychieu" => $row['ngaychieu'],
                    "giobatdau" => $row['giobatdau']
                ];
            }
            $date = explode("-", filter_var(trim($dataphim["ngaychieu"], "-")));
            $date1 = date("l", mktime(0,0,0,$date[1],$date[2],$date[0]));

            $datave = $this->VeModel->GiaVe();

            $count = 0;
            foreach($datave as $row1) {
                if($row1['loai'] == $dataphim['giobatdau']) {
                    $count = 1;
                }
            }

            foreach($datave as $row2) {
                if($row2['loai'] == $date1 && $count != 1) {
                    $count = 2;
                }
            }
            
            if($count == 1) {
                $dataloaive = $dataphim['giobatdau'];
            } else if($count == 2) {
                $dataloaive = $date1;
            } else {
                $dataloaive = $dataphim['loaiphim'];
            }

            $datathucpham = $this->ThucPhamModel->GiaThucPham();
            $datasuatchieu = $this->SuatChieuModel->ShowTheoID($idsuatchieu);
            $sogheconlai = count($this->GheModel->ShowGheTrong($idsuatchieu));
            $this->view("muave2", [
                "datathucpham" => $datathucpham,
                "datave" => $datave,
                "dataloaive" => $dataloaive, 
                "datasuatchieu" => $datasuatchieu,
                "sogheconlai" => $sogheconlai, 
                "idsuatchieu" => $idsuatchieu,
            ]);
        }
    }
?>