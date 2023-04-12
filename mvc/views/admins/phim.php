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
        <div class="col-md-12 col-sm-12 col-12 mt-5" id="adminphim">
        
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin phim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-reponsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Hình phim</th>
                            <td><img src="" alt=""  width="30%"  id="hinhphim"></td>
                        </tr>
                        <tr>
                            <th style="width:25%">IDphim</th>
                            <td><span id="idphim"></span></td>
                        </tr>
                        <tr>
                            <th>Tên phim</th>
                            <td><span id="tenphim"></span></td>
                        </tr>
                        <tr>
                            <th>Thể loại</th>
                            <td><span id="idtheloai"></span></td>
                        </tr>
                        <tr>
                            <th>Nội dung</th>
                            <td><span id="noidung"></span></td>
                        </tr>
                        <tr>
                            <th>Thời lượng</th>
                            <td><span id="thoiluong"></span></td>
                        </tr>
                        <tr>
                            <th>Ngày công chiếu</th>
                            <td><span id="ngaycongchieu"></span></td>
                        </tr>
                        <tr>
                            <th>Đạo diễn</th>
                            <td><span id="daodien"></span></td>
                        </tr>
                        <tr>
                            <th>Diễn viên</th>
                            <td><span id="dienvien"></span></td>
                        </tr>
                        <tr>
                            <th>Định dạng phim</th>
                            <td><span id="dinhdangphim"></span></td>
                        </tr>
                        <tr>
                            <th>Giới hạn tuổi</th>
                            <td><span id="gioihantuoi"></span></td>
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
<?php
    if(isset($data['sua'])) {
        echo '<script language="javascript">';
            echo 'alert("Sửa phim thành công")';
            echo '</script>';
    }
    if(isset($data['chuyen'])) {
        echo '<script language="javascript">';
            echo 'location.href="Adminphim"';
            echo '</script>';
    }
?>