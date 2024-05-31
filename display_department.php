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
     <h2> Department list</h2>
     <table>
        <thead class="th">
          <tr>
            <td>Dpartment code</td>
            <td>Department code</td>
            <td>Start date</td>
            <td>End date</td>
             <td>Action</td>
          </tr>   
        </thead>
        <tbody>
             <?php 
          $conn= new mysqli("localhost","root","","student" ); 
                    if($conn->connect_error){
                die("Error in connection".$conn->connect_error);
            }
          $sql = "SELECT * FROM dep";
          $result = $conn->query($sql);       
          if($result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){
             $id = $row["did"];
          echo "<tr>
          <td>" . $row["dname"] . "</td>
          <td>" . $id .          "</td>
          <td>" . $row["stat_date"] . "</td>
          <td>" . $row["end_date"] ."</td> 
           
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