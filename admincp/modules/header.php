<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<div class="header">
    <nav class="navbar ">
    <div class="container-fluid">
        <div class="navbar-header">
        
        <a href="index.php"><img src="../images/logo.png" alt=""></a>
        </div>
        <ul class="nav  navbar-right">
            <li><span class="glyphicon glyphicon-user"></span> <?php if(isset($_SESSION['dangnhap'])){  
                    echo $_SESSION['dangnhap'];               
                }?></li>
            <li><a href="index.php?dangxuat=1"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
        </ul>
        <br><br>
       
        
    </div>
    </nav>
</div>