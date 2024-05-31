<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header{
           background-image:url('nav.png');
           position: absolute;
           top:0;
           left:0;
           right:0;
           height:15%;  
        }
        .header ul li a{
            text-decoration:none;
            color: white;
            font-weight:bold;
        }
        .header ul li a:hover{
            color: rgb(210,130,203);
        }
        .header ul li{
            float: right;
            margin-right: 30px;
            list-style-type: none;
        }
        img{
            height:10px;
            background:transparent grey;
        }
    </style>
</head>
<body>
    <div class="header">
        <ul>
            <li><img src="aboutus.png" alt=""><a href="">About us</a></li>
            <li><img src="conntact1.png" alt=""><a href="">Contact us</a></li>
            <li><img src="help.png" alt=""><a href="">Help</a></li>
        </ul>
    </div>
</body>
</html>