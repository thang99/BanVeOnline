
<?php require_once "./mvc/views/blocks/header.php"; ?>
<div>
    <div class="container mt-5">
        <div class="row" id="showall">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12 mt-3" id='showcart'>
                <div style="border: 1px solid black;background:black">
                    <div style="margin: 10px;background:white" id="showghe">
                        <div style="border: 1px solid black; padding: 20px; border-bottom:none; background:red"><h2>CHỌN VÉ/THỨC ĂN</h2></div>
                        <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                            <div style="float:left; width:40%; "><span>Loại vé</span></div>
                            <div style="float:left; width:20%"><span>Số lượng</span></div>
                            <div style="float:left; width:20%"><span>Giá(VNĐ)</span></div>
                            <div style="float:left; width:20%"><span>Tổng(VNĐ)</span></div>
                            <div style="clear:both"></div>
                        </div>
                        <?php 
                            $totalve = 0;
                            $idloaive = '';
                            if(isset($_SESSION['cartve'])) { 
                                foreach($_SESSION['cartve'] as $keys => $values) {
                        ?>
                                    <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:40%; line-height: 50px"><span>Vé 2D</span></div>
                                        <div style="float:left; width:20%; line-height: 50px"><input id="<?php echo $keys; ?>" class="ve" type="number" name="<?php echo $data['idsuatchieu']; ?>" style="width:35%" min="0" max="<?php echo $data['sogheconlai']; ?>" value="<?php echo $values['soluong']; ?>"></div>
                                        <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($values["giave"]); ?></span></div>
                                        <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($values["soluong"]*$values["giave"]); ?></span></div>
                                        <div style="clear:both"></div>
                                    </div>
                        <?php 
                                    $totalve = $totalve + ($values["soluong"]*$values["giave"]);
                                    $idloaive = $keys;
                                }
                            } else { 
                                foreach($data['datave'] as $data1){
                                    if($data1['loai'] == $data['dataloaive']) {
                        ?>
                                    <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:40%; line-height: 50px"><span>Vé <?php echo $data1['tenloaive']; ?></span></div>
                                        <div style="float:left; width:20%; line-height: 50px"><input id="<?php echo $data1['IDloaive']; ?>" class="ve" type="number" name="<?php echo $data['idsuatchieu']; ?>"style="width:35%" min="0" max="<?php echo $data['sogheconlai']; ?>" value="0"></div>
                                        <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($data1["giave"]); ?></span></div>
                                        <div style="float:left; width:20%; line-height: 50px"><span>0</span></div>
                                        <div style="clear:both"></div>
                                    </div>
                        <?php   
                                    }
                                }
                            } 
                        ?>
                        <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                            <div style="float:left; width:80%"><span>Tổng</span></div>
                            <div style="float:left; width:20%"><span><?php echo number_format($totalve); ?></span></div>
                            <div style="clear:both"></div>
                        </div>



                        <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none;background:gray;font-weight:800">
                            <div style="float:left; width:40%"><span>Combo</span></div>
                            <div style="float:left; width:20%"><span>Số lượng</span></div>
                            <div style="float:left; width:20%"><span>Giá(VNĐ)</span></div>
                            <div style="float:left; width:20%"><span>Tổng(VNĐ)</span></div>
                            <div style="clear:both"></div>
                        </div>
                            <?php 
                                $totalthucpham = 0;
                                if(isset($_SESSION['cart'])) { 
                                    foreach($_SESSION['cart'] as $keys => $values) {
                            ?>
                                        <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:15%; line-height: 50px;" ><img style="width:50%;" src="<?php echo $values["hinhanh"]; ?>">      </div>
                                            <div style="float:left; width:25%;"><span><?php echo $values["tenthucpham"]; ?></span><br><span></span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><input id="<?php echo $keys ?>" class="thucpham" type="number" style="width:35%" min="0" value="<?php echo $values['soluong']; ?>"></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($values["giathucpham"]); ?></span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($values["soluong"]*$values["giathucpham"]); ?></span></div>
                                            <div style="clear:both"></div>
                                        </div>
                            <?php 
                                        $totalthucpham = $totalthucpham + ($values["soluong"]*$values["giathucpham"]);
                                    }
                                } else { 
                                    foreach($data['datathucpham'] as $data2){
                            ?>
                                        <div style="border: 1px solid black; padding: 5px 20px; border-bottom:none">
                                        <div style="float:left; width:15%; line-height: 50px;" ><img style="width:50%;" src="<?php echo $data2["hinhanh"]; ?>">      </div>
                                            <div style="float:left; width:25%;"><span><?php echo $data2["tenthucpham"]; ?></span><br><span><?php echo $data2["noidung"]; ?></span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><input id="<?php echo $data2["IDthucpham"]; ?>" class="thucpham" type="number" style="width:35%" min="0" value="0"></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span><?php echo number_format($data2["giathucpham"]); ?></span></div>
                                            <div style="float:left; width:20%; line-height: 50px"><span>0</span></div>
                                            <div style="clear:both"></div>
                                        </div>
                            <?php 
                                    }
                                } 
                            ?>
                        <div style="border: 1px solid black; padding: 5px 20px;background:gray;font-weight:800">
                            <div style="float:left; width:80%"><span>Tổng</span></div>
                            <div style="float:left; width:20%"><span><?php echo number_format($totalthucpham); ?></span></div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-3" id="showcart1">
                <?php 
                    $timeEng = ['Sun','Mon','Tue','Wed', 'Thu', 'Fri', 'Sat', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    $timeVie = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Một', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy', 'Tám', 'Chín', 'Mười', 'Mười Một', 'Mười Hai'];
                    foreach($data['datasuatchieu'] as $row) { 
                        $date = explode("-", filter_var(trim($row["ngaychieu"], "-")));
                        $date1 = date("D", mktime(0,0,0,$date[1],$date[2],$date[0]));
                        $date1 = str_replace( $timeEng, $timeVie, $date1);
                ?>
                        <div style="border: 1px solid black; padding:20px;">
                            <div style="width:100%"><img style="width:100%;height:250px" src="<?php echo $row['hinhphim']; ?>" alt=""></div>
                            <div class="mt-2"><span style="font-weight:500"><?php echo $row["tenphim"]?></span></div>
                            <div class="mt-3"><span>C<?php echo $row["gioihantuoi"]?> </span><small style="font-size:12px;color:red" >(*)Phim chỉ dành cho khán giả từ <?php echo $row["gioihantuoi"]?> tuổi trở lên</small></div>
                            <div class="mt-2"><small>Rạp: <?php echo $row["tenrapchieu"]?> | <?php echo $row["tenphongchieu"]?></small></div>
                            <hr class="mt-2">
                            <div class="mt-2"><small>Suất chiếu: <?php echo $row["giobatdau"]?> | <?php echo $date1?>, <?php echo $row["ngaychieu"]?></small></div>
                            <hr class="mt-2">
                            <div class="mt-2"><small>Combo: <?php if(isset($_SESSION['cart'])) { foreach($_SESSION['cart'] as $keys => $values) { echo $values["tenthucpham"]."(".$values["soluong"]."), "; } } ?></small></div>
                            <hr class="mt-2">
                            <div class="mt-2" style="overflow:hidden"><small>Ghế: <span id="ghe1"></span></small></div>
                            <hr class="mt-2">
                            <div class="mt-2"><span>TỔNG TIỀN: </span><span id="tongtien"><?php echo number_format($totalthucpham+$totalve); ?> </span><span>VNĐ</span></div>
                            <hr class="mt-2">
                            <div class="mt-2" style="text-align: center" id="nutthanhtoan">
                                
                            <button for="<?php if(isset($_SESSION['cartve'])) {echo $_SESSION['cartve'][$idloaive]['soluong'];} else {echo "0";} ?> " type="<?php echo $data["sogheconlai"]; ?>" id="<?php echo $row["IDrapchieu"]; ?>" value="<?php echo $data['idsuatchieu']; ?>" name="<?php echo $row["IDphongchieu"]; ?>"  class="thanhtoan">TIẾP TỤC</button>
                                
                                
                            </div>
                        </div>
                <?php 
                    } 
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "./mvc/views/blocks/footer.php"; ?>