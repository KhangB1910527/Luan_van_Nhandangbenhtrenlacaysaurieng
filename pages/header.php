<?php 
    ob_start(); // Bắt đầu bộ đệm đầu ra
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);

    $sql_danhmucbenh = "SELECT * FROM tbl_danhmucbenh ORDER BY id_danhmucbenh DESC";
    $query_danhmucbenh = mysqli_query($mysqli,$sql_danhmucbenh);
?>

<?php 
    if(isset($_GET['dangxuat'])&& $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
    }
?>

<div class="header">
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <a href="index.php"><img src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Các Loại Bệnh</a>
                        <ul class="dropdown-menu">
                            <?php while($row_danhmucbenh = mysqli_fetch_array($query_danhmucbenh)) { ?>
                                <li><a class="dropdown-item" href="index.php?quanly=danhmucbenh&id=<?php echo $row_danhmucbenh['id_danhmucbenh'] ?>"><?php echo $row_danhmucbenh['tendanhmucbenh'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=nhandang">Hệ Thống Nhận Dạng</a>
                    </li>
                   

                    <li class="nav-item ">
                            <?php while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
                                <li><a class="nav-link" href="index.php?quanly=danhmuc&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                            <?php } ?>
                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=lienhe">Liên Hệ</a>
                    </li>

                    <?php if(isset($_SESSION['dangnhap'])) { ?>
                        <li class="nav-item px-2">
                            <a href="index.php?dangxuat=1"><ion-icon name="exit-outline"></ion-icon></a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="index.php?quanly=thaydoimatkhau"><ion-icon name="pencil-outline"></ion-icon></a>
                        </li>
                    <?php } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?quanly=dangky">Đăng Ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?quanly=dangnhap">Đăng Nhập</a>
                            </li>
                        </ul>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
