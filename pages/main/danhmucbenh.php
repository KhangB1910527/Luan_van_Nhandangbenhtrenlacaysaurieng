<?php
    $sql_pro = "SELECT * FROM tbl_danhmucbenh,tbl_loaibenh WHERE tbl_loaibenh.id_danhmucbenh = tbl_danhmucbenh.id_danhmucbenh
        AND tbl_loaibenh.id_danhmucbenh='$_GET[id]'  ORDER BY tbl_loaibenh.id_loaibenh DESC";
    $query_pro= mysqli_query($mysqli,$sql_pro);
?>


<div class="hienthibenh">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-5">
    <?php
          while($row_pro = mysqli_fetch_array($query_pro)){
    ?>  
          <div class="col">
            <div class="card h-100" id="colhover">
                <a href="index.php?quanly=loaibenh&id=<?php echo $row_pro['id_loaibenh'] ?>">
                <img src="admincp/modules/quanlybenh/uploads/<?php echo $row_pro['hinhanh1'] ?> " class="card-img-top" alt=""  >
                  <div class="card-body">
                  <h5 class="card-title"><?php echo $row_pro['tenbenh']?></h5>
                  <p class="card-text"><?php echo $row_pro['tomtac']?></p>
                  </div>
                </a>
            </div>
          </div>
          
        
    <?php
    }
    ?>
  </div>
</div>
