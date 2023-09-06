<?php
include('../../config/config.php');
$tentintuc= $_POST['tentintuc'];
$matintuc    = $_POST['matintuc'];
$tomtactintuc        = $_POST['tomtactintuc'];
$noidungtintuc1     = $_POST['noidungtintuc1'];
//anh1
$hinhanhtintuc1 = $_FILES['hinhanhtintuc1']['name'];
$hinhanhtintuc1_tmp = $_FILES['hinhanhtintuc1']['tmp_name'];
$hinhanhtintuc1 = time().'_'.$hinhanhtintuc1;

$noidungtintuc2     = $_POST['noidungtintuc2'];
//anh2
$hinhanhtintuc2 = $_FILES['hinhanhtintuc2']['name'];
$hinhanhtintuc2_tmp = $_FILES['hinhanhtintuc2']['tmp_name'];
$hinhanhtintuc2 = time().'_'.$hinhanhtintuc2;

$noidungtintuc3     = $_POST['noidungtintuc3'];
//anh3
$hinhanhtintuc3 = $_FILES['hinhanhtintuc3']['name'];
$hinhanhtintuc3_tmp = $_FILES['hinhanhtintuc3']['tmp_name'];
$hinhanhtintuc3 = time().'_'.$hinhanhtintuc3;
//
$danhmuc = $_POST['danhmuc'];




if(isset($_POST['themtintuc'])){
    $sql_them = "INSERT INTO tbl_tintuc(tentintuc,matintuc,tomtactintuc,noidungtintuc1,hinhanhtintuc1,noidungtintuc2,hinhanhtintuc2,noidungtintuc3,hinhanhtintuc3,id_danhmuc) 
        VALUE('".$tentintuc."','".$matintuc."','".$tomtactintuc."','".$noidungtintuc1."','".$hinhanhtintuc1."','".$noidungtintuc2."','".$hinhanhtintuc2."','".$noidungtintuc3."','".$hinhanhtintuc3."','".$danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanhtintuc1_tmp,'uploads/'.$hinhanhtintuc1);
    move_uploaded_file($hinhanhtintuc2_tmp,'uploads/'.$hinhanhtintuc2);
    move_uploaded_file($hinhanhtintuc3_tmp,'uploads/'.$hinhanhtintuc3);
    header('Location:../../index.php?action=quanlytintuc');////

}elseif(isset($_POST['suatintuc'])){ 
    if($hinhanhtintuc1!='' && $hinhanhtintuc2!='' && $hinhanhtintuc3!=''){
        move_uploaded_file($hinhanhtintuc1_tmp,'uploads/'.$hinhanhtintuc1);
        move_uploaded_file($hinhanhtintuc2_tmp,'uploads/'.$hinhanhtintuc2);
        move_uploaded_file($hinhanhtintuc3_tmp,'uploads/'.$hinhanhtintuc3);
        
        $sql_sua = "UPDATE tbl_tintuc SET tentintuc='".$tentintuc."', matintuc= '".$matintuc."', tomtactintuc='".$tomtactintuc."', noidungtintuc1= '".$noidungtintuc1."' , hinhanhtintuc1= '".$hinhanhtintuc1."',
            noidungtintuc2= '".$noidungtintuc2."' , hinhanhtintuc2= '".$hinhanhtintuc2."' , noidungtintuc3= '".$noidungtintuc3."' , hinhanhtintuc3= '".$hinhanhtintuc3."' , id_danhmuc= '".$danhmuc."'
            WHERE id_tintuc = '$_GET[idtintuc]'";

        //xoaanhquakhu
        $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc='$_GET[idtintuc]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row= mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanhtintuc1']);
            unlink('uploads/'.$row['hinhanhtintuc2']);
            unlink('uploads/'.$row['hinhanhtintuc3']);
        }
    }else{
        $sql_sua = "UPDATE tbl_tintuc SET tentintuc='".$tentintuc."', matintuc= '".$matintuc."', tomtactintuc='".$tomtactintuc."', noidungtintuc1= '".$noidungtintuc1."' , hinhanhtintuc1= '".$hinhanhtintuc1."',
            noidungtintuc2= '".$noidungtintuc2."' , hinhanhtintuc2= '".$hinhanhtintuc2."' , noidungtintuc3= '".$noidungtintuc3."' , hinhanhtintuc3= '".$hinhanhtintuc3."' , id_danhmuc= '".$danhmuc."'
            WHERE id_tintuc = '$_GET[idtintuc]'";
    }
    mysqli_query($mysqli, $sql_sua);
    header('Location:../../index.php?action=lietketintuc');
        // $sql_sua = $mysqli -> prepare(
        //     "UPDATE tbl_danhmuc SET tendanhmuc= :ten, thutu= :tt WHERE id_danhmuc = :id"
        // );
        // $sql_sua->execute([
        //     'ten' => $tendanhmuc,
        //     'tt' => $thutu,
        //     'id'=> $_GET['']
        // ]);

}else{
    $id=$_GET['idtintuc']; 
    $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc='$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row= mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanhtintuc1']);
        unlink('uploads/'.$row['hinhanhtintuc2']);
        unlink('uploads/'.$row['hinhanhtintuc3']);
    }
    $sql_xoa = "DELETE FROM tbl_tintuc WHERE id_tintuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=lietketintuc');
}

?>