<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="student.css">
    <style>
            .main-page{
                margin-top: 6%;
                box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
                 background-color: rgb(255,255,200);
                margin-left:21%;
                margin-bottom:10%;
               padding-left: 50px;
                 border-radius: 20px 0 0 20px;
                 height:100%;
       }
        form{
            position: relative;
            margin
        }
        .rr{
            margin-top:50px;
        }
        #error{
            color:red;
            font-weight:bold;
        }
        p{
        
            position: absolute;
            top:7%;
        }
    </style>
</head>
<?php  
$servername="localhost";
$username= "root";
$password="";
$dbname="student";
$conn= new mysqli($servername,$username,$password,$dbname ); 
if($conn->connect_error){
    die("Error in connection".$conn->connect_error);
}
   
?>
<body>
    <div>  <?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div> 
   <div class="main-page">
     <form   method="post" id="form" <?php echo $_SERVER['PHP_SELF'];?>>
        <div class="rr">
            <label for="Fname">Fname</label>
            <input type="text" name="fname" min="5" required>
        </div>
        <div>
            <label for="Lname">Lname</label>
            <input type="text" name="lname" min="5" required>
        </div>
        <div>
            <label for="u_id">u_id</label>
            <input type="password" name="u_id" id="id">
            <span id="error"></span>
        </div>
        <div>
            <label for="gpa">gpa</label>
            <input type="number" name="gpa" min="2.0" max="4.0" step="0.01" required>
        </div>
        <div>
            <label for="batch">batch</label>
            <input type="number" name="batch" min="1" max="6" required>
        </div>
         <div>
            <label for="depart">Stream</label><br>
             <?php include 'departmentconnection.php'?>
                <?php 
                echo "<select name ='stream' >";  
                $sql= "SELECT stream_name FROM stream";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<option value='" . $row['stream_name'] . "'>" . $row['stream_name'] . "</option>";
                    }
                    echo "</select>";
                }else{
                    echo "no result";
                }
                ?>
        </div>
         <!-- <div>
            <label for="depart">Faculty</label><br>
             <?php include 'departmentconnection.php'?>
                <?php 
                // echo "<select name ='faculty_name' >";  
                // $sql= "SELECT faculty_name FROM faculty";
                // $result = $conn->query($sql);
                // if($result->num_rows > 0){
                //     while($row = $result-> fetch_assoc()){
                //         echo "<option value='" . $row['faculty_name'] . "'>" . $row['faculty_name'] . "</option>";
                //     }
                //     echo "</select>";
                // }else{
                //     echo "no result";
                // }
                ?>
        </div> -->
        <div>
            <label for="depart">department</label><br>
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
                    echo "no result";
                }
                ?>
        </div>

       <div class="flex">
         <div>
            <input type="submit" value="submit" name="submit">
        </div>
         <div>
            <input type="reset" value="reset" name="reset">
        </div>
       </div>
    </form>
    <?php echo "<a href='display_student_information.php'> back to the table </a>";?>
    <?php
     $message="";
        $message2="";
        if(isset($_POST['submit'])){
       
        $f_name=$_POST['fname'];
        $l_name=$_POST['lname'];
         $u_id=$_POST['u_id'];
         $gpa=$_POST['gpa'];
         $batch=$_POST['batch'];
         $d_id=$_POST['depart'];
          $select = "SELECT u_id FROM new_student where u_id = '$u_id'";
         $checkid = mysqli_query($conn,$select) or die("Unable to select from student because:");
       if(mysqli_num_rows($checkid)== 0){
//$depart_name = "SELECT dname FROM dep WHERE did='$d_id'";
 $query = "INSERT INTO new_student(fname,lname,u_id,gpa,batch,d_id) VALUES('$f_name','$l_name','$u_id','$gpa','$batch','$d_id')";
 $excute = mysqli_query($conn,$query) or die("unable to  insert the recored , because of ".mysql_error());
if($excute){
     $message = "successfully inserted";
     // echo "registered successfully";
  }else{
   
  }

  }
  else{
   $message2= "university id already exist try in different";
 }
}
  ?>
  <P style="color:red; font-weight:bold;"> <?php echo$message2?></P>
  <P  style="color:green; font-weight:bold;"> <?php echo$message?></P>
   </div>
    <script>
        const form = document.getElementById('form');
        const id = document.getElementById('id').value;
         const error = document.getElementById('error').value;


// Add an event listener for the click event
form.addEventListener('submit', function(event) {
    if(id.lenght < 9 )
    error.innerHTML ='id must be 9 character';
  
    // Add your code here to handle the click event
});
    </script>
</body>
</html>