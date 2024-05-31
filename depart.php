<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="depart.css">
</head>
<style>
    .error{
        color: red;
    }
    .ff{
        margin-top:50px;
    }
    p{
       font-weight:bold;
        position:absolute;
        top:0;
        
    }
 
    form{
        margin-left: 30%;
        margin-top:100px;
        padding:20px
    }
    form input{
    display: block;
    width: 70%;
}
form input[type="submit"],form input[type="reset"]{
    background-color: rgb(0, 98, 255);
    border:none;
    width:50px;
     margin-left: 30px;
     border-radius: 5px;
     padding:7px;

}
form input[type="reset"]{
    background-color: red;
}
form{
    margin-bottom: 100px;
}
  .main-page{
   margin-top: 6%;
   padding-top:50px;
   box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
   margin-left:21%;
   margin-bottom: 5%;
    background-color: rgb(255,255,200);
    border-radius:20px 0 0 20px;
    margin-bottom: 11%;
       }
.main-page form{
   background-color: rgb(0,0,100);
    color: white;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    width:  40%;
    height: 300px;
    margin-left: 20%;
    margin-bottom: 100px;
}
p{
    position:absolute;
    top:12%;
    left:22%;
}
.flex{
    display:flex;
}
</style>
<body>
    <div>  <?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div>
    
     
      
  <div class="main-page">
      <form action=" " method="post" id="form">
        <div class="ff">
            <label for="Department name">Department name:</label>
            <input  id="depart" type="text" name="dep_name" required>
            <span  id="error"></span>
        </div>
        <div>
            <label for="Department id">Department code:</label>
            <input id="id" type="text" name="id" required>
            <span id="error"></span>
        </div>
        <div>
            <label for="start date ">Start date</label>
            <input id="start" type="date" name="start" required>
            <span id="error"></span>
        </div>
        <div>
            <label for="end date">End date</label>
            <input id="end" type="date" name="end" required>
            <span id="error"></span>
        </div>
       <div class="flex">
         <div>
            <input type="submit" name="submit" value="submit" >
        </div>
         <div>
            <input type="reset" name="Reset" value="reset" >
        </div>
       </div>
    </form>
  </div>
    
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
<p class="pp" style="color:red;"><?php echo $message ?></p>
<p style="color:green;"><?php echo $message2 ?></p>
 
        
    <script>
        // const form = document.getElementById('form');
        // form.addEventListener('submit', function(event) {
        //     event.preventDefault(); // Prevent the form from submitting

        //     const dname = document.getElementById('depart').value;
        //     const d_id = document.getElementById('id').value;
        //     const star = document.getElementById('start').value;
        //     const end = document.getElementById('end').value;
        //     const error = document.getElementById('error');

        //     if (dname.length < 5) {
        //         error.innerHTML = "Department name is required";
        //     } else {
        //         error.innerHTML = ""; // Clear any previous error message
        //         // Perform form submission or other actions here
        //     }
        // });
    </script>
</body>
</html>