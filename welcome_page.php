<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        margin-top:10%;
            background-color: rgb(12,80,140);
            color:white;
        }
        .mainpage{
            display:flex;
            justify-content:center;
            text-align:center;   
        }
        .login-list{
            display:flex;
           justify-content:center;
            text-align:center;
        }
        .login-list ul{
            display:flex;
         
        }
        .login-list ul li a{
          text-decoration:none;
          color: black;
          font-weight:bold;
        }
        .login-list ul li a:hover{
            text-decoration:underline;
            color:grey;
        }
        .login-list ul li {
            list-style-type: none ;
               margin-left:20px;
               background-color:  ;
               width: 130px

        }
    </style>
</head>
<body>
    <div><?php include 'welcome_page _header.php'?></div>
    <div class="mainpage">
        <h1>welcome to woldia university </h1>
    </div>
    <div class="login-list">
        <ul>
            <li><a href="login.php">Login as admin</a></li>
            <li><a href="">Login us user</a></li>
        </ul>

    </div>
    
</body>
</html>