<?php
          $sql_chitiet = "SELECT * FROM tbl_tintuc,tbl_danhmuc WHERE tbl_tintuc.id_danhmuc=tbl_danhmuc.id_danhmuc
           AND tbl_tintuc.id_tintuc='$_GET[id]'  LIMIT 1";
          $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
         
                while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
    <div class="chitietloaibenh">
        <h2 class="chitietloaibenh1"><?php echo $row_chitiet['tentintuc']?></h2>
        <p><?php echo $row_chitiet['noidungtintuc1']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlytintuc/uploads/<?php echo $row_chitiet['hinhanhtintuc1'] ?>" alt="" >
        <p><?php echo $row_chitiet['noidungtintuc2']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlytintuc/uploads/<?php echo $row_chitiet['hinhanhtintuc2'] ?>" alt="">
        <p><?php echo $row_chitiet['noidungtintuc3']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlytintuc/uploads/<?php echo $row_chitiet['hinhanhtintuc3'] ?>" alt="">
    </div>
    <?php
    }
    ?>

