<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
            <form class="form-horizontal" action="Admintaikhoan/Sua/<?php echo $data['id']; ?>" role="form" method="POST">
                <h2>Sửa tài khoản</h2>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="username" id="usersName" placeholder="Họ và tên" class="form-control" value="<?php echo $data['username'] ?>" <?php if(!empty($data['usernameError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['usernameError']; ?>
                        </small>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="diachi" id="usersDc" placeholder="Địa chỉ" class="form-control" value="<?php echo $data['diachi'] ?>" <?php if(!empty($data['diachiError'])) echo "autofocus" ?>>
                        <small  style="color:red">
                            <?php echo $data['diachiError']; ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="phoneNumber" name="sodienthoai" id="usersSdt" placeholder="Số điện thoại" class="form-control" value="<?php echo $data['sodienthoai'] ?>" <?php if(!empty($data['sodienthoaiError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['sodienthoaiError']; ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="ngaysinh" placeholder="Ngày sinh" class="form-control" value="<?php echo $data['ngaysinh'] ?>" <?php if(!empty($data['ngaysinhError'])) echo "autofocus" ?>>
                        <small style="color:red">
                            <?php echo $data['ngaysinhError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <select name="phanquyen" id="" class="form-control"<?php if(!empty($data['phanquyenError'])) echo "autofocus" ?>>
                            <option value = "0" selected>Chọn quyền</option>
                            <?php foreach($data['listq'] as $row) {?>  
                                    <?php if($row['IDquyen'] == $data['phanquyen']) { ?>
                                        <option selected value='<?php echo $row['IDquyen'] ?>'><?php echo $row['tenquyen'] ?></option>   
                                    <?php } else { ?>
                                        <option value='<?php echo $row['IDquyen'] ?>'><?php echo $row['tenquyen'] ?></option> 
                                    <?php } ?>
                            <?php } ?>
                        </select>
                        <small style="color:red">
                            <?php echo $data['phanquyenError']; ?>
                        </small>
                    </div>
                </div>

                <div class="col-sm-9">
                <button type="submit" name="submit" class="btn btn-primary btn-block mt-5 ">Sửa</button>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->


<?php require_once './mvc/views/admins/blocks/footer.php' ?>
<?php
        if(isset($data['home'])) {
            
            echo '<script language="javascript">';
            echo 'alert("Đăng ký thành công")';
            echo '</script>';
        }
        
    ?>
    <?php 
    }
?>