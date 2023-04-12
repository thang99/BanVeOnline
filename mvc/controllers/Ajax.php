<?php
    class Ajax extends Controller{


        public function checkUsername() {
            $this->UserModel = $this->model("UserModel");;
            $un = $_POST["un"];
            echo $this->UserModel->checkUsername($un);
        }

        public function check() {
            $this->UserModel = $this->model("UserModel");
            
            if (isset($_POST['un']) && $_POST['un'] && isset($_POST['pwd']) && $_POST['pwd']) {
                $un = $_POST["un"];
                $pwd = $_POST["pwd"];
                
                $kq = $this->UserModel->check($un,$pwd);
                if(json_decode($kq) == 'true') {
                    
                    $getQuyen = $this->UserModel->GetQuyen1($un,$pwd);
                    $gettinhtrang = $this->UserModel->tinhtrang($un,$pwd);
                    if(json_decode($gettinhtrang) == '1') {
                        if(json_decode($getQuyen) == '0') {
                            $_SESSION['usersEmail'] = $un;
                            $data = $this->UserModel->getName($un);
                            foreach($data as $row) {
                                $hoten = $row['hoten'];
                                $idkh = $row['IDkhachhang'];
                            }
                            $showten = explode(" ", filter_var(trim($hoten, " ")));
                            $count = count($showten);
                            
                            $_SESSION['maquyen2'] = "KH";
                            $_SESSION['name'] = $showten[$count - 1];
                            $_SESSION['IDkhachhang'] = $idkh;
                            
                            echo "ok";
                        } else {
                            $_SESSION['usersEmail'] = $un;
                            $data = $this->UserModel->getName1($un);
                            foreach($data as $row) {
                                $hoten = $row['hoten'];
                                $idtk = $row['IDtaikhoan'];
                            }
                            $getQuyen1 = $this->UserModel->GetQuyen2($idtk);
                            $showten = explode(" ", filter_var(trim($hoten, " ")));
                            $count = count($showten);
                            $_SESSION['idquyen'] = $getQuyen1;
                            $_SESSION['name'] = $showten[$count - 1];
                            $_SESSION['maquyen2'] = "AD";
                            
                            echo "ok";
                        }
                    } else {
                        echo "khoa";
                    }
                } else {
                    echo "not ok";
                }
            }
            
        }
        public function checkname() {
            $this->UserModel = $this->model("UserModel");
               
            // echo $un;
        }
        

        public function ok() {
            $this->PhimModel = $this->model('PhimModel');
            $limit = 8 ;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            if(isset($_POST['query']) || isset($_POST['tlp'])) {
                if(!empty($_POST['query'])) {
                    $data = $this->PhimModel->ListPhimquery($limit, $offset, $_POST['query']);

                    $count_data = $this->PhimModel->tongtrangquery($_POST['query']);
                } else if(!empty($_POST['tlp'])) {
                    $data = $this->PhimModel->ListPhimquery1($limit, $offset, $_POST['tlp']);

                    $count_data = $this->PhimModel->tongtrangquery1($_POST['tlp']);
                } else if(isset($_POST['query']) && !isset($_POST['tlp'])) {
                    $data = $this->PhimModel->ListPhim($limit, $offset);

                    $count_data = $this->PhimModel->tongtrang();
                } else if(empty($_POST['tlp'])) {
                    $data = $this->PhimModel->ListPhim($limit, $offset);

                    $count_data = $this->PhimModel->tongtrang();
                }
            } else {
                $data = $this->PhimModel->ListPhim($limit, $offset);

                $count_data = $this->PhimModel->tongtrang();
            }
            $total_pages = ceil($count_data/$limit);

            $output = '';
            if($count_data > 0) {
                foreach($data as $row) {
                    $output.= "<div class='row mt-3'>";
                    $output.= "<div class='col-xl-2 col-md-4 col-sm-6 col-6' >";
                    $output.= "<a href='phim/Noidung/".$row["IDphim"]."'>";
                    $output.= "<img src='".$row['hinhphim']."' style='width:100%' alt='...'>";
                    $output.= "</a>";
                    $output.= "</div>";
                    $output.= "<div class='col-xl-6 col-md-8 col-sm-6 col-6'>";
                    $output.= "<a href='phim/Noidung/".$row["IDphim"]."'>";
                    $output.= "<h4 style='text-transform:uppercase'>".$row["tenphim"]."</h4>";
                    $output.= "</a>";
                    $h = $row["noidung"];
                    if(strlen($h) > 300){
                        $c = substr($h,0,300);
                        $output.= "<p class='textnoidung2'>".$c."...</p>";
                    } else {
                        $output.= "<p class='textnoidung'>".$row["noidung"]."</p>";
                    }
                    $output.= "</div>";
                    $output.= "</div>";
                }
            }
            $output .= '<ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if($total_pages > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            echo $output;
        }

        public function rapfilm() {
            $film = $_POST['film'];
            $this->SuatChieuModel = $this->model('SuatChieuModel'); 
            $data = $this->SuatChieuModel->ShowRap($film);
            $output = '<ul>';

            foreach($data as $row) {
                $output .= "<a href='".$row["IDrapchieu"]."' class='rap-link'>
                                <li>
                                    ".$row["tenrapchieu"]."
                                </li>
                            </a>";
            }
            $output .= '</ul>';

            echo $output;
        }
        public function suatfilm() {
            $film = $_POST['film'];
            $rap = $_POST['rap'];
            $this->SuatChieuModel = $this->model('SuatChieuModel'); 

            $data = $this->SuatChieuModel->ShowDateSuatChieu($film, $rap);

            $data1 = $this->SuatChieuModel->ShowSuatChieu($film, $rap);

            $output =       "<ul>";
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timeEng = ['Sun','Mon','Tue','Wed', 'Thu', 'Fri', 'Sat', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            $timeVie = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Một', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy', 'Tám', 'Chín', 'Mười', 'Mười Một', 'Mười Hai'];
            foreach($data as $row) {
                $today = date("Y-m-d");
                $another_date = $row["ngaychieu"];
                if(strtotime($today) <= strtotime($another_date)) {
                    $date = explode("-", filter_var(trim($row["ngaychieu"], "-")));
                    $date1 = date("D", mktime(0,0,0,$date[1],$date[2],$date[0]));
                    $date1 = str_replace( $timeEng, $timeVie, $date1);
                    $output .= "    <li>
                                        <p>
                                            ".$date1.", ".$row["ngaychieu"]."
                                        </p>
                                        <div class='row'>
                                            <div class='col-md-4 col-sm-2 col-4'>
                                                <span>2D - Phụ đề</span>
                                            </div>
                                            <div class='col-md-8 col-sm-10 col-8'>
                                                <div class='row'>";

                    foreach($data1 as $row1) {
                        if($row["ngaychieu"] == $row1["ngaychieu"]){
                            $time = date("H:i:s");
                            $another_time = $row1["giobatdau"];
                            if(strtotime($time) < strtotime($another_time)) {
                                if(isset($_SESSION['usersEmail'])) {
                                    $output .= "    <div class='col-xl-4 col-md-6 col-sm-2 col-3'>
                                                        <a href='muave2/ShowMuaVe/".$row1["IDsuatchieu"]."' id = '".$row1["IDsuatchieu"]."' class='muave2'>".$row1["giobatdau"]."</a>
                                                    </div>";
                                } else {
                                    $output .= "    <div class='col-xl-4 col-md-6 col-sm-2 col-3'>
                                                        <a href='javascript:void(0)' class='chuadangnhap1'>".$row1["giobatdau"]."</a>
                                                    </div>";
                                }
                            } else if(strtotime($today) < strtotime($another_date)) {
                                if(isset($_SESSION['usersEmail'])) {
                                    $output .= "    <div class='col-xl-4 col-md-6 col-sm-2 col-3'>
                                                        <a href='muave2/ShowMuaVe/".$row1["IDsuatchieu"]."'>".$row1["giobatdau"]."</a>
                                                    </div>";
                                } else {
                                    $output .= "    <div class='col-xl-4 col-md-6 col-sm-2 col-3'>
                                                        <a href='javascript:void(0)' class='chuadangnhap1'> ".$row1["giobatdau"]."</a>
                                                    </div>";
                                }
                            }
                        }
                    }

                    $output .= "                </div>
                                            </div>
                                        </div>
                                    </li>";
                }
            }
            $output .=      "</ul>";

            echo $output;
        }

        public function giohang() {
            $id = $_POST['page'];

            $this->ThucPhamModel = $this->model("ThucPhamModel");
            $data = $this->ThucPhamModel->ListThucPham();
            $soluong = $_POST['soluong'];
            if(isset($_POST['page'])) {
                if(isset($_SESSION['cart'])) {
                    if(isset($_SESSION['cart'][$id])) {
                        $_SESSION['cart'][$id]['soluong'] = $soluong;
                    } else {
                        $_SESSION['cart'][$id]['soluong'] = $soluong;
                    }
                }else {
                    foreach($data as $datas) {
                        $_SESSION['cart'][$datas['IDthucpham']]['soluong'] = 0;
                        $_SESSION['cart'][$datas['IDthucpham']]['tenthucpham'] = $datas['tenthucpham'];
                        $_SESSION['cart'][$datas['IDthucpham']]['hinhanh'] = $datas['hinhanh'];
                        $_SESSION['cart'][$datas['IDthucpham']]['giathucpham'] = $datas['giathucpham'];
                    }
                    $_SESSION['cart'][$id]['soluong'] = $soluong    ;
                }
            }

            echo $id;
        }
        public function giohang1() {
            $id = $_POST['page'];
            $idsuatchieu = $_POST['idsuatchieu'];
            $soluong = 0;
            $this->VeModel = $this->model("VeModel");
            $this->GheModel = $this->model("GheModel");
            $this->SuatChieuModel = $this->model("SuatChieuModel");
            
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
            $dataloaive = '';
            if($count == 1) {
                $dataloaive = $dataphim['giobatdau'];
            } else if($count == 2) {
                $dataloaive = $date1;
            } else {
                $dataloaive = $dataphim['loaiphim'];
            }



            $count1 = count($this->GheModel->ShowGheTrong($idsuatchieu));
            if($soluong > $count1) {
                $soluong = $count1;
            } else {
                $soluong = $_POST['soluong'];
            }
            if(isset($_POST['page'])) {
                if(isset($_SESSION['cartve'])) {
                    if(isset($_SESSION['cartve'][$id])) {
                        $_SESSION['cartve'][$id]['soluong'] = $soluong;
                    } else {
                        $_SESSION['cartve'][$id]['soluong'] = $soluong;
                    }
                }else {
                    foreach($datave as $row3) {
                        if($row3['loai'] == $dataloaive) {
                            $_SESSION['cartve'][$row3['IDloaive']]['giave'] = $row3['giave'];
                        }
                    }
                    $_SESSION['cartve'][$id]['soluong'] = $soluong;
                }
            }

            echo $id;
        }

        public function giohang2() {
            $idrap = $_POST['idrap'];
            $idphong = $_POST['idphong'];
            $idsuatchieu = $_POST['idsuatchieu'];
            $this->GheModel = $this->model("GheModel");
            $dataghe = $this->GheModel->ShowGhe($idrap, $idphong, $idsuatchieu);
            $datadayghe = $this->GheModel->ShowDayGhe($idrap, $idphong);
            $output="<div style='border: 1px solid black; padding: 20px; border-bottom:none; overflow:hidden'><h2>CHỌN GHẾ: <span id='ghe'></span></h2></div>";
            $output.="<div style='border: 1px solid black; padding: 20px; height:450px'>";
            foreach($datadayghe as $row) {
                $output .= "<div class='row' style='text-align:center'>
                                <div class='col-lg-2 col-md-2 col-sm-2 col-2'><div style='border:1px solid black; width:20px; text-align:center; float: right'>".$row['dayghe']."</div></div>
                                    <div class='col-lg-8 col-md-8 col-sm-8 col-8'>";
                foreach($dataghe as $row1) {
                    if($row['dayghe'] == $row1['dayghe']) {
                        if($row1['tinhtrangghengoi'] == 'trong') {
                            $output .= "    <div id='".$row1['IDghengoi']."' for='".$row1["dayghe"]."".$row1["soghe"]."' class='chonghe' style='cursor:pointer; display:inline-block; border:1px solid black; width:20px; text-align:center; background-color: #dbdee1;'>".$row1['soghe']."</div>";
                        } else if($row1['tinhtrangghengoi'] == 'daban') {
                            $output .= "    <div style='display:inline-block; border:1px solid black; width:20px; text-align:center; background-color: #e11c01;'>".$row1['soghe']."</div>";
                        } else if($row1['tinhtrangghengoi'] == 'khongthechon') {
                            $output .= "    <div style='display:inline-block; border:1px solid black; width:20px; text-align:center; background-color: #0cbfca;'>".$row1['soghe']."</div>";
                        }
                    }
                }
                $output .= "        </div>
                                <div class='col-lg-2 col-md-2 col-sm-2 col-2'><div style='border:1px solid black; width:20px; text-align:center'>".$row['dayghe']."</div></div>
                            </div>";
            }
            $output .= "    <div style='text-align:center;'>Màn hình</div>
                            <hr class='mt-3' style='width:50%; margin: auto; height:4px'>
                            <div class='mt-3' style='width:65%; margin:auto;'>
                                <div style='display:inline-block;background-color: #7dc71d; width:11px; height:11px'></div>
                                <div style='display:inline; margin-right:30px'>Ghế đang chọn</div>
                                <div style='display:inline-block;background-color: #e11c01; width:11px; height:11px'></div>
                                <div style='display:inline; margin-right:30px'>Ghế đã bán</div>
                                <div style='display:inline-block;background-color: #dbdee1; width:11px; height:11px'></div>
                                <div style='display:inline; margin-right:30px'>Có thể chọn</div>
                                <div style='display:inline-block;background-color: #0cbfca; width:11px; height:11px'></div>
                                <div style='display:inline; margin-right:30px'>Không thể chọn</div>
                            </div>
                        </div>";
            echo $output;
        }

        public function thanhtoan() {
            $arr = json_decode($_POST['data']);
            $idsuatchieu = $_POST['idsuatchieu'];
            $tongtien = $_POST['tongtien'];
            $tongtien1 = explode(",", filter_var(trim($tongtien, ",")));
            $tongtien2 = "";
            for($i = 0; $i < count($tongtien1); $i++) {
                $tongtien2 .= $tongtien1[$i];
            }
            $_SESSION['idsuatchieu']=$idsuatchieu;  
            $this->GheModel = $this->model("GheModel");
            for($i = 0; $i < count($arr); $i++) {
                $this->GheModel->SetGhe($arr[$i], $idsuatchieu);
                $_SESSION['ghe'][$arr[$i]][$idsuatchieu] = $arr[$i];
            }
            $idkhachhang = $_SESSION['IDkhachhang'];
            if(isset($_SESSION['cartve'])) { 
                foreach($_SESSION['cartve'] as $keys => $values) {
                    $idloaive = $keys;
                    $soluongve = $values['soluong'];
                }
            }
            $arrghengoi = json_encode($arr);

            $this->HoaDonModel = $this->model("HoaDonModel");
            if(isset($_SESSION['cart'])) { 
                foreach($_SESSION['cart'] as $keys => $values) {
                    $idtp[] = $keys;
                    $soluongtp[] = $values['soluong'];
                }
                $idthucpham = json_encode($idtp);
                $soluongthucpham = json_encode($soluongtp);   
            } else {
                $idthucpham = json_encode("");
                $soluongthucpham = json_encode("");   
            }
            $this->HoaDonModel->LapHoaDon($idsuatchieu, $idkhachhang, $idloaive, $soluongve, $arrghengoi, $idthucpham, $soluongthucpham, $tongtien2 );
            echo var_dump($idthucpham)." ".var_dump($soluongthucpham);
        }

        public function admintaikhoan() {
            $this->UserModel = $this->model('UserModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }

            $data = $this->UserModel->getList($limit, $offset);

            $count_data = $this->UserModel->tongtrang();

            $total_pages = ceil($count_data/$limit);

            $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID Tài Khoản</th>
                                <th scope="col">ID Quyền</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày lập tài khoản</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Chức năng</th>
                                </tr>
                            </thead>';
            if($count_data > 0) {
                foreach($data as $row) {
                    if($row['tinhtrangtaikhoan'] != 2) {
                        $output.= ' <tbody>
                                    <tr>
                                    <th scope="row">'.$row['IDtaikhoan'].'</th>
                                    <td>'.$row['IDquyen'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['ngaytaotaikhoan'].'</td>
                                    <td>
                                        
                                            <select name="'.$row['IDtaikhoan'].'" id="tinhtrangtaikhoan">';
                        if($row['tinhtrangtaikhoan'] == 0) {
                            $output .= '            <option selected value="0" >Không khóa</option>
                                                    <option value="1">Khóa</option>';
                        }
                        if($row['tinhtrangtaikhoan'] == 1) {
                            $output .= '            <option value="0" >Không khóa</option>
                                                    <option selected value="1">Khóa</option>';
                        }
                                            
                                            
                        $output.= '          </select>
                                        
                                        </td>
                                        <td>';
                        if($row['IDquyen'] != 'Q0004') { 
                        $output.= '     <a href="Admintaikhoan/Sua/'.$row['IDtaikhoan'].'" id="'.$row['IDtaikhoan'].'"><i class="fa fa-wrench" aria-hidden="true"></i></a>';
                        }                
                        $output.= '     <a href="javascript:void(0)" id="'.$row['IDtaikhoan'].'" class="xoaa"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                        </tr>
                                    </tbody>';
                    }
                }
            }
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            echo $output;
        }

        public function xoa() {
            $id = $_POST['id'];
            $this->UserModel = $this->model("UserModel");
            $this->UserModel->deletee($id);

            echo $id;
        }
        public function set() {
            $id = $_POST['id'];
            $value = $_POST['value'];
            $this->UserModel = $this->model("UserModel");
            $this->UserModel->updatee($id, $value);

            echo $id;
        }

        public function adminphim() {
            $this->PhimModel = $this->model('PhimModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            
            $data = $this->PhimModel->ListPhim($limit, $offset);

            $count_data = $this->PhimModel->tongtrang();

            $total_pages = ceil($count_data/$limit);

            $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID Phim</th>
                                <th scope="col">Hình phim</th>
                                <th scope="col">Tên phim</th>
                                <th scope="col">Thời lượng</th>
                                <th scope="col">Ngày công chiếu</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Xem chi tiết</th>
                                <th scope="col">Chức năng</th>
                                </tr>
                            </thead>';
            if($count_data > 0) {
                foreach($data as $row) {
                    if($row['tinhtrang'] != 'xoa') {
                        $output .= '<tbody>
                                    <tr>
                                    <th scope="row">'.$row['IDphim'].'</th>
                                    <td><img src="'.$row['hinhphim'].'" class="" style="width:75px" alt=""></td>
                                    <td>'.$row['tenphim'].'</td>
                                    <td>'.$row['thoiluong'].' phút</td>
                                    <td>'.$row['ngaycongchieu'].'</td>
                                    <td>
                                                <select name="'.$row['IDphim'].'" id="tinhtrangphim">';
                        if($row['tinhtrang'] == 'dang') {
                            $output .= '            <option selected value="0" >Đang chiếu</option>
                                                    <option value="1">Sắp chiếu</option>
                                                    <option value="2">Hết chiếu</option>';
                        }
                        if($row['tinhtrang'] == 'sap') {
                            $output .= '            <option value="0" >Đang chiếu</option>
                                                    <option selected value="1">Sắp chiếu</option>
                                                    <option value="2">Hết chiếu</option>';
                        }
                        if($row['tinhtrang'] == 'het') {
                            $output .= '            <option value="0" >Đang chiếu</option>
                                                    <option value="1">Sắp chiếu</option>
                                                    <option selected value="2">Hết chiếu</option>';
                        }
                                            
                                            
                        $output.= '             </select>
                                    </td>
                                    <td>
                                        <a id="detail" href="javascript:void(0)" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                                        data-hinhphim = "'.$row['hinhphim'].'"
                                        data-idphim = "'.$row['IDphim'].'"
                                        data-tenphim = "'.$row['tenphim'].'"
                                        data-idtheloai = "';
                        $datatheloai = $this->PhimModel->getTheLoai($row['IDphim']);    
                        foreach($datatheloai as $tentl) {
                            $output.=''.$tentl['tentheloai'].','.' ';
                        } 
                        $output.='      "
                                        data-noidung       = "'.$row['noidung'].'"
                                        data-thoiluong     = "'.$row['thoiluong'].' phút"
                                        data-ngaycongchieu = "'.$row['ngaycongchieu'].'"
                                        data-daodien       = "'.$row['daodien'].'"
                                        data-dienvien      = "'.$row['dienvien'].'"
                                        data-dinhdangphim  = "'.$row['dinhdangphim'].'"
                                        data-gioihantuoi   = "C'.$row['gioihantuoi'].'"
                                        ><i class="fa fa-eye" aria-hidden="true"></i>Details
                                        </a>
                                    </td> 
                                    <td>
                                        <a href="javascript:void(0)" id="'.$row['IDphim'].'" class="suaphim"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" id="'.$row['IDphim'].'" class="xoaphim"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>
                                </tbody>';
                    }
                }
            }
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            echo $output;
        }

        public function xoaphim() {
            $id = $_POST['id'];
            $this->PhimModel = $this->model("PhimModel");
            $this->PhimModel->deletee($id);

            echo $id;
        }
        public function setphim() {
            $id = $_POST['id'];
            $value = $_POST['value'];
            $this->PhimModel = $this->model("PhimModel");
            $this->PhimModel->updatee($id, $value);

            echo $id;
        }
        public function checkphim() {
            $id = $_POST['id'];
            $value = $_POST['value'];
            $this->PhimModel = $this->model("PhimModel");
            $count = $this->PhimModel->kiemtra($id);

            echo $count;
        }
        public function checkphim1() {
            $id = $_POST['id'];
            $this->PhimModel = $this->model("PhimModel");
            $count = $this->PhimModel->kiemtra($id);

            echo $count;
        }
        public function checkphim2() {
            $id = $_POST['id'];
            $this->PhimModel = $this->model("PhimModel");
            $count = $this->PhimModel->kiemtra($id);

            echo $count;
        }
        
        public function adminhd() {
            $this->HoaDonModel = $this->model('HoaDonModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            if(isset($_POST['date1']) && isset($_POST['date2'])) {
                $ngaybatdau = $_POST['date1'];
                $ngayketthuc = $_POST['date2'];
                $data = $this->HoaDonModel->Listhoadon2($limit, $offset, $ngaybatdau, $ngayketthuc);

                $count_data = $this->HoaDonModel->tongtrang2($ngaybatdau, $ngayketthuc);
                $tongdoanhthu = $this->HoaDonModel->tongdoanhthu($ngaybatdau, $ngayketthuc);
            } else {
                $data = $this->HoaDonModel->Listhoadon1($limit, $offset);

                $count_data = $this->HoaDonModel->tongtrang1();
                $tongdoanhthu = $this->HoaDonModel->tongdoanhthu1();
            }
            

            $total_pages = ceil($count_data/$limit);
            $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID Hóa Đơn</th>
                                <th scope="col">ID Khách Hàng</th>
                                <th scope="col">ID Suất Chiếu</th>
                                <th scope="col">Ngày lập hóa đơn</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Xem chi tiết</th>
                                </tr>
                            </thead>';
            if($count_data > 0) {
                foreach($data as $row) {
                    $output.= '<tbody>
                                    <tr>
                                    <th scope="row">'.$row['IDhoadon'].'</th>
                                    <td>'.$row['IDkhachhang'].'</td>
                                    <td>'.$row['IDsuatchieu'].'</td>
                                    <td>'.$row['ngaylaphoadon'].'</td>
                                    <td>'.number_format($row['tongtien']).'</td>
                                    <td>
                                    <a id="detailhd" href="javascript:void(0)" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detailhd"
                                    data-idhoadon      = "'.$row['IDhoadon'].'"';
                    $datakh = $this->HoaDonModel->getTenKH($row['IDkhachhang']);
                                    $output.='data-tenkh = "'.$datakh.'"';
                    $datacthd = $this->HoaDonModel->getCTHD($row['IDhoadon']);
                                    $output .= 'data-thucpham = "';
                    if($datacthd != false) {
                        foreach($datacthd as $rowcthd) {
                            $datathucpham = $this->HoaDonModel->getThucPham($rowcthd['IDthucpham']);
                            $slthucpham = $rowcthd['soluongthucpham'];
                            foreach($datathucpham as $rowtentp) {
                                    $output .= ''.$rowtentp['tenthucpham'].''.'('.$slthucpham.')'.' '.number_format($slthucpham*$rowtentp['giathucpham']).''.'VNĐ,'.' ';
                            }
                            
                        }
                    }
                                    $output.='"';
                                    $output .= 'data-ghe = "';
                    $datactve = $this->HoaDonModel->getCTve($row['IDsuatchieu'], $row['IDkhachhang'], $row['IDhoadon']);
                    foreach($datactve as $rowghe) {
                        $datactghe = $this->HoaDonModel->getDayGhe($rowghe['IDghengoi']);
                        foreach($datactghe as $rowctghe) {
                                    $output .= 'Ghế:'.$rowctghe['dayghe'].''.''.$rowctghe['soghe'].''.' '.''.number_format($rowghe['giave']).''.'VNĐ,'.' ';
                        }
                    }
                                    $output.='"';
                    $datactsc = $this->HoaDonModel->getCTSC($row['IDsuatchieu']);

                    foreach($datactsc as $rowsc) {
                        $idphim = $rowsc['IDphim'];
                        $tenphim = $this->HoaDonModel->getTenphim($idphim);
                                    $output .= 'data-tenphim = "'.$tenphim.'"';
                        $idrap = $rowsc['IDrapchieu'];
                        $tenrap = $this->HoaDonModel->getTenrap($idrap);
                                    $output .= 'data-tenrap = "'.$tenrap.'"';
                        $idphong = $rowsc['IDphongchieu'];
                        $tenphong = $this->HoaDonModel->getTenphong($idphong);
                                    $output .= 'data-tenphong = "'.$tenphong.'"';
                    }



                    $output.= '     
                                    
                                    ><i class="fa fa-eye" aria-hidden="true"></i>Details
                                    </a>
                                    </td>
                                    </tr>
                                </tbody>';
                }
            }
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            
            echo $output;
        }

       
        public function adminsc() {
            $this->SuatChieuModel = $this->model('SuatChieuModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            
            $data = $this->SuatChieuModel->Listsuatchieu($limit, $offset);

            $count_data = $this->SuatChieuModel->tongtrang();

            $total_pages = ceil($count_data/$limit);

            $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID Suất Chiếu</th>
                                <th scope="col">ID Phim</th>
                                <th scope="col">ID Rạp Chiếu</th>
                                <th scope="col">ID Phòng Chiếu</th>
                                <th scope="col">Ngày chiếu</th>
                                <th scope="col">Giờ bắt đầu</th>
                                <th scope="col">Giờ kết thúc</th>
                                <th scope="col">Xem chi tiết</th>
                                </tr>
                            </thead>';
            if($count_data > 0) {
                foreach($data as $row) {
                    $output.= '<tbody>
                                    <tr>
                                    <th scope="row">'.$row['IDsuatchieu'].'</th>
                                    <td>'.$row['IDphim'].'</td>
                                    <td>'.$row['IDrapchieu'].'</td>
                                    <td>'.$row['IDphongchieu'].'</td>
                                    <td>'.$row['ngaychieu'].'</td>
                                    <td>'.$row['giobatdau'].'</td>
                                    <td>'.$row['gioketthuc'].'</td>
                                    <td>
                                    <a id="detailsc" href="javascript:void(0)" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detailsc"
                                    
                                    data-idsuatchieu="'.$row['IDsuatchieu'].'"';
                    

                    $datactsc = $this->SuatChieuModel->getCTSC($row['IDsuatchieu']);

                    foreach($datactsc as $rowsc) {
                        $idphim = $rowsc['IDphim'];
                        $tenphim = $this->SuatChieuModel->getTenphim($idphim);
                                    $output .= 'data-tenphim = "'.$tenphim.'"';
                        $idrap = $rowsc['IDrapchieu'];
                        $tenrap = $this->SuatChieuModel->getTenrap($idrap);
                                    $output .= 'data-tenrap = "'.$tenrap.'"';
                        $idphong = $rowsc['IDphongchieu'];
                        $tenphong = $this->SuatChieuModel->getTenphong($idphong);
                                    $output .= 'data-tenphong = "'.$tenphong.'"';
                    }




                    
                                    $output.='data-ngaychieu="'.$row['ngaychieu'].'"';
                                    $output.='data-giobatdau="'.$row['giobatdau'].'"';
                                    $output.='data-gioketthuc="'.$row['gioketthuc'].'"';
                                    $output.='      ><i class="fa fa-eye" aria-hidden="true"></i>Details
                                    </a>
                                    </td>
                                    </tr>
                                </tbody>';
                }
            }
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            echo $output;
        }
        public function loadphong() {
            $this->SuatChieuModel = $this->model("SuatChieuModel");
            $phim = $_POST['phim'];
            $rap = $_POST['rap'];
            $ngay = $_POST['ngay'];
            $gio = $_POST['gio'];
            $listphong = $this->SuatChieuModel->Getphongtrong($phim, $rap, $ngay, $gio);
            $output = '<select name="phong" id="phong" class="form-control">
                            <option value="0" selected>Chọn phòng</option>';
            foreach($listphong as $row) {
                
                $output .= '<option value="'.$row['IDphongchieu'].'">'.$row['tenphongchieu'].' <?php if($data["phong"]=='.$row['IDphongchieu'].') {echo selected} ?></option>';

            }
            $output .= '    </select><small style="color:red">
                                <?php echo $data["phongError"] ?>
                            </small>';
            $output .= '';
            echo $output;
        }



        public function adminpq() {
            $this->QuyenModel = $this->model('QuyenModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            
            $data = $this->QuyenModel->getListQuyen($limit, $offset);
            $count_data = $this->QuyenModel->tongtrangquyen();

            $total_pages = ceil($count_data/$limit);

            $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID Quyền</th>
                                <th scope="col">Tên quyền</th>
                                <th scope="col">Xem chi tiết</th>
                                <th scope="col">Sửa</th>
                                </tr>
                            </thead>';
            if($count_data > 0) {
                foreach($data as $row) {
                    $output.= '<tbody>
                                    <tr>
                                    <th scope="row">'.$row['IDquyen'].'</th>
                                    <td>'.$row['tenquyen'].'</td>                  
                                    <td>
                                    <a id="detailpq" href="javascript:void(0)" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detailpq"
                                    data-idquyen="'.$row['IDquyen'].'"
                                    data-tenquyen="'.$row['tenquyen'].'"
                                    data-chitietquyen="';
                    $ctq = $this->QuyenModel->getCTQid($row['IDquyen']);     
                    foreach($ctq as $rowctq) {
                        $idchucnang = $rowctq['IDchucnang'];
                        $tenchucnang = $this->QuyenModel->getTencn($idchucnang);
                        $output .= ''.$tenchucnang.''.', ';
                    }           
                    $output.='      "><i class="fa fa-eye" aria-hidden="true"></i>Details</a>
                                    </td>
                                    <td>
                                        <a href="Adminphanquyen/Sua/'.$row['IDquyen'].'" id="'.$row['IDquyen'].'"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>
                                </tbody>';
                }
            }
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            echo $output;
        }


        public function admintkhd() {
            $this->HoaDonModel = $this->model('HoaDonModel');
            $limit = 8;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            if(isset($_POST['tenrap'])) {
                $tenrap = $_POST['tenrap'];
            } else {
                $tenrap="";
            }
            if((isset($_POST['date1']) && isset($_POST['date2'])) || isset($_POST['tenrap'])) {
                if(isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['tenrap'])) {
                    if($tenrap != "") {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->HoaDonModel->thongkerap($limit, $offset, $ngaybatdau, $ngayketthuc, $tenrap);
                    } else {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->HoaDonModel->thongkerap1($limit, $offset, $ngaybatdau, $ngayketthuc);
                    }
                    if(empty($_POST['date1']) && empty($_POST['date2'])) {
                        $data = $this->HoaDonModel->thongkerap2($limit, $offset, $tenrap);
                    }
                    if(empty($_POST['tenrap']) && empty($_POST['date1']) && empty($_POST['date2'])) {
                        $data = $this->HoaDonModel->thongkerap3($limit, $offset);
                    }
                } else if(isset($_POST['date1']) && isset($_POST['date2'])) {
                    if(!empty($_POST['date1']) && !empty($_POST['date2'])) {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->HoaDonModel->thongkerap1($limit, $offset, $ngaybatdau, $ngayketthuc);
                    } else {
                        $data = $this->HoaDonModel->thongkerap3($limit, $offset);
                    }
                } else if(!empty($_POST['tenrap'])) {
                    $data = $this->HoaDonModel->thongkerap2($limit, $offset, $tenrap);
                }  else {
                    $data = $this->HoaDonModel->thongkerap3($limit, $offset);
                }
            } else {
                if(!isset($_POST['tenrap'])) {
                    $data = $this->HoaDonModel->thongkerap3($limit, $offset);
                } else {
                    $data = $this->HoaDonModel->thongkerap2($limit, $offset, $tenrap);
                }
            }
            
            $count_data = 0;
                $total_pages = ceil($count_data/$limit);
                $output = '<table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Rạp Chiếu</th>
                                    <th scope="col">Tên rạp chiếu</th>
                                    <th scope="col">Tổng tiền</th>
                                    </tr>
                                </thead>';
                foreach($data as $row) {
                    if(isset($row['0'])) {
                        $output.= ' <tbody>
                                    <tr>
                                    <th scope="row">'.$row['1'].'</th>
                                    <td>'.$row['2'].'</td>
                                    <td>'.$row['0'].'</td>
                                    </td>
                                    </tr>
                                </tbody>';
                    }
                }
                
                $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
                $previous_pages = '';

                $next_pages = '';

                $page_pages = '';

                if($total_pages > 4) {
                    if($page < 5) {
                        for($count = 1; $count < 5; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    } else {
                        $end_limit = $total_pages - 3;
                        if($page > $end_limit) {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $end_limit; $count <= $total_pages; $count++) {
                                $page_array[] = $count;
                            }
                        } else {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $page - 1; $count <= $page + 1; $count++) {
                                $page_array[] = $count;
                            }
                            $page_array[] = '...';
                            $page_array[] = $total_pages;
                        }
                    }
                } else {
                    for($count = 1; $count <= $total_pages; $count++) {
                        $page_array[] = $count;
                    }
                }

                if(isset($page_array)) {
                    for($count = 0; $count < count($page_array); $count++) {
                        if($page == $page_array[$count]) {
                            $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                            <span class='sr-only'>(current)</span></a></li>";
                            $previous_id = $page_array[$count] - 1;
        
                            if($previous_id > 0) {
                                $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                    data-page_number='".$previous_id."'>Previous</a></li>";
                            } else {
                                $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                            }
        
                            $next_id = $page_array[$count] + 1;
        
                            if($next_id > $total_pages) {
                                $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                            } else {
                                $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                            }
                        } else {
                            if($page_array[$count] == '...') {
                                $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                            } else {
                                $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                    data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                            }
                        }
                    }
                    if(count($page_array) > 1) {
                        $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                    } else {
                        $output .= '</ul>';
                    }
                }
            

            echo $output;
        }

        public function admintksc() {
            $this->SuatChieuModel = $this->model('SuatChieuModel');
            $limit = 5;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            if(isset($_POST['tenphim'])) {
                $tenphim = $_POST['tenphim'];
            } else {
                $tenphim="";
            }
            if((isset($_POST['date1']) && isset($_POST['date2'])) || isset($_POST['tenphim'])) {
                if(isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['tenphim'])) {
                    if($tenphim != "") {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->SuatChieuModel->thongkesc($ngaybatdau, $ngayketthuc, $tenphim);
                    } else {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->SuatChieuModel->thongkesc1($ngaybatdau, $ngayketthuc);
                    }
                    if(empty($_POST['date1']) && empty($_POST['date2'])) {
                        $data = $this->SuatChieuModel->thongkesc2($tenphim);
                    }
                    if(empty($_POST['tenphim']) && empty($_POST['date1']) && empty($_POST['date2'])) {
                        $data = $this->SuatChieuModel->thongkesc3();
                    }
                } else if(isset($_POST['date1']) && isset($_POST['date2'])) {
                    if(!empty($_POST['date1']) && !empty($_POST['date2'])) {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->SuatChieuModel->thongkesc1($ngaybatdau, $ngayketthuc);
                    } else {
                        $data = $this->SuatChieuModel->thongkesc3();
                    }
                } else if(!empty($_POST['tenphim'])) {
                    $data = $this->SuatChieuModel->thongkesc2($tenphim);
                }  else {
                    $data = $this->SuatChieuModel->thongkesc3();
                }
            } else {
                if(!isset($_POST['tenphim'])) {
                    $data = $this->SuatChieuModel->thongkesc3();
                } else {
                    $data = $this->SuatChieuModel->thongkesc2($tenphim);
                }
            }
            
            $count_data = 0;
            
                $total_pages = ceil($count_data/$limit);
                $output = '<table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Phim</th>
                                    <th scope="col">Tên phim</th>
                                    <th scope="col">Số lượng vé bán ra</th>
                                    <th scope="col">Tổng doanh thu của bộ phim</th>
                                    </tr>
                                </thead>';
            foreach($data as $row) {
                
                $output.= ' <tbody>
                                <tr>
                                <th scope="row">'.$row['IDphim'].'</th>
                                <td >'.$row['tenphim'].'</td>
                                <td >'.$row['tong'].'</td>
                                <td >'.$row['doanhthu'].'</td>
                                </tr>
                            </tbody>';

            }
                $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
                $previous_pages = '';

                $next_pages = '';

                $page_pages = '';

                if($total_pages > 4) {
                    if($page < 5) {
                        for($count = 1; $count < 5; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    } else {
                        $end_limit = $total_pages - 3;
                        if($page > $end_limit) {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $end_limit; $count <= $total_pages; $count++) {
                                $page_array[] = $count;
                            }
                        } else {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $page - 1; $count <= $page + 1; $count++) {
                                $page_array[] = $count;
                            }
                            $page_array[] = '...';
                            $page_array[] = $total_pages;
                        }
                    }
                } else {
                    for($count = 1; $count <= $total_pages; $count++) {
                        $page_array[] = $count;
                    }
                }

                if(isset($page_array)) {
                    for($count = 0; $count < count($page_array); $count++) {
                        if($page == $page_array[$count]) {
                            $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                            <span class='sr-only'>(current)</span></a></li>";
                            $previous_id = $page_array[$count] - 1;
        
                            if($previous_id > 0) {
                                $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                    data-page_number='".$previous_id."'>Previous</a></li>";
                            } else {
                                $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                            }
        
                            $next_id = $page_array[$count] + 1;
        
                            if($next_id > $total_pages) {
                                $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                            } else {
                                $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                            }
                        } else {
                            if($page_array[$count] == '...') {
                                $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                            } else {
                                $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                    data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                            }
                        }
                    }
                    if(count($page_array) > 1) {
                        $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                    } else {
                        $output .= '</ul>';
                    }
                }
            
            
            echo $output;
        }

        public function ajaxmuave2() {
            if(isset($_POST['idsuatchieu'])) {
                $idsuatchieu = $_POST['idsuatchieu'];
            } else {
                $idsuatchieu = 'SC0001';
            }
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
            $output = "";
            $datathucpham = $this->ThucPhamModel->GiaThucPham();
            $datasuatchieu = $this->SuatChieuModel->ShowTheoID($idsuatchieu);
            $sogheconlai = count($this->GheModel->ShowGheTrong($idsuatchieu));

            $output .= '<div class="col-lg-9 col-md-12 col-sm-12 col-12 mt-3" id="showcart">
            <div style="border: 1px solid black;background:black">
                            <div style="margin: 10px;background:white" id="showghe">
                                <div style="border: 1px solid black; padding: 20px; border-bottom:none; background:red"><h2>CHỌN VÉ/THỨC ĂN</h2></div>
                                <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                                    <div style="float:left; width:40%; "><span>Loại vé</span></div>
                                    <div style="float:left; width:20%"><span>Số lượng</span></div>
                                    <div style="float:left; width:20%"><span>Giá(VNĐ)</span></div>
                                    <div style="float:left; width:20%"><span>Tổng(VNĐ)</span></div>
                                    <div style="clear:both"></div>
                                </div>';
                
                    $totalve = 0;
                    $idloaive = '';
                    if(isset($_SESSION['cartve'])) { 
                        foreach($_SESSION['cartve'] as $keys => $values) {
                
                            $output .= '    <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                                <div style="float:left; width:40%; line-height: 50px"><span>Vé 2D</span></div>
                                                <div style="float:left; width:20%; line-height: 50px"><input id="'.$keys.'" class="ve" type="number" name="'.$idsuatchieu.'"  min="0" max="'.$sogheconlai.'" value="'.$values['soluong'].'"></div>
                                                <div style="float:left; width:20%; line-height: 50px"><span>'.number_format($values["giave"]).'</span></div>
                                                <div style="float:left;width:20%; line-height: 50px"><span>'.number_format($values["soluong"]*$values["giave"]).'</span></div>
                                                <div style="clear:both"></div>
                                            </div>';
                
                            $totalve = $totalve + ($values["soluong"]*$values["giave"]);
                            $idloaive = $keys;
                        }
                    } else { 
                        foreach($datave as $data1){
                            if($data1['loai'] == $dataloaive) {
                            $output .= '   <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                                <div style="float:left; width:40%; line-height: 50px"><span>Vé '.$data1['tenloaive'].'</span></div>
                                                <div style="float:left; width:20%; line-height: 50px"><input id="'.$data1['IDloaive'].'" class="ve" type="number" name="'.$idsuatchieu.'" style="width:35%" min="0" max="'.$sogheconlai.'" value="0"></div>
                                                <div style="float:left; width:20%; line-height: 50px"><span>'.number_format($data1["giave"]).'</span></div>
                                                <div style="float:left; width:20%; line-height: 50px"><span>0</span></div>
                                                <div style="clear:both"></div>
                                            </div>';
                            }
                        }
                    } 

            $output .= '<div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                                <div style="float:left; width:80%"><span>Tổng</span></div>
                                <div style="float:left; width:20%"><span>'.number_format($totalve).'</span></div>
                                <div style="clear:both"></div>
                            </div>';


            $output .=' <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                                <div style="float:left; width:40%"><span>Combo</span></div>
                                <div style="float:left; width:20%"><span>Số lượng</span></div>
                                <div style="float:left; width:20%"><span>Giá(VNĐ)</span></div>
                                <div style="float:left; width:20%"><span>Tổng(VNĐ)</span></div>
                                <div style="clear:both"></div>
                            </div>
                            ';
                            
                    $totalthucpham = 0;
                    if(isset($_SESSION['cart'])) { 
                        foreach($_SESSION['cart'] as $keys => $values) {
                            
                        $output.=   '<div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:15%; line-height: 50px;" ><img style="width:50%;" src="'.$values["hinhanh"].'">      </div>
                                            <div style="float:left; width:25%;"><span>'.$values["tenthucpham"].'</span><br><span></span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><input id="'.$keys.'" class="thucpham" type="number" style="width:35%" min="0" value="'.$values['soluong'].'" name="'.$idsuatchieu.'"></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span>'.number_format($values["giathucpham"]).'</span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span>'.number_format($values["soluong"]*$values["giathucpham"]).'</span></div>
                                            <div style="clear:both"></div>
                                        </div>';
                            
                            $totalthucpham = $totalthucpham + ($values["soluong"]*$values["giathucpham"]);
                        }
                    } else { 
                        foreach($datathucpham as $data2){
                            
                    $output.='      <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:15%; line-height: 50px;" ><img style="width:50%;" src="'.$data2["hinhanh"].'">      </div>
                                            <div style="float:left; width:25%;"><span>'.$data2["tenthucpham"].'</span><br><span>'.$data2["noidung"].'</span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><input id="'.$data2["IDthucpham"].'" class="thucpham" type="number" style="width:35%" min="0" value="0" name="'.$idsuatchieu.'"></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span>'.number_format($data2["giathucpham"]).'</span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span>0</span></div>
                                            <div style="clear:both"></div>
                                        </div>';
                            
                        }
                    } 
                            
                    $output.='      <div style="border: 1px solid black; padding: 5px 20px;background:gray;font-weight:800">
                                        <div style="float:left; width:80%"><span>Tổng</span></div>
                                        <div style="float:left; width:20%"><span>'.number_format($totalthucpham).'</span></div>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                            </div>';    
                            
                    
                    $timeEng = ['Sun','Mon','Tue','Wed', 'Thu', 'Fri', 'Sat', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    $timeVie = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Một', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy', 'Tám', 'Chín', 'Mười', 'Mười Một', 'Mười Hai'];
                    foreach($datasuatchieu as $row) { 
                        $date = explode("-", filter_var(trim($row["ngaychieu"], "-")));
                        $date1 = date("D", mktime(0,0,0,$date[1],$date[2],$date[0]));
                        $date1 = str_replace( $timeEng, $timeVie, $date1);
               
                    $output.='      </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-3" id="showcart1">
                    <div style="border: 1px solid black; padding:20px;">
                                    <div style="width:100%"><img style="width:100%;height:250px" src="'.$row['hinhphim'].'" alt=""></div>
                                    <div class="mt-2"><span style="font-weight:500">'.$row["tenphim"].'</span></div>
                                    <div class="mt-3"><span>C'.$row["gioihantuoi"].' </span><small style="font-size:12px;color:red" >(*)Phim chỉ dành cho khán giả từ '.$row["gioihantuoi"].' tuổi trở lên</small></div>
                                    <div class="mt-2"><small>Rạp: '.$row["tenrapchieu"].' | '.$row["tenphongchieu"].'</small></div>
                                    <hr class="mt-2">
                                    <div class="mt-2"><small>Suất chiếu: '.$row["giobatdau"].' | '.$date1.', '.$row["ngaychieu"].'</small></div>
                                    <hr class="mt-2">
                                    <div class="mt-2"><small>Combo: ';
                                    if(isset($_SESSION['cart'])) 
                                    { 
                                        foreach($_SESSION['cart'] as $keys => $values) 
                                        { 
                                            $output.=' '.$values["tenthucpham"]."(".$values["soluong"]."), ".''; 
                                        } 
                                    }
                                    $output.='</small></div>
                                    <hr class="mt-2">
                                    <div class="mt-2" style="overflow:hidden"><small>Ghế: <span id="ghe1"></span></small></div>
                                    <hr class="mt-2">
                                    <div class="mt-2"><span>TỔNG TIỀN: </span><span id="tongtien">'.number_format($totalthucpham+$totalve).' </span><span>VNĐ</span></div>
                                    <hr class="mt-2">
                                    <div class="mt-2" style="text-align: center" id="nutthanhtoan">';
                                    $output.='<button for="';
                                    if(isset($_SESSION['cartve'])) 
                                    {   foreach($_SESSION['cartve'] as $keys => $values)  {
                                            if($keys == $idloaive) {
                                                $output.=' '.$values["soluong"].' ';
                                            } 
                                        }
                                    } 
                                    else 
                                    {
                                        $output.='0';
                                    } 
                                        
                                        
                                    $output.=' "type="<'.$sogheconlai.'" 
                                    id="'.$row["IDrapchieu"].'" 
                                    value="'.$row['IDsuatchieu'].'" 
                                    name="'.$row["IDphongchieu"].'"  
                                    class="thanhtoan">TIẾP TỤC</button></div>
                                    </div></div>';
                    }
                     
                echo $output;
        }
    

        public function adminls() {
            
            $this->HoaDonModel = $this->model('HoaDonModel');
            $limit = 8;
            $page = 1;
            if($_POST['page'] > 1) {
                $offset = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $offset = 0;
            }
            if(isset($_SESSION['IDkhachhang'])) {
                $idkh = $_SESSION['IDkhachhang'];
            } else {
                $idkh ="";
            }
            if(isset($_POST['date1']) && isset($_POST['date2'])) {
                    if(!empty($_POST['date1']) && !empty($_POST['date2'])) {
                        $ngaybatdau = $_POST['date1'];
                        $ngayketthuc = $_POST['date2'];
                        $data = $this->HoaDonModel->Listhoadon3($limit, $offset, $ngaybatdau, $ngayketthuc, $idkh);

                        $count_data = $this->HoaDonModel->tongtrang3($ngaybatdau, $ngayketthuc, $idkh);
                    } else {
                        $data = $this->HoaDonModel->Listhoadon4($limit, $offset, $idkh);

                        $count_data = $this->HoaDonModel->tongtrang4($idkh);
                    }
                 
            } else {
                    $data = $this->HoaDonModel->Listhoadon4($limit, $offset, $idkh);

                    $count_data = $this->HoaDonModel->tongtrang4($idkh);
            }
            
            $total_pages = ceil($count_data/$limit);
            
                $output = ' <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Số thứ tự</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Ngày phim chiếu</th>
                                <th scope="col">Giờ bắt đầu</th>
                                <th scope="col">Giờ kết thúc</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Xem chi tiết</th>
                                </tr>
                            </thead>';
            $count = $offset;
            $today = date('Y-m-d');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if($count_data > 0) {
            foreach($data as $row) {
                $count++;
                $datakh = $this->HoaDonModel->getTenKH($row['IDkhachhang']);
                $datakh1 = $this->HoaDonModel->getsdt($row['IDkhachhang']);
                $datactsc = $this->HoaDonModel->getCTSC($row['IDsuatchieu']);
                foreach($datactsc as $rowscc) {
                    $idphim1 = $rowscc['IDphim'];
                    $phim = $this->HoaDonModel->getTenphim($idphim1);
                                
                    $idrap1 = $rowscc['IDrapchieu'];
                    $rap = $this->HoaDonModel->getTenrap($idrap1);
                                
                    $idphong1 = $rowscc['IDphongchieu'];
                    $phong = $this->HoaDonModel->getTenphong($idphong1);
                    $giobd = $rowscc['giobatdau'];
                    $giokt = $rowscc['gioketthuc'];
                    $ngaychieu = $rowscc['ngaychieu'];
                }
                $output.= '<tbody>
                                <tr>
                                <th scope="row">'.$count.'</th>
                                <td>'.$datakh.'</td>
                                <td>'.$ngaychieu.'</td>
                                <td>'.$giobd.'</td>
                                <td>'.$giokt.'</td>
                                <td>'.number_format($row['tongtien']).'</td>
                                <td>'.$row['ngaylaphoadon'].'</td>';           
                                
                $output.= '     <td>
                                <a id="detaills" href="javascript:void(0)" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detaills"
                                data-sodienthoai      = "'.$datakh1.'"
                                data-ngayphimchieu      = "'.$ngaychieu.'"
                                data-giobatdau      = "'.$giobd.'"
                                data-gioketthuc      = "'.$giokt.'"';
                        
                                $output.='data-tenkh = "'.$datakh.'"';
                $datacthd = $this->HoaDonModel->getCTHD($row['IDhoadon']);
                                $output .= 'data-thucpham = "';
                if($datacthd != false) {
                    foreach($datacthd as $rowcthd) {
                        $datathucpham = $this->HoaDonModel->getThucPham($rowcthd['IDthucpham']);
                        $slthucpham = $rowcthd['soluongthucpham'];
                        foreach($datathucpham as $rowtentp) {
                                $output .= ''.$rowtentp['tenthucpham'].''.'('.$slthucpham.')'.' '.number_format($slthucpham*$rowtentp['giathucpham']).''.'VNĐ,'.' ';
                        }
                        
                    }
                }
                                $output.='"';
                                $output .= 'data-ghe = "';
                $datactve = $this->HoaDonModel->getCTve($row['IDsuatchieu'], $row['IDkhachhang'],$row['IDhoadon']);
                foreach($datactve as $rowghe) {
                    $datactghe = $this->HoaDonModel->getDayGhe($rowghe['IDghengoi']);
                    foreach($datactghe as $rowctghe) {
                                $output .= 'Ghế:'.$rowctghe['dayghe'].''.''.$rowctghe['soghe'].''.' '.''.number_format($rowghe['giave']).''.'VNĐ,'.' ';
                    }
                }
                                $output.='"';
               

                foreach($datactsc as $rowsc) {
                    $idphim = $rowsc['IDphim'];
                    $tenphim = $this->HoaDonModel->getTenphim($idphim);
                                $output .= 'data-tenphim = "'.$tenphim.'"';
                    $idrap = $rowsc['IDrapchieu'];
                    $tenrap = $this->HoaDonModel->getTenrap($idrap);
                                $output .= 'data-tenrap = "'.$tenrap.'"';
                    $idphong = $rowsc['IDphongchieu'];
                    $tenphong = $this->HoaDonModel->getTenphong($idphong);
                                $output .= 'data-tenphong = "'.$tenphong.'"';
                }



                $output.= '     
                                
                                ><i class="fa fa-eye" aria-hidden="true"></i>Details
                                </a>
                                </td>
                                </tr>
                            </tbody>';
            }
            }
            
            $output .= '</table><ul class="pagination justify-content-center mt-5" id="pagination1">';
            $previous_pages = '';

            $next_pages = '';

            $page_pages = '';

            if($total_pages > 4) {
                if($page < 5) {
                    for($count = 1; $count < 5; $count++) {
                        $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_pages;
                } else {
                    $end_limit = $total_pages - 3;
                    if($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $end_limit; $count <= $total_pages; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for($count = $page - 1; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                }
            } else {
                for($count = 1; $count <= $total_pages; $count++) {
                    $page_array[] = $count;
                }
            }
            

            if(isset($page_array)) {
                for($count = 0; $count < count($page_array); $count++) {
                    if($page == $page_array[$count]) {
                        $page_pages .= "<li class='page-item active'><a href='javascript:void(0)' class='page-link' data-page_number='".$page_array[$count]."'>".$page_array[$count]."
                                        <span class='sr-only'>(current)</span></a></li>";
                        $previous_id = $page_array[$count] - 1;
    
                        if($previous_id > 0) {
                            $previous_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$previous_id."'>Previous</a></li>";
                        } else {
                            $previous_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                        }
    
                        $next_id = $page_array[$count] + 1;
    
                        if($next_id > $total_pages) {
                            $next_pages = "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                        } else {
                            $next_pages = "<li class='page-item'><a class='page-link' href='javascript:void(0)' data-page_number='".$next_id."'>Next</a></li>";
                        }
                    } else {
                        if($page_array[$count] == '...') {
                            $page_pages .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        } else {
                            $page_pages .= "<li class='page-item'><a class='page-link' href='javascript:void(0)' 
                                                data-page_number='".$page_array[$count]."'>".$page_array[$count]."</a></li>";
                        }
                    }
                }
                if(count($page_array) > 1) {
                    $output .= $previous_pages . $page_pages . $next_pages . '</ul>';
                } else {
                    $output .= '</ul>';
                }
            }
            
            
            echo $output;
        }
    }
?>
