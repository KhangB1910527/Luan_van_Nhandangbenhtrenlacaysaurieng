<?php
include('../../config/config.php');
$tenbenh = $_POST['tenbenh'];
$mabenh     = $_POST['mabenh'];
$tomtac        = $_POST['tomtac'];
$noidung1     = $_POST['noidung1'];
//anh1
$hinhanh1 = $_FILES['hinhanh1']['name'];
$hinhanh1_tmp = $_FILES['hinhanh1']['tmp_name'];
$hinhanh1 = time().'_'.$hinhanh1;

$noidung2     = $_POST['noidung2'];
//anh2
$hinhanh2 = $_FILES['hinhanh2']['name'];
$hinhanh2_tmp = $_FILES['hinhanh2']['tmp_name'];
$hinhanh2 = time().'_'.$hinhanh2;

$noidung3     = $_POST['noidung3'];
//anh3
$hinhanh3 = $_FILES['hinhanh3']['name'];
$hinhanh3_tmp = $_FILES['hinhanh3']['tmp_name'];
$hinhanh3 = time().'_'.$hinhanh3;
//
$danhmucbenh = $_POST['danhmucbenh'];




if(isset($_POST['themloaibenh'])){
    $sql_them = "INSERT INTO tbl_loaibenh(tenbenh,mabenh,tomtac,noidung1,hinhanh1,noidung2,hinhanh2,noidung3,hinhanh3,id_danhmucbenh) 
        VALUE('".$tenbenh."','".$mabenh."','".$tomtac."','".$noidung1."','".$hinhanh1."','".$noidung2."','".$hinhanh2."','".$noidung3."','".$hinhanh3."','".$danhmucbenh."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh1_tmp,'uploads/'.$hinhanh1);
    move_uploaded_file($hinhanh2_tmp,'uploads/'.$hinhanh2);
    move_uploaded_file($hinhanh3_tmp,'uploads/'.$hinhanh3);
    header('Location:../../index.php?action=quanlybenh');

}elseif(isset($_POST['sualoaibenh'])){ 
    if($hinhanh1!='' && $hinhanh2!='' && $hinhanh3!=''){
        move_uploaded_file($hinhanh1_tmp,'uploads/'.$hinhanh1);
        move_uploaded_file($hinhanh2_tmp,'uploads/'.$hinhanh2);
        move_uploaded_file($hinhanh3_tmp,'uploads/'.$hinhanh3);
        
        $sql_sua = "UPDATE tbl_loaibenh SET tenbenh='".$tenbenh."', mabenh= '".$mabenh."', tomtac='".$tomtac."', noidung1= '".$noidung1."' , hinhanh1= '".$hinhanh1."',
            noidung2= '".$noidung2."' , hinhanh2= '".$hinhanh2."' , noidung3= '".$noidung3."' , hinhanh3= '".$hinhanh3."' , id_danhmucbenh= '".$danhmucbenh."'
            WHERE id_loaibenh = '$_GET[idloaibenh]'";

        //xoaanhquakhu
        $sql = "SELECT * FROM tbl_loaibenh WHERE id_loaibenh='$_GET[idloaibenh]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row= mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh1']);
            unlink('uploads/'.$row['hinhanh2']);
            unlink('uploads/'.$row['hinhanh3']);
        }
    }else{
        $sql_sua = "UPDATE tbl_loaibenh SET tenbenh='".$tenbenh."', mabenh= '".$mabenh."', tomtac='".$tomtac."', noidung1= '".$noidung1."' , hinhanh1= '".$hinhanh1."',
            noidung2= '".$noidung2."' , hinhanh2= '".$hinhanh2."' , noidung3= '".$noidung3."' , hinhanh3= '".$hinhanh3."' , id_danhmucbenh= '".$danhmucbenh."'
            WHERE id_loaibenh = '$_GET[idloaibenh]'";
    }
    mysqli_query($mysqli, $sql_sua);
    header('Location:../../index.php?action=lietkeloaibenh');
        // $sql_sua = $mysqli -> prepare(
        //     "UPDATE tbl_danhmuc SET tendanhmuc= :ten, thutu= :tt WHERE id_danhmuc = :id"
        // );
        // $sql_sua->execute([
        //     'ten' => $tendanhmuc,
        //     'tt' => $thutu,
        //     'id'=> $_GET['']
        // ]);

}else{
    $id=$_GET['idloaibenh']; 
    $sql = "SELECT * FROM tbl_loaibenh WHERE id_loaibenh='$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row= mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh1']);
        unlink('uploads/'.$row['hinhanh2']);
        unlink('uploads/'.$row['hinhanh3']);
    }
    $sql_xoa = "DELETE FROM tbl_loaibenh WHERE id_loaibenh='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=lietkeloaibenh');
}

?>