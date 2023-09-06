<?php
    $sql_lietke_tintuc = "SELECT * FROM tbl_tintuc,tbl_danhmuc WHERE tbl_tintuc.id_danhmuc=tbl_danhmuc.id_danhmuc
        ORDER BY id_tintuc DESC";
    $query_lietke_tintuc = mysqli_query($mysqli,$sql_lietke_tintuc) 

?>


    <table class="table">
        <tr>
            <th>Id Tin Tức</th>
            <th>Tên Tin Tức</th>
            <th>Hình Ảnh</th>
            <th>Danh mục</th>
            <th>Mã Tin Tức</th>
            <th>Quản Lý</th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_tintuc)){
            $i++;
        ?>
        <tbody>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['tentintuc']?></td>
            <td><img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanhtintuc1']?>" alt="" width="150px"></td>
            <td><?php echo $row['tendanhmuc']?></td>
            <td><?php echo $row['matintuc']?></td>
            
            <td>
            <a href="?action=suatintuc&idtintuc=<?php echo $row['id_tintuc'] ?>"><ion-icon name="create-outline"></ion-icon></a>
            <a href="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id_tintuc'] ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
        
        </tbody>
        <?php
        }
        ?>
    </table>
