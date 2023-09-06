<?php
    if(isset($_POST['doimatkhau'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhaucu = md5($_POST['matkhaucu']);
        $matkhaumoi = md5($_POST['matkhaumoi']);
        $nhaplaimatkhaumoi = md5($_POST['nhaplaimatkhaumoi']);
        $sql = "SELECT * FROM tbl_dangky WHERE tentaikhoan='".$tentaikhoan."' AND matkhau='".$matkhaucu."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET  matkhau='".$matkhaumoi."', nhaplaimatkhau='".$nhaplaimatkhaumoi."'  " );
           echo '<div id="echo"><h3>Đã thay đổi mật khẩu<h3></div>';
        }else{
            echo '<div id="echo"><h3>Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại!<h3></div>';
        }
    }
?>

<div class="row">
  <div class="d-flex justify-content-center h-500 pt-3">
    <div class="card " id="card_dk">
      <div class="card-header ">
        <h3>Thay Đổi Mật Khẩu</h3>
        
      </div>
      <div class="card-body">

                <form method="POST" id="doimatkhau">

                    <div class="form-group mb-3">
                        <label for="tentaikhoan">Tên tài khoản:</label>
                        <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan">
                       

                    </div>

                    <div class="form-group mb-3">
                        <label for="mk">Mật khẩu cũ:</label>
                        <input type="text" class="form-control" id="mk" name="matkhaucu">

                    </div>

                    <div class="form-group mb-3">
                        <label for="pwdc">Mật khẩu mới:</label>
                        <input type="password" class="form-control" id="pwdc" name="matkhaumoi">

                    </div>

                    <div class="form-group mb-3">
                        <label for="re_pwdc">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control" id="re_pwdc" name="nhaplaimatkhaumoi">

                    </div>

                   

                    <button type="submit" class="btn btn-primary" name="doimatkhau">Đổi mật khẩu</button>
                </form>
                </div>
     
     </div>
   </div>
 </div>
 <script>
	$(document).ready(function (){
        $("#doimatkhau").validate({
            rules:{
                
                matkhaumoi:{required: true, minlength:8, maxlength:20},
                nhaplaimatkhaumoi: {required: true, equalTo: "#pwdc"},
                
            },
            messages:{
    
                matkhaumoi:{required:"Mật khẩu không được bỏ trống", minlength:"Mật khẩu tối thiểu 8 ký tự", maxlength:"Mật khẩu tối đa 20 ký tự"},
                nhaplaimatkhaumoi: {required: "Mật khẩu không được bỏ trống", equalTo: "Mật Khẩu chưa trùng"},
            }
        })
    });
</script>