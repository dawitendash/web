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
       }
       tbody tr td{
   background-color:  rgb(40,100,100);

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
      
    </style>
   <!-- // <link rel="stylesheet" href="student.css"> -->
</head>
<body>
      <div>  <?php include 'menu.php'?></div>
   <!-- <div> <?php include 'footer.php' ?></div> -->
   <div> <?php include 'header.php' ?></div>
   <div class="main-page">
     <h2>student information table </h2>
     <table>
        <thead class="th">
          <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>university id</td>
            <td>GPA</td>
            <td>Batch</td>
            <td>Deptment id</td>
            <td>Actions</td>
          </tr>   
        </thead>
        <tbody>
           <?php include 'dbconnection.php'; ?>
         <?php 
          $sql = "SELECT * FROM new_student";
          $result = $conn->query($sql);       
          if($result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){
          $id = $row[ 'u_id'];
          echo "<tr>
          <td>" . $row["fname"] . "</td>
          <td>"  . $row["lname"] . "</td>
          <td>" . $id .          "</td>
          <td>" . $row["gpa"] . "</td>
          <td>" . $row["batch"] ."</td> 
          <td>" . $row["d_id"] . "</td>
          <td>" . 
          "<button class='upd'><a style='color: white; ' href='update2.php?updateid=".$id."'>update</a></button>
           <button  class='del'><a style='color: white; text-decoretion: none;' href='update.php?deleteid=".$id."'>Delete</a></button>
           <td></tr>" ;
            }
          }else{
            echo "no result";
          }
         
        ?>  
        
        </tbody> 
     </table>      
   </div>
</body>
</html>