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
       h1{
        margin-bottom: 70px;
       }
      
    </style>
    
</head>
<body class="body main-page">
    <div><?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div>
<div class="div">
   <h1>Students by Department</h1>
    <form style="margin-bottom:20px; position:absolute; left:0; bottom: 68%; top:25%; width:95%;" class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
       <?php
       $message = "";
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "student";
       
       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       $queryy = "SELECT dname FROM dep";
       $result = $conn->query($queryy);
       // Check if there are results
       if ($result->num_rows > 0) {
           // Start the select element
           
           echo '<select style="width:60%; padding:10px; margin-top: 20px;" title="Search here" name="department" id="department" required onchange="updateTable(this.value)">';
           
          echo '<option value=""> select here to search</option>';
           while($row = $result->fetch_assoc()) {
       
               echo '<option value="'. $row['dname']. '">'. $row['dname']. '</option>';
           }
           
         
           echo '</select>';
       } else {
           echo "0 results";
       }
      ?>
    </form>
</div>
     <table id="student-table">
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        $department = isset($_GET['department'])? $_GET['department'] :'';
            echo "<table id='student-table'>";
                echo "<thead class='th'>";
                echo "<tr>";
                echo " <td>Firstname</td>";
                echo " <td>Last name</td>";
                echo "<td>university id</td>";
                echo " <td>GPA</td>";
                echo "<td>Datch</td>";
                echo "<td>Deptment id</td>";
                echo "<td>Action </td>";
                echo "</tr>";
                echo "</thead>";
        if (!empty($department)) {

            $sql = "SELECT *FROM new_student WHERE d_id= '$department'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                      $id = $row['u_id'];
                    echo "<tr>";
                    echo "<td>". $row["fname"] . "</td>";
                    echo "<td>" . $row["lname"] . "</td>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $row["gpa"] . "</td>";
                    echo "<td>". $row["batch"]. "</td>";
                    echo "<td>" . $row["d_id"] . "</td>";
                    echo "  <td>  
                    <button class='upd'><a style='color: white; ' href='update2.php?updateid=".$id."'>update</a></button>
                    <button  class='del'><a style='color: white; text-decoretion: none;' href='update.php?deleteid=".$id."'>Delete</a></button>
                    </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red; font-weight:bold;'>Department of <span class='spanmessage'>  $department  </span>has No Record</p>";
            }
        }
        $conn->close();
        ?>
     </table>      
<script>
    function updateTable(department) {
        window.location.href = "?department=" + department;
    }
</script>
</body>
</html>