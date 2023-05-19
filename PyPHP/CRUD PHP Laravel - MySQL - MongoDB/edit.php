<?php require_once("config.php"); ?>

<div class="container" style="margin-top:20px">
    <h2>Edit data</h2>
    <hr>
<?php 
if(isset($_GET['country'])){

$country = $_GET['country'];    

$select = mysqli_query($koneksi, "Select * from covid where country='$country'")or die(mysqli_query($koneksi));

if(mysqli_num_rows($select) != 0){
    $data = mysqli_fetch_assoc($select);
}else{
    echo '<div class="alert alert-warning">Country is not available.</div>';
    exit();
}
}
?>
<?php 
if (isset($_POST['submit'])){
    $case_total = $_POST['case_total'];
    $death_total = $_POST['death_total'];

    $sql = mysqli_query($koneksi, "UPDATE covid set case_total= '$case_total', death_total = '$death_total' where country ='$country'") or die (mysqli_error($koneksi));
    if($sql){
        echo '<script>alert("Success edited data."); document.location="display.php?page=tampil_mhs";</script>';
    }else{echo '<div class= "alert alert-warning">Failed to add data.</div>';
    }

}
?>


<form action="display.php?page=edit_mhs&country=<?php echo $country; ?>" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">country</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="country" class="form-control" size="4" value="<?php echo $data['country'];?>" readonly required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">Case Total</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="case_total" class="form-control" size="4" value="<?php echo $data['case_total'];?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">Death Total</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="death_total" class="form-control" size="4" value="<?php echo $data['death_total'];?>" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 com-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        <a href="display.php?page=tampil_mhs" class="btn btn-warning">Back</a>
        </div>
    </div>
</form>























</div>