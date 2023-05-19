<?php require_once("config.php");

?>

<center><font size="6">Add data</font></center>
<hr>
<?php 
 if(isset($_POST['submit'])){
    require 'config.php';
    $insertOneResult = $collection->insertOne([
        'country' => $_POST['country'],
        'case_total' => $_POST['case_total'],
        'death_total' => $_POST['death_total'],
    ]);
    if($insertOneResult){
        echo '<script>alert("Success added data."); document.location="display.php?page=tampil_mng";</script>';
    }else{echo '<div class= "alert alert-warning">Failed to add data.</div>';
    }

}


?>
<form action="display.php?page=tambah_mng" method="post">
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