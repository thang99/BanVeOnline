<?php require_once "./mvc/views/blocks/header.php"; ?>
    
<div class="container mt-5">
    <div class="row">
    <div class="col-md-5 col-sm-5 col-5">
            <form class="d-flex">
                <input class="form-control me-2" id="datels" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Chọn từ ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-5 col-sm-5 col-5"> 
            <form class="d-flex">
                <input class="form-control me-2" id="datels1" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Đến ngày này" aria-label="Search">
            </form>
        </div>
        <div class="col-md-2 col-sm-2 col-2">
        <button type="submit" id="submitls" name="submit" class="btn btn-primary btn-block">Tìm</button>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id="lichsu">
        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Số thứ tự</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Tên phim</th>
                                <th scope="col">Tên rạp</th>
                                <th scope="col">Tên phòng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Xem chi tiết</th>
                                </tr>
                            </thead>
                            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detaills" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin: 10vh auto 0px auto">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Chi tiết hóa đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-reponsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Tên khách hàng</th>
                            <td><span id="tenkh1"></span></td>
                        </tr>
                        <tr>
                            <th style="width:25%">Số điện thoại</th>
                            <td><span id="idhoadon1"></span></td>
                        </tr>
                        <tr>
                            <th>Tên phim</th>
                            <td><span id="tenphim1"></span></td>
                        </tr>
                        <tr>
                            <th>Tên rạp</th>
                            <td><span id="tenrap1"></span></td>
                        </tr>
                        <tr>
                            <th>Tên phòng</th>
                            <td><span id="tenphong1"></span></td>
                        </tr>
                        <tr>
                            <th>Ghế ngồi</th>
                            <td><span id="ghe1"></span></td>
                        </tr>
                        <tr>
                            <th>Thực phẩm</th>
                            <td><span id="thucpham1"></span></td>
                        </tr>
                       
                        

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<script language="javascript" src="./public/js/main2.js"></script>
    <script language="javascript" src="./public/js/okokok.js"></script>
    <script language="javascript" src="./public/js/rap.js"></script>
    <script language="javascript" src="./public/js/tongtien2.js"></script>
    <script language="javascript" src="./public/js/chonghe.js"></script>
    <script language="javascript" src="./public/js/kiemtradangnhap.js"></script>
    <script language="javascript" src="./public/js/lichsugiohang1.js"></script>