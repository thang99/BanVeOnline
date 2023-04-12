 
$(document).ready(function() {
    var soluong = '';
    $(document).on('click',  '.thanhtoan', function() {
        var idrap = $(this).attr('id');
        var idsuatchieu = $(this).attr('value');
        var idphong = $(this).attr('name');
        soluong = $(this).attr('for');
        var sogheconlai = $(this).attr('type');
        if(soluong > 0) {
            Load_data_ghe(idrap, idphong, soluong, idsuatchieu);
        }
        if(sogheconlai < 1) {
            alert('Hết vé');
        } else if(sogheconlai >= 1 && soluong == 0) {
            alert('Hãy mua vé');
        }
    }); 
    $(document).on('click',  '#chuathanhtoan', function() {
        alert("Hãy mua vé");
    });
    $(document).on('click',  '#quaylai', function() {
        location.reload();
    });
    $(document).on('click',  '.thanhtoan1', function() {
        var count = $(this).attr('type');
        var idsuatchieu = $(this).attr('id');
        var tongtien = $("#tongtien").html();
        if(arrid.length < count ) {
            alert("vui lòng chọn đủ "+count+" ghế");
        } else {
            if(confirm("Bạn có chắc muốn thanh toán hóa đơn ???(Sau khi thanh toán không thể đổi trả)")) {
                Load_data_thanhtoan(idsuatchieu, tongtien);
            }
        }
    });
    $(document).on('click',  '.chonghe', function() {
        var varid = $(this).attr('id');
        var varfor = $(this).attr('for');
        myfunc(varid, varfor, soluong);
   });
});
function Load_data_ghe(idrap, idphong, soluong, idsuatchieu) {
    $.post("./Ajax/giohang2", {idrap:idrap, idphong:idphong, idsuatchieu:idsuatchieu}, function(data) {
        $("#showghe").html(data);
        $("#nutthanhtoan").html("<button style='width:125px' id='quaylai'>QUAY LẠI</button>"
        +"<button style='width:125px' type='"+soluong+"' id='"+idsuatchieu+"' name ='"+idphong+"' class='thanhtoan1'>THANH TOÁN</button>")
    });
}
function Load_data_thanhtoan(idsuatchieu, tongtien) {
    $.post("./Ajax/thanhtoan", {data:JSON.stringify(arrid), idsuatchieu:idsuatchieu, tongtien:tongtien} , function(data) {
        if(data) {
            location.href="chitietve";
        }
    });
}
arr=[];
arrid=[];
function myfunc(varid, varfor, soluong1) {
    let ans = varfor;
    let id = varid;
    let position = arrid.indexOf(id);
    let position1 = arr.indexOf(ans);
    if(arrid.length < soluong1) {
        if(position==-1) {
            arrid.push(id);
            $("#"+id+"").css("background-color", "#7dc71d");
        }
    } 
    if(position != -1) {
        $("#"+id+"").css("background-color", "#dbdee1");
        arrid.splice(arrid.indexOf(id), 1);
    }

    if(arr.length < soluong1) {
        if(position1==-1) {
            arr.push(ans);
        }
    }
    if(position1!=-1) {
        arr.splice(arr.indexOf(ans), 1);
    }
    console.log(arrid);
    console.log(arr);
    final_no = arr.join(",");
    console.log(final_no);
    $("#ghe").html(final_no);
    $("#ghe1").html(final_no);
    console.log(soluong1);
}
