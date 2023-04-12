<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
            <form class="form-horizontal" action="Admintaosuatchieu" role="form" method="POST">
                <h2>Thêm suất chiếu</h2>
                <div class="form-group">
                    <div class="row">
                    <div class="col-sm-9">
                        <select name="phim" id="phim" class="form-control">
                            <option value="" selected>Chọn phim</option>
                            <?php foreach($data['listphim'] as $rowphim) { ?>
                                <option value="<?php echo $rowphim['IDphim'] ?>" <?php if($data['phim']==$rowphim['IDphim']) {echo "selected";} ?>><?php echo $rowphim['tenphim'] ?></option>
                            <?php } ?>
                        </select>
                        <small style="color:red">
                            <?php echo $data['phimError'] ?>
                        </small>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-sm-9">
                        <select name="rap" id="rap" class="form-control">
                            <option value="" selected>Chọn rạp</option>
                            <?php foreach($data['listrap'] as $rowphim) { ?>
                                <option value="<?php echo $rowphim['IDrapchieu'] ?>" <?php if($data['rap']==$rowphim['IDrapchieu']) {echo "selected";} ?> ><?php echo $rowphim['tenrapchieu'] ?></option>
                            <?php } ?>
                        </select>
                        <small style="color:red">
                            <?php echo $data['rapError'] ?>
                        </small>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-sm-9">
                        <input  id="ngay" name="ngay" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Chọn ngày chiếu" min="<?php echo date('Y-m-d') ?>" value="<?php echo $data['ngay'] ?>" class="form-control">
                        <small style="color:red">
                            <?php echo $data['ngayError'] ?>
                        </small>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <input type="text" name="gio" id="time" placeholder="Chọn giờ bắt đầu" value="<?php echo $data['gio'] ?>" class="form-control giochieu">
                            <small style="color:red">
                                <?php echo $data['gioError'] ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-7" id="phong1">
                            <select name="phong" id="phong" class="form-control">
                                <option value="" selected>Chọn phòng</option>
                            </select>
                            <small style="color:red">
                                <?php echo $data['phongError'] ?>
                            </small>
                        </div>
                        <div class="col-sm-2">
                                <button type="button" id="phong2" class="btn btn-primary btn-block ">Load phòng chiếu</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-sm-9">
                <button type="submit" class="btn btn-primary btn-block mt-5 ">Thêm</button>
                </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->


<?php require_once './mvc/views/admins/blocks/footer.php' ?>
<?php
        if(isset($data['home'])) {  
            // print($data['phim']."     ");
            // print($data['rap']."     ");
            // print($data['ngay']."     ");
            // print($data['gio']."     ");
            // print($data['phong']."     ");
            // print($data['home']);
            
            echo "<script language='javascript'>";
            echo "alert('Thêm suất chiếu thành công')";
            // echo "alert($a)";
            echo "</script>";
        }
        
    ?>
    <?php 
    }
?>
