
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