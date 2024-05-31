<?php
    $conn = new mysqli("localhost", "root", "", "student");
     if(!empty($_POST['id'])){
       $id= $_POST['id'];
        $query = "SELECT dname FROM where stream_id = '$id'";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            echo "<option value=''>select department  </option>";
            while($row = $result->fetch_assoc()){
                echo"<option value='.$row['dname'].'>.$row['dname'].</option>";
            }

        }else{
            echo "<option value=;''>department is not avaliable</option>";
        }
     }
?>