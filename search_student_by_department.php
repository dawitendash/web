<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="diplay.css">
     <style>
             .upd, .del{
        border:none;

       }
       
     </style>
</head>
<body>
    <form  action="">
        <div>
             <?php include 'departmentconnection.php'?>
                <?php 
                echo "<select name ='depart'>";  
                $sql= "SELECT dname FROM dep";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<option value='" . $row['dname'] . "'>" . $row['dname'] . "</option>";
                    }
                    echo "</select>";
                }else{
                    echo "there is no record";
                }
                ?>
                <input type="submit" value="submit" name="submit">
        </div>
    </form>
     <h2>student information table </h2>
     <table>
        <thead class="th">
          <tr>
            <td>Fname</td>
            <td>Lname</td>
            <td>university id</td>
            <td>GPA</td>
            <td>Batch</td>
            <td>deptment id</td>
            <td>Actions</td>
          </tr>   
        </thead>
         <?php include 'dbconnection.php'; ?>
         <?php 
          if(isset($_GET['submit'])){
            $id = $_GET['id'];
            $sql = "SELECT *FROM new_student where d_id ='$id'";
          $result = $conn->query($sql);
        
          if($result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){
               $id = $row['u_id'];
          echo "<tr>
          <td>" . $row["fname"] . "</td>
          <td>"  . $row["lname"] . "</td>
          <td>" . $id .          "</td>
          <td>" . $row["gpa"] . "</td>
          <td>" . $row["batch"] ."</td> 
          <td>" . $row["d_id"] . "</td>
          <td>" . 
          "<button class='upd'><a href='update2.php?updateid=".$id."'>update</a></button>
           <button class='del'><a href='update.php?deleteid=".$id."'>Delete</a></button>
           <td></tr>" ;
            }
          }else{
            echo "<p style='color:red' font-weight:bold;>no result</p>";
          }
          }
        ?>   
     </table>      
 
  <script>
    function updateTable(department) {
        window.location.href = "?department=" + department;
    }
</script>
        
  <!-- <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","family.php?q="+str,true);
    xmlhttp.send();
  }
}
</script> -->

    
</body>
</html>