<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
            <form class="form-horizontal" action="Adminphim/Sua/<?php echo $data['id']; ?>" role="form" method="POST" enctype="multipart/form-data" id="formsubmit">
                <h2>Sửa Phim</h2>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="tenphim"  placeholder="Tên phim" class="form-control" value="<?php echo $data['tenphim'] ?>" <?php if(!empty($data['tenphimError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['tenphimError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="daodien"  placeholder="Đạo diễn" class="form-control" value="<?php echo $data['daodien'] ?>" <?php if(!empty($data['daodienError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['daodienError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="dienvien" placeholder="Diễn viên" class="form-control" value="<?php echo $data['dienvien'] ?>" <?php if(!empty($data['dienvienError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['dienvienError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="thoiluong" placeholder="Thời lượng phim ( ... phút )" class="form-control" value="<?php echo $data['thoiluong'] ?>" <?php if(!empty($data['thoiluongError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['thoiluongError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="ngaycongchieu" placeholder="Ngày công chiếu" class="form-control" value="<?php echo $data['ngaycongchieu'] ?>" <?php if(!empty($data['ngaycongchieuError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['ngaycongchieuError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <textarea name="noidungphim" class="form-control" placeholder="Nội dung phim" <?php echo $data['noidungphim'] ?> <?php if(!empty($data['noidungphimError'])) echo "autofocus" ?>><?php echo $data['noidungphim'] ?></textarea>
                        <small style="color:red">
                            <?php echo $data['noidungphimError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <select name="dinhdangphim" class="form-control" value="<?php echo $data['dinhdangphim'] ?>" <?php if(!empty($data['dinhdangphimError'])) echo "autofocus" ?>>
                            <?php if(empty($data['dinhdangphim'])) { ?>
                                <option value='0' selected>Chọn định dạng phim</option>
                                <option value='1'>2D</option>
                                <option value='2'>3D</option>
                            <?php }else { ?>
                            <?php       if($data['dinhdangphim'] == 0) { ?>
                                            <option value='0' selected>Chọn định dạng phim</option>
                                            <option value='1'>2D</option>
                                            <option value='2'>3D</option>
                            <?php       } else if($data['dinhdangphim'] == 1) { ?>
                                            <option value='0'>Chọn định dạng phim</option>
                                            <option value='1' selected>2D</option>
                                            <option value='2'>3D</option>
                            <?php       } else { ?>
                                            <option value='0'>Chọn định dạng phim</option>
                                            <option value='1'>2D</option>
                                            <option value='2' selected>3D</option>
                            <?php       } ?>
                            <?php } ?>
                        </select>
                        <small style="color:red">
                            <?php echo $data['dinhdangphimError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <select name="gioihantuoi" class="form-control"  <?php if(!empty($data['gioihantuoiError'])) echo "autofocus" ?>>
                            <?php if(empty($data['gioihantuoi'])) { ?>
                                <option value='0' selected>Chọn giới hạn tuổi</option>
                                <option value='1'>13</option>
                                <option value='2'>16</option>
                                <option value='3'>18</option> 
                            <?php } else { ?>  
                            <?php       if($data['gioihantuoi'] == 0) { ?>
                                            <option value='0' selected>Chọn giới hạn tuổi</option>
                                            <option value='1'>13</option>
                                            <option value='2'>16</option>
                                            <option value='3'>18</option> 
                            <?php       } else if($data['gioihantuoi'] == 1){ ?>
                                            <option value='0'>Chọn giới hạn tuổi</option>
                                            <option value='1' selected>13</option>
                                            <option value='2'>16</option>
                                            <option value='3'>18</option> 
                            <?php       } else if($data['gioihantuoi'] == 2){ ?>
                                            <option value='0'>Chọn giới hạn tuổi</option>
                                            <option value='1'>13</option>
                                            <option value='2' selected>16</option>
                                            <option value='3'>18</option> 
                            <?php       } else { ?>
                                            <option value='0'>Chọn giới hạn tuổi</option>
                                            <option value='1'>13</option>
                                            <option value='2'>16</option>
                                            <option value='3' selected>18</option>
                            <?php       } ?>
                            <?php } ?>
                        </select>
                        <small style="color:red">
                            <?php echo $data['gioihantuoiError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" placeholder="Chọn thể loại" class="form-control" disabled>
                        <div class="row mt-3">
                            <?php foreach($data['listtl'] as $row) { ?>
                                    <div class="col-sm-3 col-3">
                                        <span><input type="checkbox"  name="theloai[]"  value="<?php echo $row['IDtheloai'] ?>"><?php echo $row['tentheloai'] ?></span>
                                    </div>
                            <?php } ?>
                            <?php foreach($data['theloai1'] as $row1) { ?>
                                    <div class="col-sm-3 col-3">
                                        <span><input type="checkbox" name="theloai[]" checked value="<?php echo $row1['IDtheloai'] ?>"><?php echo $row1['tentheloai'] ?></span>
                                    </div>
                            <?php } ?>
                        </div>
                        <small style="color:red">
                            <?php echo $data['theloaiError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="file" name="file" value="<?php echo $data['hinhphim']; ?>">
                        <small style="color:red">
                            <?php echo $data['hinhphimError'] ?>
                        </small>
                    </div>
                    <div class="col-sm-3">
                        <img src="<?php echo $data['hinhphim']?>" class="d-block w-100" id="suahinh" alt="">
                    </div>
                </div>

                <div class="col-sm-9">
                <button type="submit" id="submitphim" name="submit" class=" submitphim btn btn-primary btn-block mt-5 ">Sửa</button>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->


<?php require_once './mvc/views/admins/blocks/footer.php' ?>
<?php
        if(isset($data['home'])) {
            
            echo '<script language="javascript">';
            echo 'alert("Sửa phim thành công")';
            echo '</script>';
        }
        
    ?>
<?php 
    }
?>