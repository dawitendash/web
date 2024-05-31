
     <?php
  include 'dbconnection.php';
  if(isset($_POST['update'])){
    
        $f_name=$_POST['fname'];
        $l_name=$_POST['lname'];
        $id=$_POST['u_id'];
        $gpa=$_POST['gpa'];
        $batch=$_POST['batch'];
        $d_id=$_POST['d_id'];
    $sql = "UPDATE new_student SET fname = '$f_name',lname='$l_name',u_id='$id',gpa='$gpa',batch='$batch', d_id= '$d_id'";
    $result = mysqli_query($conn,$sql);
      if($result){
        echo 'updated successfully';
    }else{
        die(mysqli_error($conn));
    }
  }

  ?>
    