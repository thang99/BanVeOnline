<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/DoAnWeb2/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.css" >
    <link rel="stylesheet" href="./public/css/main.css" >
    <style>
        <?php require_once "./public/css/muave.css"; ?>
        <?php require_once "./public/css/login.css"; ?>
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
    <style>
	

.phimhover {
  position: relative;
}
.phimhover2 {
  position: relative;
}
.phimhover:hover{
    transition: all ease-in-out 0.5s;
}
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 480px;
  width: 81%;
  opacity: 0;
  transition: .5s ;
}

 .phimhover:hover .overlay {
  opacity: 1;
}
.phimhover:hover .anh{
	opacity: 0.7;		
		}

.text {
  color: white;
  background-color: orange;
  font-size: 20px;
  position: absolute;
  top: 65%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.txt12 {
	 color: red;
  font-size: 20px;
  position: absolute;
  top: 15%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
 

    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index:100000000">
        <div class="container">
            <a class="navbar-brand active" href="Home" style="color:black ;font-weigth:400">iLazy cinema</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="muave">Mua Vé</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="phim/Show">Thể Loại Phim</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="giave">Giá Vé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="thanhvien">Thành Viên</a>
                    </li>
                    <?php 
                        $s="";
                        if(isset($_SESSION['usersEmail'])) { 
                            $quyen=$_SESSION['maquyen2'];                            
                            if ($quyen == "KH"){
                                $s=$s."<li class='nav-item'>
                                <a class='nav-link' aria-current='page' href='lichsu'>Lịch sử đơn hàng</a>
                            </li>";
                            }
                            else{
                                $s=$s."<li class='nav-item'>
                                <a class='nav-link' aria-current='page' href='http://localhost/DoAnWeb2/Adminphim'>Trang quản trị</a>
                            </li>"; 
                            }
                            echo $s;
                        } 
                    ?>
                </ul>
                <form class="d-flex" action="phim/Show" id="oksearch" method="post">
                    <input class="form-control me-2" id="search-box" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" id="enter-box" type="submit">Search</button>
                </form>
                <?php
                    if(!isset($_SESSION['usersEmail'])) {
                ?>
                <ul class="navbar-nav mb-2 mb-lg-0" style="margin-right: -60px; margin-left: 60px">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="User/Action" id="show-login" style="cursor: pointer;" >Đăng nhập</a>
                    </li>
                </ul>
                <?php
                    } else {
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown">Chào <?php echo $_SESSION['name']; ?></a>
                        <ul class="dropdown-content" >
                                
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout">Thoát</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>