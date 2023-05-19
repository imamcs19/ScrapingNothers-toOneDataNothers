<?php require_once("config.php"); 

if(isset($_GET['country'])){

    $country = $_GET['country'];

    $cek = mysqli_query($koneksi, "Select * from covid where country='$country'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek)>0){
        $del = mysqli_query($koneksi, "Delete from covid where country='$country'")or die(mysqli_error($koneksi));
        if($del){
            echo '<script>alert("Delete Success."); document.location="display.php?page=tampil_mhs";</script>';

        }else{
            echo '<script>alert("Delete failed."); document.location="display.php?page=tampil_mhs"; </script>';
        }
    }else {
        echo '<script>alert("Country is not available."); document.location="display.php?page=tampil_mhs"; </script>';
    }
}else{
    echo '<script>alert("Country is not available."); document.location="display.php?page=tampil_mhs"; </script>';
}
?>