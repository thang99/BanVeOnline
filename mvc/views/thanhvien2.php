    
    <div class="container mt-5">
        <div class="row">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="thanhvien" style="font-weight:100">THỂ LỆ</a>
                    <a href="javascript:Loadthanhvien2();" style="font-weight:500">QUYỀN LỢI</a>
                    <?php if(!isset($_SESSION['usersEmail'])) { ?>
                    <a href="User/Action" style="font-weight:100">ĐĂNG KÝ</a>
                    <?php } ?>
                </p>
                <hr class="bottom-text">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-9 col-sm-4 col-6 mt-3">
                <h4>Quyền lợi chính:</h4>
                <img src="./public/images/quyenloi.jpg" class="d-block w-75" alt="">
                <h4>Chú ý</h4>
                <p>
                    <ul>
                        <li>
                            <p>
                                Quà tri ân sẽ được trao vào cuối năm cho thành viên X-Star
                            </p>
                        </li>
                    </ul>
                </p>
                <h4>Quyền lợi khác:</h4>
                <p>
                    <ul>
                        <li>
                            <p>
                            Tham dự buổi công chiếu ra mắt cùng các sao: cơ hội cùng các ngôi sao nổi 
                            tiếng tham dự buổi ra mắt phim.
                            </p>
                        </li>
                        <li>
                            <p>
                            Nhận quà tặng độc đáo vào các ngày lễ lớn như Valentine, 8/3…
                            </p>
                        </li>
                        <li>
                            <p>
                            Cơ hội nhân đôi/nhân ba điểm tích lũy nhân các sự kiện đặc biệt
                            </p>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>