<?php
    $sql_sua_tintuc = "SELECT * FROM tbl_tintuc WHERE id_tintuc= '$_GET[idtintuc]' LIMIT 1";
    $query_sua_tintuc = mysqli_query($mysqli,$sql_sua_tintuc); 
    $row = mysqli_fetch_array($query_sua_tintuc);
?>
<table class="table">
<form action="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id_tintuc'] ?>" method="post"  enctype="multipart/form-data">
        <thead>
            <tr>
                <th>Sửa Tin Tức</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tên Tin tức</td>
                <td>
                    <input type="text" name="tentintuc" size="80%" value="<?php echo $row['tentintuc'] ?>">
                </td>
            </tr>
            <tr>
                <td>Mã Tin Tức</td>
                <td>
                    <input type="text" name="matintuc" size="80%" value="<?php echo $row['matintuc'] ?>">
                </td>
            </tr>
            <tr>
                <td>Tóm Tắc</td>
                <td>
                    <textarea rows="5" type="text" name="tomtactintuc" size="80%"><?php echo $row['tomtactintuc'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung 1</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc1" size="80%"><?php echo $row['noidungtintuc1'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 1</td>
                <td>
                    <input type="file" name="hinhanhtintuc1" size="80%">
                    <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanhtintuc1'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Nội dung 2</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc2" size="80%"><?php echo $row['noidungtintuc2'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 2</td>
                <td>
                    <input type="file" name="hinhanhtintuc2" size="80%">
                    <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanhtintuc2'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Nội dung 3</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc3" size="80%"><?php echo $row['noidungtintuc3'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 3</td>
                <td>
                    <input type="file" name="hinhanhtintuc3" size="80%">
                    <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanhtintuc3'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Danh Muc</td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                if($row_danhmuc['id_danhmuc']== $row['id_danhmuc']){
                            ?>
                            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                    <?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                                }else{
                                    ?>
                                    <option  value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                    <?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php
                                }
                            }
                        ?>
                </td>   
                </select>
            </tr>
            <tr>

                <td>
                    <input type="submit" name="suatintuc" value=" Sửa Tin Tức ">
                </td>
            </tr>
        </tbody>
    </form>
</table>