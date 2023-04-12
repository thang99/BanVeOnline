<?php
    class phim extends Controller{

        function Action() {
            $this->view("noidung", [

            ]);
        }

        public function Noidung($id) {
            $this->PhimModel = $this->model('PhimModel');
            $data = [
                'hinhphim' => '',
                'tenphim' => '',
                'gioihantuoi' => '',
                'thoiluong' => '',
                'dienvien' => '',
                'daodien' => '',
                'ngaycongchieu' => '',
                'noidung' => '',
                'tinhtrang' =>'',
            ];

            $DataModels = $this->PhimModel->ShowNoiDung($id);

            foreach($DataModels as $DataModel) {
                $data = [
                    'hinhphim' => $DataModel['hinhphim'],
                    'tenphim' => $DataModel['tenphim'],
                    'gioihantuoi' => $DataModel['gioihantuoi'],
                    'thoiluong' => $DataModel['thoiluong'],
                    'dienvien' => $DataModel['dienvien'],
                    'daodien' => $DataModel['daodien'],
                    'ngaycongchieu' => $DataModel['ngaycongchieu'],
                    'noidung' => $DataModel['noidung'],
                    'tinhtrang' =>$DataModel['tinhtrang'],
                ];
            }

            $this->view("noidung", $data);

        }

        public function Show() {
            $this->PhimModel = $this->model('PhimModel');
            $gettl = $this->PhimModel->getAllTl();
            $this->view("theloaiphim", [
                'tl' => $gettl,
            ]);
        }

    }
?>