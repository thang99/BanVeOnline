<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-5">
            <form class="d-flex">
                <input class="form-control me-2" id="datesc1" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Chọn từ ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-5 col-sm-5 col-5"> 
            <form class="d-flex">
                <input class="form-control me-2" id="datesc2" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Đến ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-2 col-sm-2 col-2">
        <button type="submit" id="submittksc" name="submit" class="btn btn-primary btn-block">Thống kê</button>
        </div>
        <div class="col-md-3 col-sm-12 col-12 mt-3"> 
            <form class="d-flex">
                <select name="tenphim" id="tenphim" class="form-control me-2">
                <option value="">Tất cả</option>
                    <?php for($i = 1; $i <= 10; $i++) { ?>
                        <option value="<?php echo $i; ?>">Top <?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id="adminthongkesuatchieu">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID Hóa Đơn</th>
                    <th scope="col">ID Suất Chiếu</th>
                    <th scope="col">Ngày lập hóa đơn</th>
                    <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php require_once './mvc/views/admins/blocks/footer.php' ?>
<?php 
    }
?>