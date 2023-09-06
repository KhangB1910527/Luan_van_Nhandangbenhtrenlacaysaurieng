<table class="table">
    <form action="modules/quanlytintuc/xuly.php" method="POST"  enctype="multipart/form-data">
        <thead>
            <tr>
                <th>Thêm Tin Tức</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tên Tin Tức</td>
                <td>
                    <input type="text" name="tentintuc" size="80%">
                </td>
            </tr>
            <tr>
                <td>Mã Tin Tức</td>
                <td>
                    <input type="text" name="matintuc" size="80%">
                </td>
            </tr>
            <tr>
                <td>Tóm Tắc</td>
                <td>
                    <textarea rows="5" type="text" name="tomtactintuc" size="80%"></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội Dung 1</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc1" size="80%"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 1</td>
                <td>
                    <input type="file" name="hinhanhtintuc1" size="80%">
                </td>
            </tr>
            <tr>
                <td>Nội dung 2</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc2" size="80%"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 2</td>
                <td>
                    <input type="file" name="hinhanhtintuc2" size="80%">
                </td>
            </tr>
            <tr>
                <td>Nội dung 3</td>
                <td>
                    <textarea rows="5" type="text" name="noidungtintuc3" size="80%"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh 3</td>
                <td>
                    <input type="file" name="hinhanhtintuc3" size="80%">
                </td>
            </tr>
            <tr>
                <td>Danh Mục </td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                    <?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            }
                        ?>
                </td>   
                </select>
            </tr>
           
            <tr>

                <td>
                    <input type="submit" name="themtintuc" value=" Thêm Tin Tức ">
                </td>
            </tr>
        </tbody>
    </form>
</table>