<?php unset($_SESSION['cart']); unset($_SESSION['cartve']); unset($_SESSION['idsuatchieu']); unset($_SESSION['ghe']); ?>
<?php require_once "./mvc/views/blocks/header.php"; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="bor-ve">
                <div class="panel">
                    <h4>CHỌN PHIM</h4>
                </div>
                <div class="list-group-film">
                    <ul>
                        <?php
                            foreach($data['datas'] as $data) {
                        ?>
                            <a href="<?php echo $data['IDphim']; ?>" class='vefilm-link'>
                                <img src="<?php echo $data['hinhphim'] ?>" class='' style="float:left;display:inlin-block; width: 10%; margin-left:20px;margin-top:"  alt="...">
                                <span class='span-film'><?php echo $data['gioihantuoi']; ?></span>
                                <li>
                                    <span style='padding-bottom:20px'><?php echo $data['tenphim']; ?></span>
                                </li>
                            </a>
                            <div style='clear:both;'></div>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bor-ve">
                <div class="panel">
                    <h4>CHỌN RẠP</h4>
                </div>
                <div class="list-group-film" id = 'rap'>
                        <ul>
                            <li>
                                Vui lòng chọn rạp
                            </li>
                        </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bor-ve">
                <div class="panel">
                    <h4>CHỌN SUẤT</h4>
                </div>
                <div class="list-group-film film-suat" id="suat">
                        <ul>
                            <li>
                                Vui lòng chọn suất
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "./mvc/views/blocks/footer.php"; ?>