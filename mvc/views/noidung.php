<?php require_once "./mvc/views/blocks/header.php"; ?>
    <div class="container mt-5">
        <div class="row mt-3"> 
            <div class="col-xl-3 col-md-5 col-sm-6 col-5" >
                <a>
                    <img src="<?php echo $data['hinhphim']; ?>" class="d-block w-100" alt="...">
                </a> 
            </div>
            <div class="col-xl-5 col-md-7 col-sm-6 col-7">
                <h4 style="text-transform:uppercase"><?php echo $data['tenphim']; ?></h4>
                
                <p>C<?php echo $data['gioihantuoi']; ?> <span><?php echo $data['thoiluong']; ?> phút</span></p>
                <p>Diễn viên: <?php echo $data['dienvien']; ?></p>
                <p>Đạo diễn: <?php echo $data['daodien']; ?></p>
                <p>Ngày công chiếu: <?php echo $data['ngaycongchieu']; ?></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="list-product-subtitle film-text">
                <p>
                    <a>NỘI DUNG PHIM</a>
                </p>
                <hr class="bottom-text-1">
            </div>
            <div class="col-xl-8">
                <p>
                    <?php echo $data['noidung']; ?>
                </p>
            </div>
        </div>
    </div>
<?php require_once "./mvc/views/blocks/footer.php"; ?>