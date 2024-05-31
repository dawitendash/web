<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="diplay.css">
     <style>
          .main-page{
              margin-top: 6%;
              box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
              margin-left:21%;
            }
            table{
              width:90%;
              margin-left: 10px;
            }
            .upd a, .del a{
              color: white;
              text-decoration:none;
            }
            .upd:hover, .del:hover{
              box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.5);
            }
            th, td{
                  border: 1px solid black;
                  padding: 15px;
                  text-align: left;
                  background-color:  rgb(40,100,100);
              }
              .search{
                margin-left:-5px;
                background-color: rgb(20,20,200);
                border-radius: 5px;
              }
              select{
                padding:2px;
              }
                    span{
              color:black;
              font-weight:bold;
            }
     </style>
    
</head>
<body>
   <div>  <?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div>
  <div class="main-page" style="">
      <form  action="">
        <div>
             <?php include 'departmentconnection.php'?>
                <?php 
                echo "<select name ='depart' >";  
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
                <input class="search" type="submit" value="Search" name="submit">
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
          if(isset($_GET['submit']))
          {
            $id = $_GET['depart'];
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
           </td></tr>" ;
            }
          }else{
             echo "<p style='color:red; font-weight:bold;'>Department of <span class='spanmessage'>  $id   </span>has No Record</p>";
          }
          }
        ?>   
     </table>      
   
  </div>
        
  

    
</body>
</html>