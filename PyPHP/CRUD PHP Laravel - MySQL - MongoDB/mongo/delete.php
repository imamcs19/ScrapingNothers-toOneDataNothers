<?php require_once("config.php"); 

if(isset($_GET['id'])){

    // $country = $_GET['country'];
    $dt = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);


    // $cek = mysqli_query($koneksi, "Select * from covid where country='$country'") or die(mysqli_error($koneksi));
    if($dt){
        // $del = mysqli_query($koneksi, "Delete from covid where country='$country'")or die(mysqli_error($koneksi));
       $del =  $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
        if($del){
            echo '<script>alert("Delete Success."); document.location="../display.php?page=tampil_mng";</script>';
        }else{    echo '<script>alert("Delete failed."); document.location="display.php?page=tampil_mng"; </script>';
        }
    }else {
        echo '<script>alert("Country is not available."); document.location="../display.php?page=tampil_mng"; </script>';
    }
}else{
    echo '<script>alert("Country is not available."); document.location="../display.php?page=tampil_mng"; </script>';
}
?>