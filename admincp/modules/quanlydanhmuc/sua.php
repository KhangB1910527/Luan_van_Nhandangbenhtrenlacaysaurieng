<?php
    $sql_sua_danhmuc = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc= '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmuc = mysqli_query($mysqli,$sql_sua_danhmuc); 
    $row = mysqli_fetch_array($query_sua_danhmuc);
?>



    <table class="table">
        <form action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>" method="post">
            <thead>
            <tr>
                <th>Sửa danh mục</th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" name="tendanhmuc" size="80%" value="<?php echo $row['tendanhmuc'] ?>"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" name="thutu" size="80%" value="<?php echo $row['thutu'] ?>"></td>
            </tr>
            <tr>
                
                <td><input type="submit" name="suadanhmuc" value=" Sửa "></td>
            </tr>
            </tbody>
        </form>
    </table>
