<?php require_once "./mvc/views/blocks/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 col-12 mt-5" style="text-align:center"><span style="font-size:35px; font-weight:500">Chi tiết vé</span></div>
        <hr width="100%" style="border:1px solid black">
        <div class="col-md-3 col-9 mt-5"><span style="font-size:25px; font-weight:500">Tên khách hàng:</span></div>
        <?php if(isset($_SESSION['IDkhachhang'])) { ?>
            <div class="col-md-9 col-9 mt-5"><span style="font-size:25px; font-weight:300"><?php echo $data['datakh']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-5"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Số điện thoại:</span></div>
        <?php if(isset($_SESSION['IDkhachhang'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300"><?php echo $data['datakh1']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Tên phim:</span></div>
        <?php if(isset($_SESSION['idsuatchieu'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300"><?php echo $data['datap']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Tên rạp:</span></div>
        <?php if(isset($_SESSION['idsuatchieu'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300"><?php echo $data['datap1']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Tên phòng:</span></div>
        <?php if(isset($_SESSION['idsuatchieu'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300"><?php echo $data['datap2']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Ngày chiếu:</span></div>
        <?php if(isset($_SESSION['idsuatchieu'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300"><?php echo $data['datap3']; ?></span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Ghế ngồi:</span></div>
        <?php if(isset($_SESSION['ghe'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300">
            <?php foreach($_SESSION['ghe'] as $keys => $values ) { ?>
                <?php echo $values[$_SESSION['idsuatchieu']].', '; ?>
            <?php } ?>
            </span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-3 col-9 mt-3"><span style="font-size:25px; font-weight:500" >Thực phẩm:</span></div>
        <?php if(isset($_SESSION['cart'])) { ?>
            <div class="col-md-9 col-9 mt-3"><span style="font-size:25px; font-weight:300">
            <?php foreach($_SESSION['cart'] as $keys => $values) { ?>
                <?php echo $values['tenthucpham'].' ','('.$values['soluong'].')'.', '; ?>
            <?php } ?>
            </span></div>
        <?php } else { ?>
            <div class="col-md-9 col-9 mt-3"></div>
        <?php } ?>
        <div class="col-md-122 col-12" style="text-align:right"><span style="font-size:25px; font-weight:500; color:red">Lưu ý: khi đến quầy thu ngân bạn cần đưa ra hóa đơn online này để lấy vé và thức ăn!!!</span></div>
        <div class="col-md-122 col-12" style="text-align:right"><span style="font-size:25px; font-weight:500; color:green">Bạn có thể xem lại hóa đơn trong lịch sử đơn hàng !!!</span></div>
    </div>
</div>

<?php require_once "./mvc/views/blocks/footer.php"; ?>
