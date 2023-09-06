<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action'])){
        $tam = $_GET['action'];
                
        }else {
            $tam = "";
    
        }
        // danhmuc
        if($tam == 'quanlydanhmuc'){
            include("modules/quanlydanhmuc/them.php");
            }elseif($tam == 'lietke' ){
                include("modules/quanlydanhmuc/lietke.php");

        }elseif($tam == 'suadanhmuc'){
            include("modules/quanlydanhmuc/sua.php");
        }

        //danhmucbenh
        if($tam == 'quanlydanhmucbenh'){
            include("modules/quanlydanhmucbenh/them.php");
            }elseif($tam == 'lietkedanhmucbenh' ){
                include("modules/quanlydanhmucbenh/lietke.php");

        }elseif($tam == 'suadanhmucbenh'){
            include("modules/quanlydanhmucbenh/sua.php");        
        }
        //loaibenh
        if($tam == 'quanlybenh'){
            include("modules/quanlybenh/them.php");
            }elseif($tam == 'lietkeloaibenh' ){
                include("modules/quanlybenh/lietke.php");

        }elseif($tam == 'sualoaibenh'){
            include("modules/quanlybenh/sua.php");        
        }
        //tintuc
        if($tam == 'quanlytintuc'){
            include("modules/quanlytintuc/them.php");
            }elseif($tam == 'lietketintuc' ){
                include("modules/quanlytintuc/lietke.php");

        }elseif($tam == 'suatintuc'){
            include("modules/quanlytintuc/sua.php");  
        }
        else {
            include("modules/dashboard.php");
        }
    ?>
</div>
