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
                <input class="form-control me-2" type="search" placeholder="Search" id="sear" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id="admintaikhoan">
        
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
            echo 'alert("Sửa tài khoản thành công")';
            echo '</script>';
    }
    if(isset($data['chuyen'])) {
        echo '<script language="javascript">';
            echo 'location.href="Admintaikhoan"';
            echo '</script>';
    }
?>
