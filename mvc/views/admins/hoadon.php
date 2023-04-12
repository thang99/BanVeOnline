<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
    <div class="row">
    <div class="col-md-5 col-sm-5 col-5">
            <form class="d-flex">
                <input class="form-control me-2" id="datehd3" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Chọn từ ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-5 col-sm-5 col-5"> 
            <form class="d-flex">
                <input class="form-control me-2" id="datehd3" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Đến ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-2 col-sm-2 col-2">
        <button type="submit" id="submithd" name="submit" class="btn btn-primary btn-block">Tìm</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id = "adminhoadon">
         
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detailhd" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Thông tin hóa đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-reponsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:25%">ID Hóa Đơn</th>
                            <td><span id="idhoadon"></span></td>
                        </tr>
                        <tr>
                            <th>Tên khách hàng</th>
                            <td><span id="tenkh"></span></td>
                        </tr>
                        <tr>
                            <th>Tên phim</th>
                            <td><span id="tenphim"></span></td>
                        </tr>
                        <tr>
                            <th>Tên rạp</th>
                            <td><span id="tenrap"></span></td>
                        </tr>
                        <tr>
                            <th>Tên phòng</th>
                            <td><span id="tenphong"></span></td>
                        </tr>
                        <tr>
                            <th>Ghế ngồi</th>
                            <td><span id="ghe"></span></td>
                        </tr>
                        <tr>
                            <th>Thực phẩm</th>
                            <td><span id="thucpham"></span></td>
                        </tr>
                       
                        

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

<?php require_once './mvc/views/admins/blocks/footer.php' ?>
<?php 
    }
?>