<?php
    $sql_sua_loaibenh = "SELECT * FROM tbl_loaibenh WHERE id_loaibenh= '$_GET[idloaibenh]' LIMIT 1";
    $query_sua_loaibenh = mysqli_query($mysqli,$sql_sua_loaibenh); 
    $row = mysqli_fetch_array($query_sua_loaibenh);
?>
<table class="table">
<form action="modules/quanlybenh/xuly.php?idloaibenh=<?php echo $row['id_loaibenh'] ?>" method="post"  enctype="multipart/form-data">
        <thead>
            <tr>
                <th>Sửa loại bệnh</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tên bệnh</td>
                <td>
                    <input type="text" name="tenbenh" size="80%" value="<?php echo $row['tenbenh'] ?>">
                </td>
            </tr>
            <tr>
                <td>Mã bệnh</td>
                <td>
                    <input type="text" name="mabenh" size="80%" value="<?php echo $row['mabenh'] ?>">
                </td>
            </tr>
            <tr>
                <td>Tóm Tắc</td>
                <td>
                    <textarea rows="5" type="text" name="tomtac" size="80%"><?php echo $row['tomtac'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung 1</td>
                <td>
                    <textarea rows="5" type="text" name="noidung1" size="80%"><?php echo $row['noidung1'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 1</td>
                <td>
                    <input type="file" name="hinhanh1" size="80%">
                    <img src="modules/quanlybenh/uploads/<?php echo $row['hinhanh1'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Nội dung 2</td>
                <td>
                    <textarea rows="5" type="text" name="noidung2" size="80%"><?php echo $row['noidung2'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 2</td>
                <td>
                    <input type="file" name="hinhanh2" size="80%">
                    <img src="modules/quanlybenh/uploads/<?php echo $row['hinhanh2'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Nội dung 3</td>
                <td>
                    <textarea rows="5" type="text" name="noidung3" size="80%"><?php echo $row['noidung3'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 3</td>
                <td>
                    <input type="file" name="hinhanh3" size="80%">
                    <img src="modules/quanlybenh/uploads/<?php echo $row['hinhanh3'] ?>" width="150px" alt="">
                </td>
            </tr>
            <tr>
                <td>Danh mục bệnh</td>
                <td>
                    <select name="danhmucbenh">
                        <?php
                            $sql_danhmucbenh = "SELECT * FROM tbl_danhmucbenh ORDER BY id_danhmucbenh DESC";
                            $query_danhmucbenh = mysqli_query($mysqli,$sql_danhmucbenh);
                            while($row_danhmucbenh = mysqli_fetch_array($query_danhmucbenh)){
                                if($row_danhmucbenh['id_danhmucbenh']== $row['id_danhmucbenh']){
                            ?>
                            <option selected value="<?php echo $row_danhmucbenh['id_danhmucbenh'] ?>">
                                    <?php echo $row_danhmucbenh['tendanhmucbenh'] ?></option>
                            <?php
                                }else{
                                    ?>
                                    <option  value="<?php echo $row_danhmucbenh['id_danhmucbenh'] ?>">
                                    <?php echo $row_danhmucbenh['tendanhmucbenh'] ?></option>
                                    <?php
                                }
                            }
                        ?>
                </td>   
                </select>
            </tr>
            <tr>

                <td>
                    <input type="submit" name="sualoaibenh" value=" Sửa loại bệnh ">
                </td>
            </tr>
        </tbody>
    </form>
</table>