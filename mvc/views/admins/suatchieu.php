<?php 
    if(isset($_SESSION['idquyen'])) { 
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>


<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-4 col-4">
            <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-7 col-sm-8 col-8">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id="adminsuatchieu">
        
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detailsc" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Thông tin suất chiếu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-reponsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:25%">ID Suất Chiếu</th>
                            <td><span id="idsuatchieu"></span></td>
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
                            <th>Ngày chiếu</th>
                            <td><span id="ngaychieu"></span></td>
                        </tr>
                        <tr>
                            <th>Giờ bắt đầu</th>
                            <td><span id="giobatdau"></span></td>
                        </tr>
                        <tr>
                            <th>Giờ kết thúc</th>
                            <td><span id="gioketthuc"></span></td>
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