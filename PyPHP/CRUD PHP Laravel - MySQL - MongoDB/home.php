<?php require_once("config.php") ?>


    <div class="container" style="margin-top: 20px">
        <center><font size="6">Covid-19 Data Table</font></center>
        <hr>
        <a href="display.php?page=tambah_mhs"><button class="btn btn-dark right">Insert Data</button></a>
  
        <div class="table-responsive">
        <table class="table table-striped jambo_table bulk action">
        <thead>
            <tr>
                <th>No. </th>
                <th>Country</th>
                <th>Total Case</th>
                <th>Death total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "Select * from covid Order by case_total DESC";
            $query= mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            
            if(mysqli_num_rows($query)!=0){
                $no = 1;
                
                while($data = mysqli_fetch_assoc($query)){
                    $case = number_format($data['case_total']);
                    $death = number_format($data['death_total']);

                    echo'
                    <tr>
                        <td>'.$no.'</td>  
                        <td>'.$data['country'].'</td>  
                        <td>'.$case.'</td>  
                        <td>'.$death.'</td>  
                        <td> 
                            <a href="display.php?page=edit_mhs&country='.$data['country'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?country='.$data['country'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure want to delete this ?\')">Delete</a>
                        </td>
                    </tr>
                    ';
                    $no++;
                }
            } else {
                echo '
                <tr> 
                    <td colspan= "5">Data is Empty</td>
                </tr>
                    ';
            }
        ?>
        </tbody>

        </table>
    
    
    </div>

    </div>







