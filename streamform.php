<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .main{
             margin-left:22%;
             margin-top:6%;  
             background-color:   rgb(255,255,200);  
             padding-left:20px;  
             padding-bottom:20px;  
            box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
            border-radius: 20px 0 0 20px;
            height: 100%;
             
        }
        form{
            background-color: rgb(39,80,200);
            color:white;
            font-weight:bold;
            width:50%;
            height:30%;
            padding:20px;
        }
        .inner{
            margin-left:20px
        }
        
        input[type="text"] {
            margin-top:10px;
            display:block;
             width:90%;
        }
        input[type="reset"], input[type="submit"]{
              border: none;
            width:30%;
            margin-left: 10px;
              color:white;
              font-weight:bold;
        }
        input[type="reset"]:hover, input[type="submit"]:hover{
            box-shadow: 10px 10px 15px rgba(0,0,0,0.5);box
        }
        input[type="reset"]{
            background-color:red;
        }
        input[type="submit"]{
             background-color:blue;;
           
        }
        .flex{
            margin-top:10px;
            display:flex;
             margin-left:50px;
        }
    </style>
</head>
<body> 
     <div>  <?php include 'menu.php'?></div>
   <div> <?php include 'footer.php' ?></div>
   <div> <?php include 'header.php' ?></div>
   <div class="main">
    <div>
        <h1>college registration</h1>
    </div>
    <form action="">
     <div class="inner">
         <div>
          <label for="stream">Stream:</label>
          <input type="text" id="name" name="stream" required/>
      </div>
      <div>
          <br><label for="stream">Stream code:</label>
          <input type="text" id="name" name="id" required/>
      </div>
      <div class="flex">
        <input type="submit" value="submit" name="submit"/>
        <input type="reset" value="reset" name="reset"/>
      </div>
     </div>
    </form>
   </div>
   
<?php
$conn= new mysqli( "localhost","root","","student" );
if($conn->connect_error){
    die("Error in connection".$conn->connect_error);
}
if(isset($_POST['submit'])){
    $stream = $_POST['stream'];
    $id = $_POST['id'];
$insert = "INSERT INTO stream(id,stream_name) VALUES('$id','$stream')";
$excute = mysqli_query($conn,$insert) or die("unable to insert");
if($excute){
    echo "successfully inserted";
}else{
    echo "unable to insert";
}
}
?>
</body>
</html>