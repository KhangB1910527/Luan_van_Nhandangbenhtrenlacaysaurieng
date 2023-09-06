<?php
include('../../config/config.php');
$tendanhmuc = $_POST['tendanhmuc'];
$thutu      = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tendanhmuc."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmuc');

}elseif(isset($_POST['suadanhmuc'])){ 
    $sql_sua = "UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."', thutu= '".$thutu."' WHERE id_danhmuc = '".$_GET['iddanhmuc']."'";
    mysqli_query($mysqli, $sql_sua);
    header('Location:../../index.php?action=lietke');
        // $sql_sua = $mysqli -> prepare(
        //     "UPDATE tbl_danhmuc SET tendanhmuc= :ten, thutu= :tt WHERE id_danhmuc = :id"
        // );
        // $sql_sua->execute([
        //     'ten' => $tendanhmuc,
        //     'tt' => $thutu,
        //     'id'=> $_GET['iddanhmuc']
        // ]);

}else{
    $id=$_GET['iddanhmuc']; 
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=lietke');
}

?>