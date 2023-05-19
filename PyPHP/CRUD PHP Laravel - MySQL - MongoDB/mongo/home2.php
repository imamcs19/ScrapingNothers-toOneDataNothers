<?php require_once("config.php") ?>


    <div class="container" style="margin-top: 20px">
        <center><font size="6">Covid-19 Data Table</font></center>
        <hr>
        <a href="display.php?page=tambah_mng"><button class="btn btn-dark right">Insert Data</button></a>
  
        <div class="table-responsive">
        <table class="table table-striped jambo_table bulk action">
        <thead>
            <tr>
                <th>Country</th>
                <th>Total Case</th>
                <th>Death total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
					require 'config.php';
					$Data = $collection->find();
					foreach ($Data as $dt) {
						echo "<tr>";
						echo "<td>".$dt->country."</td>";
						echo "<td>".$dt->case_total."</td>";
						echo "<td>".$dt->death_total."</td>";
						echo "<td>";
						echo "<a href = 'display.php?page=edit_mng&id=".$dt->_id."' class='btn btn-secondary btn-sm'>Edit</a>";
						echo "<a href = 'mongo/delete.php?id=".$dt->_id."' class='btn btn-danger btn-sm' onclick='return confirm(\'Are you sure want to delete this?\')'>Delete</a>";
						echo "</td>";
						echo "</tr>";
                 
					}
				?>
        </tbody>

        </table>
    
    
    </div>

</div>









