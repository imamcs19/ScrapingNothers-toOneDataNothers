<?php require_once("config.php"); ?>

<div class="container" style="margin-top:20px">
    <h2>Edit data</h2>
    <hr>
<?php
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
    $dt = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
 }
 if(isset($_POST['submit'])){
   $update = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        ['$set' => ['country' => $_POST['country'], 'case_total' => $_POST['case_total'], 'death_total' => $_POST['death_total'],]]
    );
    if($update){
        echo '<script>alert("Success edited data."); document.location="display.php?page=tampil_mng";</script>';
    }else{echo '<div class= "alert alert-warning">Failed to add data.</div>';
    }
 }
?>

<form action="display.php?page=edit_mng&id=<?php echo $id; ?>" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">country</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="country" class="form-control" size="4" value="<?php echo $dt->country;?>" readonly required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">Case Total</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="case_total" class="form-control" size="4" value="<?php echo $dt -> case_total ;?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 label-align">Death Total</label>
        <div class="col-md-6 com-sm-6">
        <input type="text" name="death_total" class="form-control" size="4" value="<?php echo $dt -> death_total;?>" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 com-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        <a href="display.php?page=tampil_mng" class="btn btn-warning">Back</a>
        </div>
    </div>
</form>
</div>