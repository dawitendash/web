
<?php
$servername="localhost";
$username= "root";
$password="";
$dbname="student";
$conn= new mysqli( $servername,$username,$password,$dbname ); 
if($conn->connect_error){
    die("Error in connection".$conn->connect_error);
}
echo 'connected';
   if(isset($_POST['submit'])){
        $name=$_POST['name'];
         $u_id=$_POST['u_id'];
        $date=$_POST['date'];
         $gpa=$_POST['gpa'];
         $batch=$_POST['batch'];
         $dep=$_POST['dep'];
         $gender=$_POST['gender'];
         $remark=$_POST['comment'];

//$depart_name = "SELECT dname FROM dep WHERE did='$d_id'";
 $query = "INSERT INTO student(name,u_id,date,gpa,batch,dep,gender,comment) VALUES('$name','$u_id','$date','$gpa','$batch','$dep','$gender','$remark')";
 $excute = mysqli_query($conn,$query) or die("unable to  insert the recored , because of ".mysql_error());
if($excute){
     $message = "successfully inserted";
  }
 }
?>