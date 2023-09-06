<?php
    if(isset($_SESSION['dk'])){
      echo'<p  id="echodangky" >Đăng ký tài khoản thành công. Mời bạn đăng nhập!</p>';
      unset($_SESSION['dk']);
    }
    if(isset($_POST['dangnhap'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $sql = "SELECT * FROM tbl_dangky WHERE tentaikhoan='".$tentaikhoan."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
       
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangnhap'] = $row_data['tentaikhoan'];
            header('Location:index.php?quanly=dangnhapkhachhang');
        }else{ 
            echo '<p id="echodangnhap">Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.</p>';

        }
    }
?>


<div class="container1">
  <div class="d-flex justify-content-center h-500 pb-5 pt-3">
    <div class="card" id="card_dn">
      <div class="card-header">
        <h3>Đăng nhập</h3>
        
      </div>
      <div class="card-body">
        <form method="post" id="dangnhap">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="tentaikhoan" class="form-control" placeholder="Nhập tên tài khoản">
            
          </div>
          <div class="input-group form-group">
              
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="matkhau" class="form-control" placeholder="Nhập mật khẩu">
          </div>
          
          <div class="form-group">
            <input type="submit" name="dangnhap" value="Đăng nhập" >
           
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script>
	$(document).ready(function (){
        $("#dangnhap").validate({
            rules:{
                
                tentaikhoan: {required: true},
                matkhau:{required: true},
      
                
            },
            messages:{
               
                tentaikhoan: {required: "Tên tài khoản không được bỏ trống"},
                matkhau:{required:"Mật khẩu không được bỏ trống"},
            }
        })
    });
</script>


