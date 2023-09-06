<?php
    $sql_sua_danhmucbenh = "SELECT * FROM tbl_danhmucbenh WHERE id_danhmucbenh= '$_GET[iddanhmucbenh]' LIMIT 1";
    $query_sua_danhmucbenh = mysqli_query($mysqli,$sql_sua_danhmucbenh); 
    $row = mysqli_fetch_array($query_sua_danhmucbenh);
?>



    <table class="table">
        <form action="modules/quanlydanhmucbenh/xuly.php?iddanhmucbenh=<?php echo $row['id_danhmucbenh'] ?>" method="post">
            <thead>
            <tr>
                <th>Sửa danh mục bệnh</th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tên danh mục bệnh</td>
                <td><input type="text" name="tendanhmucbenh" size="80%" value="<?php echo $row['tendanhmucbenh'] ?>"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" name="thutu" size="80%" value="<?php echo $row['thutu'] ?>"></td>
            </tr>
            <tr>
                
                <td><input type="submit" name="suadanhmucbenh" value=" Sửa "></td>
            </tr>
            </tbody>
        </form>
    </table>
