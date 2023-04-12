<?php 
    if(isset($_SESSION['idquyen'])) { 
            
?>
<?php require_once './mvc/views/admins/blocks/header.php' ?>

<div class="container">
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 mt-5" id = "adminpq">
         
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detailpq" tabindex="-1" aria-labelledby="exampleModalLabelpq" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelpq">Thông tin quyền</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-reponsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:25%">ID Quyền</th>
                            <td><span id="idquyen"></span></td>
                        </tr>
                        <tr>
                            <th>Tên quyền</th>
                            <td><span id="tenquyen"></span></td>
                        </tr>
                        <tr>
                            <th>Quản lý các danh mục</th>
                            <td><span id="qldm"></span></td>
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
    if(isset($data['home'])) {
        echo '<script language="javascript">';
            echo 'alert("Sửa quyền thành công")';
            echo '</script>';
    }
    if(isset($data['chuyen'])) {
        echo '<script language="javascript">';
            echo 'location.href="Adminphanquyen"';
            echo '</script>';
    }
?>
