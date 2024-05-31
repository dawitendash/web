<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .side_bar div{
          margin-left: 20px;
         }
        .side_bar{
            width:20%;
            background-color: rgb(255,255,200);
            position: absolute;
            top: 11%;
            left:0;
            bottom:11%;
            text-align:center;
            box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
            border-radius: 0 50px 50px 0;
        }
        
        .nav{
            margin-top: 15%;
        }
        .nav div:hover{
            margin-top: 30px;
            box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
            background-color: wheat;
             
        }
        .nav a{ 
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="side_bar">
       <div class="head">
         <h2>Menu</h2>
       </div>
        <div class="nav" style="margin-top: 15%;">
            <div style="margin-top: 20px; background-color: black; width:150px;" ><a href="student.php">student</a></div>
            <div style="margin-top: 20px; background-color: black; width:150px; "><a href="depart.php">Department</a></div>
            <div style="margin-top: 20px; background-color: black; width:150px;"><a href=" display_by_selection.php">Search Department</a></div>
            <div style="margin-top: 20px; background-color: black; width:150px;"><a href="filter_fetch.php">Search by onchange</a></div>
            <div style="margin-top: 20px; background-color: black; width:150px;"><a href="display_student_information.php"> Student list</a></div>
              <div style="margin-top: 20px; background-color: black; width:150px;"><a href="display_department.php">Department list</a></div>
               <div style="margin-top: 20px; background-color: black; width:150px;"><a href="streamform.php">Stream registration</a></div>
                <div style="margin-top: 20px; background-color: black; width:150px;"><a href="course_registration.php">course registration</a></div>
                <div style="margin-top: 20px; background-color: black; width:150px;"><a href="login.php">Log out</a></div>
        </div>
    </div>
</body>
</html>