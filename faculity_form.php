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
                 border-radius: 50px 0 0 50px;
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
        }
        p{
            position: absolute;
            top:0;
        }
    </style>
</head>
<?php  
$servername="localhost";
$username= "root";
$password="";
$dbname="student";
$conn= new mysqli( $servername,$username,$password,$dbname ); 
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
            <input type="text" name="fname"  required>

        </div>
       
        <div>
            <label for="u_id">u_id</label>
            <input type="password" name="f_id" id="id">
            <span id="error"></span>
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
    <?php
     $message="";
        $message2="";
        if(isset($_POST['submit'])){
        $f_name=$_POST['fname'];
         $f_id=$_POST['f_id'];
          $select = "SELECT id FROM faculty where id = '$f_id'";
         $checkid = mysqli_query($conn,$select) or die("Unable to select from student because:");
       if(mysqli_num_rows($checkid)== 0){
//$depart_name = "SELECT dname FROM dep WHERE did='$d_id'";
 $query = "INSERT INTO faculty(	id,faculty_name ) VALUES('$f_name','$f_id')";
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