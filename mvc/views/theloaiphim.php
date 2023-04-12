<?php require_once "./mvc/views/blocks/header.php"; ?>
<div>
    <div class="container mt-5">
        <div class="row mt-5">
        <div class="col-md-2 col-sm-12 col-12 "> 
            <form class="d-flex">
                <select name="tlp" id="tlp" class="form-control me-2">
                    <option value="">Tất cả</option>
                    <?php foreach($data['tl'] as $row) { ?>
                        <option value="<?php echo $row['IDtheloai']; ?>"><?php echo $row['tentheloai']; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
            <div class="list-product-subtitle film-text mt-2">
                <p>
                    <a>PHIM ĐIỆN ẢNH</a>
                </p>
                <hr class="bottom-text-1">
            </div>
            <div id="okok">
                
            </div>
        </div>
    </div>
</div>

<?php require_once "./mvc/views/blocks/footer.php"; ?>
