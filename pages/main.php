<div id="main">
            <div class="maincontent" >
                <?php
                if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
                }else {
                    $tam = "";
                }
                if($tam == 'slide'){
                    include("main/index.php");

                }elseif($tam == 'nhandang'){
                    include("main/nhandang.php");

                }elseif($tam == 'danhmuc'){
                    include("main/danhmuc.php");

                }elseif($tam == 'danhmucbenh'){
                    include("main/danhmucbenh.php");

                }elseif($tam == 'lienhe'){
                    include("main/lienhe.php");

                }elseif($tam == 'loaibenh'){
                    include("main/loaibenh.php");

                }elseif($tam == 'tintuc'){
                    include("main/tintuc.php");
                    
                }elseif($tam == 'dangky'){
                    include("main/dangky.php");
            
                }elseif($tam == 'dangnhap'){
                    include("main/dangnhap.php");

                }elseif($tam == 'thaydoimatkhau'){
                    include("main/thaydoimatkhau.php");
                }




                    
                else {
                    include("main/index.php");
                }
                ?>
            </div>
</div>