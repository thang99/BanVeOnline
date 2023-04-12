<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
            <form class="form-horizontal" action="Adminphanquyen/Sua/<?php echo $data['id']; ?>" role="form" method="POST" enctype="multipart/form-data" id="formsubmit">
                <h2>Sửa Quyền</h2>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" name="tenquyen"  placeholder="Tên quyền" class="form-control" value="<?php echo $data['tenquyen'] ?>" <?php if(!empty($data['tenquyenError'])){echo "autofocus";} ?>>
                        <small style="color:red">
                            <?php echo $data['tenquyenError'] ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" placeholder="Chọn thể loại" class="form-control" disabled>
                        <div class="row mt-3">
                            <?php foreach($data['listq'] as $row) { ?>
                                <div class="col-sm-3 col-3">
                                    <span><input type="checkbox" name="quyen[]" value="<?php echo $row['IDchucnang'] ?>"><?php echo $row['tenchucnang'] ?></span>
                                </div>
                            <?php } ?>
                            <?php foreach($data['quyen1'] as $row1) { ?>
                                <div class="col-sm-3 col-3">
                                    <span><input type="checkbox" checked name="quyen[]" value="<?php echo $row1['IDchucnang'] ?>"><?php echo $row1['tenchucnang'] ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <small style="color:red">
                            <?php echo $data['quyenError'] ?>
                        </small>
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
            echo 'alert("Thêm quyền thành công")';
            echo '</script>';
        }
        
    ?>
<?php 
    }
?>