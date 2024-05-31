<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="diplay.css">
  <style>
    table {
            width:10px ;
            border-collapse: collapse;
            width:95%;
        }
        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
            background-color:  rgb(40,100,100);
        }
        th {
            background-color: #f2f2f2;
        }
    .class{
        padding: 15px;
       }
    .div{
        padding: 15px;
        padding-bottom: 20;
        
       }
       form{
        margin-bottom:20px;
       }
       body{
        background-color: white;
       }
       .upd, .del{
        border:none;
       }
       .upd a, .del a{
        text-decoration:none;
       }
       .upd:hover, .del:hover{
        box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.5);
       }
       span{
        color:black;
        font-weight:bold;
       }
       select{
        width:30%;
       }
    </style> 
</head>
<body class="body main-page">
    <div><?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div>
<div class="div">
    <h2>student information table </h2>
    <form style="margin-bottom:20px; position:absolute; left:0; bottom: 68%; " class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
       <?php
       $message = "";
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "student";
       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       $queryy = "SELECT id FROM stream";
       $result = $conn->query($queryy);
       // Check if there are results
         if($result->num_rows > 0){
           // Start the select element
           echo "<label for='stream'></label>";
           echo '<select style="width:150%;" title="Search here" name="stream" id="stream" required onchange="updatedepartment(this.value)">';
           while($row = $result->fetch_assoc()){
             echo '<option value="'. $row['id']. '">'. $row['id']. '</option>';
           }
           echo '</select><br>';
       }else{
           echo "0 results";
       }
    //    if ($result->num_rows > 0) {
    //        // Start the select element
    //        echo '<select style="width:150%;" title="Search here" name="department" id="department" required onchange="updateTable(this.value)">';
           
         
    //        while($row = $result->fetch_assoc()) {
       
    //            echo '<option value="'. $row['dname']. '">'. $row['dname']. '</option>';
    //        }
           
         
    //        echo '</select>';
    //    } else {
    //        echo "0 results";
    //    }
      ?>
    </form>
</div>
     <br><br>
     <select id="student-table">
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        $department = isset($_GET['stream'])? $_GET['stream'] :'';
        if (!empty($department)){
            $sql = "SELECT dname FROM dep WHERE stream_id = '$department'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
          echo '<option value="'. $row['dname']. '">'. $row['dname']. '</option>';
                }
                echo "</select>";
             }// else {
            //     echo "<p style='color:red; font-weight:bold;'>Department of <span class='spanmessage'>  $department  </span>has No Record</p>";
            // }
        }
        $conn->close();
        ?>
          
<script>
    function updatedepartment(stream) {
        window.location.href = "?stream =" + stream;
    }
</script>
</body>
</html>