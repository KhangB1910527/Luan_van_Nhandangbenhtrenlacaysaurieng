<?php
    $sql_lietke_loaibenh = "SELECT * FROM tbl_loaibenh,tbl_danhmucbenh WHERE tbl_loaibenh.id_danhmucbenh=tbl_danhmucbenh.id_danhmucbenh
        ORDER BY id_loaibenh DESC";
    $query_lietke_loaibenh = mysqli_query($mysqli,$sql_lietke_loaibenh) 

?>


    <table class="table">
        <tr>
            <th>Id loại bệnh</th>
            <th>Tên loại bệnh</th>
            <th>Hình ảnh</th>
            <th>Danh mục bệnh</th>
            <th>Mã bệnh</th>
            <th>Quản lý</th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_loaibenh)){
            $i++;
        ?>
        <tbody>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['tenbenh']?></td>
            <td><img src="modules/quanlybenh/uploads/<?php echo $row['hinhanh1']?>" alt="" width="150px"></td>
            <td><?php echo $row['tendanhmucbenh']?></td>
            <td><?php echo $row['mabenh']?></td>
            
            <td>
            <a href="?action=sualoaibenh&idloaibenh=<?php echo $row['id_loaibenh'] ?>"><ion-icon name="create-outline"></ion-icon></a>
            <a href="modules/quanlybenh/xuly.php?idloaibenh=<?php echo $row['id_loaibenh'] ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
        
        </tbody>
        <?php
        }
        ?>
    </table>
