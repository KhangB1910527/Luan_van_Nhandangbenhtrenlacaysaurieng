<!-- slide -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images\slide1.png" alt="Los Angeles" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="images\slide2.png" alt="Chicago" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="images\slide3.png" alt="New York" class="d-block" style="width:100%">
  </div>
</div>

<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
<!-- nhandang -->
<h1 style="text-align: center; padding-top: 50px;">NHẬN DẠNG</h1>

<div class="quangcaonhandang">
  <a href="index.php?quanly=nhandang"><img src="images/nhandang1.png" alt=""></a>
  <h3 style="padding-top: 20px;">Hệ thống nhận dạng bệnh hại sầu riêng thông qua hình ảnh lá bị nhiễm bệnh</h3>
  <div style="font-size: 20px;">
    <p>" Hệ thống nhận dạng được hơn 5 loại bệnh trên lá, cụ thể là 6 bệnh hại thường gập:
      <br>
      Thán thư, Cháy lá, Đốm rong, Rầy hại, Vàng lá thối rễ "
    </p>
  </div>
  
  <div class="btn btn-primary khang">
    <a href="index.php?quanly=nhandang">Nhận dạng ngay</a>
      
  </div>

</div>


<!-- Tintuc -->
<h1 style="text-align: center; padding-top: 50px;">TIN TỨC</h1>
<?php
    $sql_pro = "SELECT * FROM tbl_danhmuc,tbl_tintuc WHERE tbl_tintuc.id_danhmuc = tbl_danhmuc.id_danhmuc
     ORDER BY tbl_tintuc.id_tintuc DESC LIMIT 5";
    $query_pro= mysqli_query($mysqli,$sql_pro);
?>   


<div class="image-slider-tintuc">
      <?php
            while($row_pro = mysqli_fetch_array($query_pro)){
      ?> 
  <div class="image-item">
            <div class="image " id="tintuc">
              <a href="index.php?quanly=tintuc&id=<?php echo $row_pro['id_tintuc'] ?>">
                <img src="admincp/modules/quanlytintuc/uploads/<?php echo $row_pro['hinhanhtintuc1'] ?> " class="card-img-top" alt=""  >
              </a>
            </div>
            <h5 class="card-title"><?php echo $row_pro['tentintuc']?></h5>
  </div>
      <?php
      }
      ?>
</div>


<!-- cacloaibenh -->
<h1 style="text-align: center; padding-top: 50px;">CÁC LOẠI BỆNH</h1>
<?php
    $sql_pro = "SELECT * FROM tbl_danhmucbenh,tbl_loaibenh WHERE tbl_loaibenh.id_danhmucbenh = tbl_danhmucbenh.id_danhmucbenh
     ORDER BY tbl_loaibenh.id_loaibenh DESC LIMIT 7";
    $query_pro= mysqli_query($mysqli,$sql_pro);
?>   
<div class="image-slider">
      <?php
            while($row_pro = mysqli_fetch_array($query_pro)){
      ?> 
  <div class="image-item">
            <div class="image" id="loaibenh">
              <li>
              <a href="index.php?quanly=loaibenh&id=<?php echo $row_pro['id_loaibenh'] ?>">
                <img src="admincp/modules/quanlybenh/uploads/<?php echo $row_pro['hinhanh1'] ?> " class="card-img-top" alt=""  >
                <div class="name" style="text-align: center;"> <h5 class="card-title"><?php echo $row_pro['tenbenh']?></h5></div>
              </a>
              
              </li>
            </div>
           
  </div>
      <?php
      }
      ?>
</div>




