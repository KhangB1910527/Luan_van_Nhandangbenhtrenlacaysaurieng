<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="wrapper">
        
    <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/sidebar.php");
            include("modules/main.php");    
            include("modules/footer.php");    
    ?>    
    </div>   
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        
        CKEDITOR.replace( 'noidung1' );
        CKEDITOR.replace( 'noidung2' );
        CKEDITOR.replace( 'noidung3' );
        
        CKEDITOR.replace( 'noidungtintuc1' );
        CKEDITOR.replace( 'noidungtintuc2' );
        CKEDITOR.replace( 'noidungtintuc3' );
    </script>
     <!-- iconnic -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>