<?php
require_once("config.php");?>
<center><font size="6">Insert data by csv file</font></center>
<hr>

<?php 
if(isset($_POST['submit'])){
    if($_FILES['file']['name']){
        $filename = explode('.', $_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while($data = fgetcsv($handle)){
                $item1 = mysqli_real_escape_string($koneksi, $data[0]);
                $item2 = mysqli_real_escape_string($koneksi, $data[1]);
                $item3 = mysqli_real_escape_string($koneksi, $data[2]);
                $sql = "insert into covid (country, case_total, death_total) values ('$item1', '$item2', '$item3')";
                mysqli_query($koneksi, $sql);
            }
            fclose($handle);
            echo '<script>alert("Success added data."); document.location="display.php?page=csv_mhs";</script>';
        }
    }
}



?>


<form action="display.php?page=csv_mhs" method="post" enctype="multipart/form-data">
    <div class="item form-group">
        <label class="col-form-label col-md-3 com-sm-3 label-align">Select your file .csv</label>
        <div class="col-md-6 col-sm-6">
        <input type="file" name="file">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Insert">
        </div>
    </div>
</form>