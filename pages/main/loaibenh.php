<?php
    $sql_chitiet = "SELECT * FROM tbl_danhmucbenh,tbl_loaibenh WHERE tbl_loaibenh.id_danhmucbenh = tbl_danhmucbenh.id_danhmucbenh AND tbl_loaibenh
    .id_loaibenh='$_GET[id]' LIMIT 1";
    $query_chitiet= mysqli_query($mysqli,$sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>   
    <div  class="chitietloaibenh">
        <h2 class="chitietloaibenh1"><?php echo $row_chitiet['tenbenh']?></h2>
        <p><?php echo $row_chitiet['noidung1']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlybenh/uploads/<?php echo $row_chitiet['hinhanh1'] ?>" alt="" >
        <p><?php echo $row_chitiet['noidung2']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlybenh/uploads/<?php echo $row_chitiet['hinhanh2'] ?>" alt="">
        <p><?php echo $row_chitiet['noidung3']?></p>
        <img class="anhchitietloaibenh" src="admincp/modules/quanlybenh/uploads/<?php echo $row_chitiet['hinhanh3'] ?>" alt="">
    </div>
    <?php
    }
    ?>