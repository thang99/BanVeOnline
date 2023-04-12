<?php 
            require_once "./mvc/views/blocks/header.php";
        ?>  
    
    


        <?php 
            require_once "./mvc/views/blocks/slider.php";
        ?> 






    <div class="container" id="phim1">
        <div class="row mt-5">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="javascript:void(0)" class="active" style="color:red" onclick="phim1();" >PHIM ĐANG CHIẾU</a>
                    <a href="javascript:void(0)" onclick="phim2();">PHIM SẮP CHIẾU</a>
                </p>
                <hr class="bottom-text">
            </div>
        </div>
        <div class="row mt-3">
			
            <?php $count = 0;  foreach($data['datas'] as $row) {  if($count < 6) { ?>
                <div class="col-md-4 col-sm-4 col-6 mt-3 phimhover">
				<img src="<?php echo $row['hinhphim']; ?>" class="d-block anh" alt="..." width="88%" height="480px">
				<a href="phim/Noidung/<?php echo $row['IDphim']; ?>"><div class="overlay">
                
                </div>
                </a>
            </div>
            <?php $count++;} } ?>
																												 
        </div>
        <div class="clearfix"></div>
        <?php if($count >= 6) { ?>
        <div class="mt-5 float-end">
        </div>
        <div class="clearfix"></div>
        <?php } else { ?>
            <div class="mt-5 float-end">
            </div>
        <div class="clearfix"></div>
        <?php } ?>
    </div>
    <div class="container none" id="phim2" style="display:none">
        <div class="row mt-5">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="javascript:void(0)" onclick="phim1();">PHIM ĐANG CHIẾU</a>
                    <a href="javascript:void(0)" class="active" style="color:red" onclick="phim2();">PHIM SẮP CHIẾU</a>
                </p>
                <hr class="bottom-text">
            </div>
        </div>
        <div class="row mt-3">
			
            <?php $count = 0;  foreach($data['datass'] as $row1) {  if($count < 6) { ?>
                <div class="col-md-4 col-sm-4 col-6 mt-3 phimhover">
				<img src="<?php echo $row1['hinhphim']; ?>" class="d-block anh" alt="..." width="88%" height="480px">
				<a href="phim/Noidung/<?php echo $row1['IDphim']; ?>"><div class="overlay">
                   
                </div>
                </a>
            </div>
            <?php $count++;} } ?>
																												 
        </div>
        <div class="clearfix"></div>
        <?php if($count >= 6) { ?>
        <div class="mt-5 float-end">
        </div>
        <div class="clearfix"></div>
        <?php } else { ?>
            <div class="mt-5 float-end">
            </div>
        <div class="clearfix"></div>
        <?php } ?>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="">iLazy CINEMA</a>
                </p>
                <hr class="bottom-text-1">
            </div>
        </div>
        <div class="row mt-1">
            <small class="text-small">
                <span>iLazy Cinema</span> là một trong những công ty tư nhân đầu tiên về điện ảnh được thành lập 
                từ năm 2022, đã khẳng định thương hiệu à một trong top 5 cụm rạp chiếu phim lớn nhất toàn cầu và là nhà phát hành, cụm rạp chiếu phim lớn nhất Việt Nam.Mục tiêu của chúng tôi là trở thành hình mẫu công ty điển hình đóng góp cho sự phát triển không ngừng của ngành công nghiệp điện ảnh Việt Nam.
                 <span>iLazy Cinema</span> còn hấp dẫn khán giả bởi không khí thân thiện cũng như chất lượng
                dịch vụ hàng đầu.<br/><br/> <span>iLazy Cinema</span> đã tạo nên khái niệm độc đáo về việc chuyển đổi rạp chiếu phim truyền thống thành tổ hợp văn hóa “Cultureplex”, nơi khán giả không chỉ đến thưởng thức điện ảnh đa dạng thông qua các công nghệ tiên tiến như SCREENX, IMAX, STARIUM, 4DX, Dolby Atmos, 
                cũng như thưởng thức ẩm thực hoàn toàn mới và khác biệt trong khi trải nghiệm dịch vụ chất lượng nhất tại <span>iLazy Cinema</span>.
                <br/><br/> 
                Thông qua những nỗ lực trong việc xây dựng chương trình Nhà biên kịch tài năng, Dự án phim ngắn CJ, Lớp học làm phim TOTO,
                CGV ArtHouse cùng việc tài trợ cho các hoạt động liên hoan phim lớn trong nước như Liên hoan Phim quốc tế Hà Nội, Liên hoan Phim Việt Nam,
                <span>iLazy Cinema</span> Việt Nam mong muốn sẽ khám phá và hỗ trợ phát triển cho các nhà làm phim trẻ tài năng của Việt Nam.
                <br/><br/> 
                <span>iLazy Cinema</span> cũng tập trung quan tâm đến đối tượng khán giả ở các khu vực không có điều kiện tiếp cận nhiều với điện ảnh, bằng cách tạo cơ hội để họ có thể thưởng thức
                những bộ phim chất lượng cao thông qua các chương trình vì cộng đồng như Trăng cười và Điện ảnh cho mọi người.
                <br/><br/> 
                <span>iLazy Cinema</span> sẽ tiếp tục cuộc hành trình bền bỉ trong việc góp phần xây dựng một nền công nghiệp điện ảnh Việt Nam ngày càng vững mạnh hơn cùng các khách hàng tiềm năng, 
                các nhà làm phim, các đối tác kinh doanh uy tín, và cùng toàn thể xã hội.
                <br/><br/>   
                <span>iLazy Cinema</span> luôn có những chương trình khuyến mãi, ưu đãi, quà tặng vô cùng hấp dẫn 
                như giảm giá vé, tặng vé xem phim miễn phí, tặng Combo, tặng quà phim…  dành cho quý khách.<br/><br/> Trang web 
                iLazy.vn còn có mục Góc Điện Ảnh - sở hữu lượng dữ liệu về phim, diễn viên và đạo diễn, giúp quý 
                khách dễ dàng chọn được phim mình yêu thích và nâng cao kiến thức về điện ảnh của bản thân. Ngoài ra, 
                vào mỗi tháng, <span>iLazy Cinema</span> cũng giới thiệu các phim sắp chiếu hot nhất trong mục Phim Hay Tháng để quý khách 
                sớm có sự tính toán.<br/><br/> Hiện nay, <span>iLazy Cinema</span> đang ngày càng phát triển hơn nữa với các chương trình đặc sắc, 
                các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế giới và Việt Nam nhanh chóng và sớm 
                nhất.
            </small>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="">iLazy CINEMA</a>
                </p>
                <hr class="bottom-text-1">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-3 col-sm-4 col-6 mt-3 ">
                <img src="./public/images/Koylazy1.png" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy2.png" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy3.png" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy4.png" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy5.jfif" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy6.jpg" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy7.jpg" class="d-block w-100 anh1" alt="...">
            </div>
            <div class="col-md-3 col-sm-4 col-6 mt-3 phimhover2">
                <img src="./public/images/Koylazy8.jpg" class="d-block w-100 anh1" alt="...">
            </div>
        </div>
    </div>



    <?php require_once "./mvc/views/blocks/footer.php"; ?>

    <?php
        if(isset($data['home'])) {
            
            echo '<script language="javascript">';
            echo 'alert("Đăng ký thành công")';
            echo '</script>';
        }
        
    ?>