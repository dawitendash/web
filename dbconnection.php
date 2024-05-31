<?php
$servername="localhost";
$username= "root";
$password="";
$dbname="student";
$conn= new mysqli( $servername,$username,$password,$dbname ); 
if($conn->connect_error){
    die("Error in connection".$conn->connect_error);
}
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
      echo "registered successfully";
  }else{
   
  }

  }
  else{
    echo "university id already exist try in different";
 }
}
?>