<?php include("db.php"); ?>
<?php
          $query = "SELECT * FROM artist";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <h4><?php echo $row['id']; ?></h4>
            <h4><?php echo $row['record_label_id']; ?></h4>
            <h4><?php echo $row['name']; ?></h4>
          <?php } ?>