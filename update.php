 <?php
$conn= new mysqli( "localhost","root","","student"); 
if(!$conn){
  die('error in db' . mysql_error($conn));
}
    $delid = $_GET['deleteid'];
    $sql = " DELETE  FROM new_student  where u_id = $delid";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "deleted successfully";
    }else{
       echo "unable to delete";
    }
  
  ?>