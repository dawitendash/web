`<?php
 $conn = new mysqli("localhost", "root", "", "student");
 $id =$_POST["id"];
 $result = mysqli_query($conn,"SELECT dname FROM dep where stream_id ='$id");
  
?>
<option value="">select</option>
<?php
while($row= mysqli_fetch_array($result)){
    echo "<potion value='.$row['dname'].'>.$row['dname']</potion>"
}
?>