<?php
    $sql_lietke_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmuc = mysqli_query($mysqli,$sql_lietke_danhmuc) 

?>


    <table class="table">
        <tr>
            <th>Id danh mục</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_danhmuc)){
            $i++;
        ?>
        <tbody>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['tendanhmuc']?></td>
            <td>
            <a href="?action=suadanhmuc&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><ion-icon name="create-outline"></ion-icon></a>
            <a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
        
        </tbody>
        <?php
        }
        ?>
    </table>
