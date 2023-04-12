<?php
    if(isset($_SESSION["usersEmail"])) 
    {
        header("location: http://localhost/DoAnWeb2/Home");
    }
?>
<?php require_once "./mvc/views/blocks/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6">
                <div class="list-product-subtitle film-text">
                    <p>
                        <a>Login</a>
                    </p>
                    <hr class="bottom-text-1">
                </div>
                <form id="LoginForm" method="POST">
                    <input type="text" name="emailLogin" id="loginEmail" placeholder="Email">
                    <small id="messageUnLogin"></small>
                    <br/>
                    <input type="password" name="passwordLogin" id="loginPwd" placeholder="Mật khẩu">
                    <small id="messagePwdLogin"></small>
                    <br/>
                    <button type="button" id="btnLogin" name="btnLogin" class="btn-login">Login</button>
                    <br/>
                    <a href="">Forgot password</a>
                </form>
                <div id="Error" style="margin-left: 150px"></div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-6">
                <div class="list-product-subtitle film-text">
                    <p>
                        <a>Register</a>
                    </p>
                    <hr class="bottom-text-1">
                </div>
                    <form action="./User/Khachhangdangky" id="RegForm" method="POST">
                        <input type="text" name="username" id="usersName" placeholder="Họ tên" value="<?php echo $data['username'];?>" <?php if(!empty($data['usernameError'])) echo "autofocus" ?>>
                        <small id="messageHt" class="invalidFeedback" style="color:red">
                            <?php echo $data['usernameError']; ?>
                        </small>
                        <br/>
                        <input type="email" name="email" id="usersEmail" placeholder="Email" value="<?php echo $data['email'];?>" <?php if(!empty($data['emailError'])) echo "autofocus" ?>>
                        <small id="messageUn" class="invalidFeedback" style="color:red">
                            <?php echo $data['emailError']; ?>
                        </small>
                        <br/>
                        <input type="password" name="password" id="usersPwd" placeholder="Mật khẩu" <?php if(!empty($data['passwordError'])) echo "autofocus" ?>>
                        <small id="messagePwd" class="invalidFeedback" style="color:red">
                            <?php echo $data['passwordError']; ?>
                        </small>
                        <br/>
                        <input type="password" name="confirmPassword" id="usersPwd1" placeholder="Xác nhận mật khẩu" <?php if(!empty($data['confirmpasswordError'])) echo "autofocus" ?>>
                        <small id="messagePwd1" class="invalidFeedback" style="color:red">
                            <?php echo $data['confirmpasswordError']; ?>
                        </small>
                        <br/>
                        <input type="text" name="diachi" id="usersDc" placeholder="Địa chỉ" value="<?php echo $data['diachi'];?>" <?php if(!empty($data['diachiError'])) echo "autofocus" ?>>
                        <small id="messageDc" class="invalidFeedback" style="color:red">
                            <?php echo $data['diachiError']; ?>
                        </small>
                        <br/>
                        <input type="text" name="sodienthoai" id="usersSdt" placeholder="Số điện thoại" value="<?php echo $data['sodienthoai'];?>" <?php if(!empty($data['sodienthoaiError'])) echo "autofocus" ?>>
                        <small id="messageSdt" class="invalidFeedback" style="color:red">
                            <?php echo $data['sodienthoaiError']; ?>
                        </small>
                        <br/>
                        <input type="text" name="ngaysinh" id="usersNs" placeholder="Ngày sinh" value="<?php echo $data['ngaysinh'];?>" <?php if(!empty($data['ngaysinhError'])) echo "autofocus" ?>>
                        <small id="messageNs" class="invalidFeedback" style="color:red">
                            <?php echo $data['ngaysinhError']; ?>
                        </small>
                        <br/>
                        <button type="submit" name="btnRegister" class="btn-login">Register</button>
                    </form>
            </div>
        </div>
    </div>
<?php require_once "./mvc/views/blocks/footer.php"; ?>

<?php
        if(isset($data['home'])) {
            
            echo '<script language="javascript">';
            echo 'alert("Đăng ký thành công")';
            echo '</script>';
        }
        if(isset($data['chuyen'])) {
            
            echo '<script language="javascript">';
            echo 'location.href="User/Action"';
            echo '</script>';
        }
        
    ?>
