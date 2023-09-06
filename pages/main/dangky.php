<?php
ob_start(); // bắt đầu bộ đệm đầu ra
$found = false;
if(isset($_POST['dangky'])){
    $hovaten = $_POST['hovaten'];
    $tentaikhoan = $_POST['tentaikhoan'];
    $matkhau = md5($_POST['matkhau']);
    $nhaplaimatkhau = md5($_POST['nhaplaimatkhau']);
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];


    $check_usn = "SELECT * FROM tbl_dangky WHERE tentaikhoan = '".$tentaikhoan."'";
    //echo $check_usn;
    $query_usn = mysqli_query($mysqli, $check_usn);
    $count = mysqli_num_rows($query_usn);

    if($count > 0){
        $found = true;
    }else{
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(hovaten,tentaikhoan,matkhau,nhaplaimatkhau,email,sodienthoai) 
        VALUE('".$hovaten."','".$tentaikhoan."','".$matkhau."','".$nhaplaimatkhau."','".$email."','".$sodienthoai."') ");
        if($sql_dangky){
            $_SESSION['dk'] = 1;
            header('Location:index.php?quanly=dangnhap');
          
        }
    }

    
}
?>
<div class="row">
  <div class="d-flex justify-content-center h-500 pt-3">
    <div class="card " id="card_dk">
      <div class="card-header ">
        <h3>Đăng Ký</h3>
        
      </div>
      <div class="card-body">

                <form method="POST" id="dangky">
                    <div class="form-group mb-3">
                        <label for="hovaten">Họ và tên:</label>
                        <input type="text" class="form-control" id="hovaten" name="hovaten" >
                    </div>

                    <div class="form-group mb-3">
                        <label for="tentaikhoan">Tên tài khoản:</label>
                        <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan">
                        <?php if($found == true){ ?><lable class="error">Tên tài khoản đã có người sử dụng!!!</lable><?php } ?>

                    </div>

                    <div class="form-group mb-3">
                        <label for="pwd">Mật khẩu:</label>
                        <input type="password" class="form-control" id="pwd" name="matkhau">

                    </div>

                    <div class="form-group mb-3">
                        <label for="re_pwd">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control" id="re_pwd" name="nhaplaimatkhau">

                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"  >

                    </div>

                    <div class="form-group mb-3">
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai">

                    </div>

                    <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
                </form>
                </div>
     
     </div>
   </div>
 </div>

<script>
	$(document).ready(function (){
        $("#dangky").validate({
            rules:{
                hovaten: {required: true},
                tentaikhoan: {required: true, minlength:5, maxlength:20 },
                matkhau:{required: true, minlength:8, maxlength:20},
                nhaplaimatkhau: {required: true, equalTo: "#pwd"},
                email: {required: true},
                sodienthoai: {required: true, number: true, minlength:10, maxlength:10},
                
            },
            messages:{
                hovaten: {required: "Họ và tên không được để trống!"},
                tentaikhoan: {required: "Tên tài khoản không được bỏ trống", minlength:"Tên tài khoản tối thiểu 5 ký tự", maxlength:"Tên tài khoản tối đa 20 ký tự"},
                matkhau:{required:"Mật khẩu không được bỏ trống", minlength:"Mật khẩu tối thiểu 8 ký tự", maxlength:"Mật khẩu tối đa 20 ký tự"},
                nhaplaimatkhau: {required: "Mật khẩu không được bỏ trống", equalTo: "Mật Khẩu chưa trùng"},
                email: {required: "Email không được bỏ trống", email: "Vui lòng nhập đúng định dạng"},
                sodienthoai: {required: "Số điện thoại không được trống", number: "Vui lòng chỉ nhập số", minlength:"số điện thoại phải có 10 số", maxlength:"số điện thoại phải có 10 số"},
            }
        })
    });
</script>
    
