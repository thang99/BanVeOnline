<?php 
    if(isset($_SESSION['idquyen'])) { 
    class header extends Controller{

        function Action() {
            $this->QuyenModel = $this->model('QuyenModel');
            $datactq = $this->QuyenModel->getCTQid($_SESSION['idquyen']);
            $this->view("admins/blocks/header", [
                'listctq' => $datactq,
            ]);
        }

    }
?>
<!DOCTYPE HTML>
<html>

<head>
<base href="http://localhost/DoAnWeb2/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./public/css/admin.css">
    <script language="javascript" type="text/javascript" src="./public/js/jquery-3.6.0.min.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/jquery-ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- Font Awesome JS -->
    <script language="javascript" type="text/javascript" defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script language="javascript" type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>iLazy Cinema</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Hello Admin</p>
                <li>
                    <a href="Admin">Home</a>
                </li>
                <li>
                    <?php foreach($data['listctq'] as $row) { if($row['IDchucnang']=="CN0001") { ?>
                    <a href="#pageSubmenutk" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tài khoản</a>
                    <ul class="collapse list-unstyled" id="pageSubmenutk">
                        <li>
                            <a href="Admintaikhoan">Xem danh sách tài khoản</a>
                        </li>
                        <li>
                            <a href="Admintaotaikhoan">Thêm tài khoản</a>
                        </li>
                        <li>
                            <a href="Adminphanquyen">Phân quyền</a>
                        </li>
                        <li>
                            <a href="Admintaoquyen">Thêm quyền</a>
                        </li>
                    </ul>
                    <?php } } ?>
                </li>
                <li>
                    <?php foreach($data['listctq'] as $row) { if($row['IDchucnang']=="CN0002") { ?>
                    <a href="#pageSubmenup" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Phim</a>
                    <ul class="collapse list-unstyled" id="pageSubmenup">
                        <li>
                            <a href="Adminphim">Xem danh sách phim</a>
                        </li>
                        <li>
                            <a href="Admintaophim">Thêm phim</a>
                        </li>
                    </ul>
                    <?php } } ?>
                </li>
                <li>
                    <?php foreach($data['listctq'] as $row) { if($row['IDchucnang']=="CN0003") { ?>
                    <a href="#pageSubmenusc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Suất chiếu</a>
                    <ul class="collapse list-unstyled" id="pageSubmenusc">
                        <li>
                            <a href="Adminsuatchieu">Xem danh suất chiếu</a>
                        </li>
                        <li>
                            <a href="Admintaosuatchieu">Thêm suất chiếu</a>
                        </li>
                    </ul>
                    <?php } } ?>
                </li>
                <li>
                    <?php foreach($data['listctq'] as $row) { if($row['IDchucnang']=="CN0004") { ?>
                    <a href="Adminhoadon">Hóa đơn</a>
                    <?php } } ?>
                </li>
                <li>
                    <?php foreach($data['listctq'] as $row) { if($row['IDchucnang']=="CN0005") { ?>
                    <a href="#pageSubmenutkhd" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thống kê</a>
                    <ul class="collapse list-unstyled" id="pageSubmenutkhd">
                        <li>
                            <a href="Adminthongketheorap">Thống kê tình hình kinh doanh theo rạp</a>
                        </li>
                        <li>
                            <a href="Adminthongkesuatchieu">Thống kê suất chiếu</a>
                        </li>
                    </ul>
                    <?php } } ?>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="Adminlogout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<?php 
    }
?>