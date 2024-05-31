<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="stream">steam</label>
    <?php
    // Create connection
       $conn = new mysqli("localhost", "root", "", "student");
       $queryy = "SELECT stream_name FROM stream";
       $result = $conn->query($queryy);
       // Check if there are results
       if ($result->num_rows > 0){
           // Start the select element
           echo '<select style="width:10%;" title="Search here" name="stream" id="stea_id" required onchange="updateTable(this.value)">';
           
         
           while($row = $result->fetch_assoc()) {
       
               echo '<option value="'. $row['stream_name']. '">'. $row['stream_name']. '</option>';
           }
           
         
           echo '</select>';
       } else {
           echo "0 results";
       }
      ?>

      <div>
        <label for="department">department</label>
        <select name="department" id="dep_id">
            <option value="">---first select stream---</option>
        </select>
      </div>
</body>
</html>