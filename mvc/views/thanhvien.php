    <?php require_once "./mvc/views/blocks/header.php"; ?>
    <div class="container mt-5" id="msg">
        <div class="row">
            <div class="list-product-subtitle film-text">
                <p>
                    <a href="thanhvien" style="font-weight:500">THỂ LỆ</a>
                    <a href="javascript:Loadthanhvien2();" style="font-weight:100; color:black">QUYỀN LỢI</a>
                    <?php if(!isset($_SESSION['usersEmail'])) { ?>
                    <a href="User/Action" style="font-weight:100">ĐĂNG KÝ</a>
                    <?php } ?>
                </p>
                <hr class="bottom-text">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-9 col-sm-4 col-6 mt-3">

                <h4>THỂ LỆ</h4>
                <p>
                Chương trình khách hàng thân thiết Galaxy là chương trình ưu đãi dựa trên điểm tích lũy 
                của các thành viên gồm Star, G-star, X-star. Với mỗi giao dịch tại hệ thống rạp Galaxy, bạn sẽ nhận 
                được điểm thưởng tương ứng. Hình thức tích lũy như sau: Xem thêm tại: 
                </p>
                <img src="./public/images/thele1.jpg" class="d-block w-75" alt="">
                <h4>Cách làm tròn điểm thưởng:</h4>
                <p>
                Từ 0.1 đến 0.4: làm tròn xuống (Ví dụ: 3.2 sao sẽ được tích vào tài khoản 3 sao)
                </p>
                <p>
                Từ 0.5 đến 0.9: làm tròn lên (Ví dụ: 3.5 sao sẽ được tích vào tài khoản 4 sao)
                </p>        

                <h4>Cấp độ thành viên:</h4>
                <img src="./public/images/thele2.jpg" class="d-block w-75" alt="">
                <p>
                Star là thành viên thân thiết có tổng chi tiêu trong năm dưới 2,000,000 đồng tính từ ngày 1/1-31/12.
                </p>
                <p>
                G-star là thành viên thân thiết có tổng chi tiêu trong năm từ 2,000,000 đồng đến 3,999,999 
                đồng tính từ ngày 1/1-31/12.
                </p>
                <p>
                X-star là thành viên thân thiết có tổng chi tiêu từ 4,000,000 đồng trở lên tính từ ngày 1/1-31/12.
                </p>

                <h4>Chính sách đổi quà:</h4>
                <img src="./public/images/thele3.jpg" class="d-block w-75" alt="">
                <h4>Lưu ý:</h4>
                <p>
                    <ul>
                        <li>
                            <p>
                                Thông tin định danh thành viên gồm có email và số điện thoại bắt buộc phải hợp lệ.
                            </p>
                        </li>
                        <li>
                            <p>
                                Email không hợp lệ là email không có thực tại thời điểm iLazy Cinema rà soát dữ liệu thành viên.
                            </p>
                        </li>
                        <li>
                            <p>
                                Số điện thoại không hợp lệ là số điện thoại không liên lạc được hoặc số điện thoại không thuộc 
                                sở hữu của chủ tài khoản thành viên ở thời điểm iLazy Cinema rà soát dữ liệu thành viên.
                            </p>
                        </li>
                        <li>
                            <p>
                                Với các trường hợp không hợp lệ, iLazy Cinema có quyền xóa tài khoản thành viên mà không cần thông 
                                báo trước.
                            </p>
                        </li>
                        <li>
                            <p>
                                Tài khoản thành viên không có đủ thông tin định danh gồm email và số điện thoại hợp lệ, 
                                iLazy Cinema có quyền xóa tài khoản thành viên mà không cần thông báo trước.
                            </p>
                        </li>
                        <li>
                            <p>
                                Điểm tích lũy có giá trị áp dụng tại tất cả các rạp iLazy Cinema trên toàn quốc.
                            </p>
                        </li>
                        <li>
                            <p>
                                Điểm tích lũy có thời hạn sử dụng là 01 năm (tính từ ngày 01/01/2021-31/12/2021)
                            </p>
                        </li>
                        <li>
                            <p>
                                Điểm tích lũy sẽ bị trừ sau mỗi lần đổi quà.
                            </p>
                        </li>
                        <li>
                            <p>
                                Không giới hạn số lượng quà tặng được đổi.
                            </p>
                        </li>
                        <li>
                            <p>
                                Bạn có thể dễ dàng kiểm tra điểm tích lũy của mình trên Website iLazy Cinema hoặc 
                                Ứng dụng GLX trên điện thoại (Mobile App).
                            </p>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <?php require_once "./mvc/views/blocks/footer.php"; ?>
