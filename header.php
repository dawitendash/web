<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header{
            position: absolute;
            top:0;
            right:0;
            left:0;
            background-color:black;
            height:10%;
            text-align:center;
            color:white;        
        }
        .log-out ul li{
             list-style-type: none;
             color:white;
             width:100px;
             background-color:white;
              margin-right:20px;
        }
        .log-out ul li a{
            margin-right:20px;
            text-decoration:none;
            color:black;
            font-weight:bold;

        }
        .log-out ul li a:hover{
          color:red;
          transition: color 1s;

        }
        
        .log-out{   
            text-align:right;
            position:absolute;
            right:0;
            top:0;
        }
    </style>
</head>
<body>
    <div class="header">
       <div>
        <h1>  Woldia University</h1>
       </div>
       <div class="log-out">
        <ul>
            <li><a href="welcome_page.php">Log out</a></li>
        </ul>
       </div>
    </div>
</body>
</html>