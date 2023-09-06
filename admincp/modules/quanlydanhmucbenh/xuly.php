<?php
include('../../config/config.php');
$tendanhmucbenh = $_POST['tendanhmucbenh'];
$thutu      = $_POST['thutu'];
if(isset($_POST['themdanhmucbenh'])){
    $sql_them = "INSERT INTO tbl_danhmucbenh(tendanhmucbenh,thutu) VALUE('".$tendanhmucbenh."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucbenh');

}elseif(isset($_POST['suadanhmucbenh'])){ 
    $sql_sua = "UPDATE tbl_danhmucbenh SET tendanhmucbenh='".$tendanhmucbenh."', thutu= '".$thutu."' WHERE id_danhmucbenh = '".$_GET['iddanhmucbenh']."'";
    mysqli_query($mysqli, $sql_sua);
    header('Location:../../index.php?action=lietkedanhmucbenh');
        // $sql_sua = $mysqli -> prepare(
        //     "UPDATE tbl_danhmuc SET tendanhmuc= :ten, thutu= :tt WHERE id_danhmuc = :id"
        // );
        // $sql_sua->execute([
        //     'ten' => $tendanhmuc,
        //     'tt' => $thutu,
        //     'id'=> $_GET['iddanhmuc']
        // ]);

}else{
    $id=$_GET['iddanhmucbenh']; 
    $sql_xoa = "DELETE FROM tbl_danhmucbenh WHERE id_danhmucbenh='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=lietkedanhmucbenh');
}

?>