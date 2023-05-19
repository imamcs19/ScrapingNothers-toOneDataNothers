<?php require_once("config.php");?>

<center><font size="6">Add data</font></center>
<hr>
<?php
if(isset($_POST['submit'])){
    $country = $_POST['country'];
    $case_total = $_POST['case_total'];
    $death_total = $_POST['death_total'];

    $cek = mysqli_query($koneksi, "Select * from covid where country = '$country'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek)==0){
        $sql = mysqli_query($koneksi, "insert into covid (country, case_total, death_total) values ('$country', '$case_total', '$death_total')");
        if($sql){
            echo '<script>alert("Success added data."); document.location="display.php?page=tampil_mhs";</script>';
        }else{echo '<div class= "alert alert-warning">Failed to add data.</div>';
        }
    }else {
    echo '<div class= "alert alert-warning">Country is already added.</div>';
}

}

?>   

<form action="display.php?page=tambah_mhs" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 com-sm-3 label-align">Country</label>
        <div class="col-md-6 col-sm-6">
        <input type="text" name="country" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 com-sm-3 label-align">Total Case</label>
        <div class="col-md-6 col-sm-6">
        <input type="text" name="case_total" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 com-sm-3 label-align">Death Total</label>
        <div class="col-md-6 col-sm-6">
        <input type="text" name="death_total" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Insert">
        </div>
    </div>
</form>