<?php
    $sql_pro = "SELECT * FROM tbl_danhmuc,tbl_tintuc WHERE tbl_tintuc.id_danhmuc = tbl_danhmuc.id_danhmuc
        AND tbl_tintuc.id_danhmuc='$_GET[id]'  ORDER BY tbl_tintuc.id_tintuc DESC";
    $query_pro= mysqli_query($mysqli,$sql_pro);
?>


<div class="hienthibenh">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-5">
    <?php
          while($row_pro = mysqli_fetch_array($query_pro)){
    ?>  
          <div class="col">
            <div class="card h-100" id="colhover">
                <a href="index.php?quanly=tintuc&id=<?php echo $row_pro['id_tintuc'] ?>">
                <img src="admincp/modules/quanlytintuc/uploads/<?php echo $row_pro['hinhanhtintuc1'] ?> " class="card-img-top" alt=""  >
                  <div class="card-body">
                  <h5 class="card-title"><?php echo $row_pro['tentintuc']?></h5>
                  <p class="card-text"><?php echo $row_pro['tomtactintuc']?></p>
                  </div>
                </a>
            </div>
          </div>
        
    <?php
    }
    ?>
  </div>
</div>
