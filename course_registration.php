<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            background-color:rgb(0,155,122);
            width:35%;
            padding:20px;
            font-weight:bold;
            color:black;
            box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
        }
        .main{
            background-color:;
            margin-left: 21%;
            padding:5px;
            margin-top:6%;
        }
        input[type="text"],  input[type="number"]{
            display:block;
            margin-top:10px;
            margin-bottom:10px;
            width:70%;
        }
        .flex{
            display:flex;
            margin-left:20px;
        }
        input[type="reset"]{
            background-color:red;
        }
        input[type="submit"]{
            background-color:blue;
        }
        input[type="reset"]:hover,input[type="submit"]:hover{
          box-shadow:5px 5px 5px 5px rgba(0,0,0,0.5);
        } 
        input[type="reset"], input[type="submit"]{
            width:100%;
            margin-left:20px;
            border:none;
            color:white;
            margin-right:20px;
        }
        input[type="checkbox"]{
            display:flex;
            width:10%;
        }
        .flex div{
          margin-right:20px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
   <div> <?php include 'menu.php' ?></div>
   <div><?php include 'header.php'?></div>
 
   <div class="main">
    <div><h1>course registration</h1></div>
    <form action="">
         <div>
            <label for="course code">course code</label>
            <input type="text" required name="course_code"/>
         </div>
          <div>
            <label for="course title">course title</label>
            <input type="text" required name="course_title"/>
         </div>
          <div>
            <label for="credithour">credit hour</label>
            <input type="number" required name="credit_hour"/>
         </div>
          <div >
            <label class="islab" for="islab">islab</label>
            <input class="lab" type="checkbox" required name="islab"/>
         </div>
          <div>
            <label for="istutorial">is tutorial</label>
            <input class="istut" type="checkbox" required name="istutorial" />
         </div>
          <div class="show" hidden>
            <label class="tutorial" for="tutorial" >tutorial</label>
            <input hidden class="tutor" type="number"  required name="tutorial"/>
         </div>
          <div class="lab_show"  hidden>
            <label for="lab">lab</label>
            <input  type="number" required name="lab"/>
         </div>
          <div>
            <label for="department">department</label>
            <input type="text" required name="dpartment"/>
         </div>
          <div>
            <label for="active batch">active bacth</label>
            <input type="number" required name="active_batch"/>
         </div>
          <div>
            <label for="active semister">active semister</label>
            <input type="number" required name="active_semister"/>
         </div>
          <div class="flex">
              <div>
                <input type="submit" name="submit" value="submit"/>
              </div>
              <div>
                <input type="reset" name="reset" value="reset"/>
              </div>
         </div>
    </form>
   </div>
   <script>
    
    $(document).ready(function(){
        $(".istut").click(function(){
            $(".show").show();});   
   }); 
   
   $(document).ready(function(){
        $(".lab").click(function(){
            $(".lab_show").show();
        });
         
   }); 
   </script>
    
</body>
</html>