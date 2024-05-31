
<?php
$message = ""; 
$message2 = ""; 
$servername="localhost";
$username= "root";
$password="";
$dbname="student";
$conn= new mysqli( $servername,$username,$password,$dbname );

if($conn->connect_error){
    die("Error in connection".$conn->connect_error);
}
   if(isset($_POST['submit'])){
     
        $dname=$_POST['dep_name'];
        $did=$_POST['id'];
        $star=$_POST['start'];
        $end=$_POST['end'];
        $select = "SELECT did FROM dep where did = '$did'";
        $select2 = "SELECT dname FROM dep where dname = '$dname'";
         $checkid = mysqli_query($conn,$select) or die("Unable to select from student because:");
         $checkname = mysqli_query($conn,$select2) or die("Unable to select from student because:");
        if(mysqli_num_rows($checkid)== 0 && mysqli_num_rows($checkname)== 0){
//$depart_name = "SELECT dname FROM dep WHERE did='$d_id'";
 $query = "INSERT INTO dep(dname,did,stat_date,end_date ) VALUES('$dname','$did','$star','$end')";
 $excute = mysqli_query($conn,$query) or die("unable to  insert the recored , because of ");
if($excute){
    // $message="";
     $message2 = "successfully inserted";
  }
 }else{
   //$message="";
    $message= "the department id and department name must be unique";
    

 }
}

?>