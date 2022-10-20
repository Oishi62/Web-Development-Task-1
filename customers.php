
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">
        <title>WELCOME</title>
        <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                background: linear-gradient(to bottom,#ACE1AF,10%,#90EE90,50%,#50C878);
                font-family: 'Klee One';
                font-weight: bold;
            }
            hr{
                border-style: dotted none none none;
                height:0;
                border-width: thick;
                border-color:black;
                margin:0 auto 0 auto;
            }
            #cloud1{
                position: relative;
                height:70px;
                left:70px;
                top:-50px;
            }
            #cloud2{
                position: relative;
                height:70px;
                left: 850px;
                top:-120px;
            }
            /*#mount{
                position: relative;
                left:390px;
                top:-100px;
            }*/
            #center{
                height:500px;
                width:600px;
                background-image: url(mountain.png);
                background-repeat:no-repeat;
                background-size: 600px 500px;
                border:solid 2px black;
                margin-left:20px;
            }
            a{
                text-decoration: none;
                color: yellow;
            }
        </style>
    </head>
    <body>
        <br><br>
        <hr style="width:60%">
        <h1 style="text-align: center;color:red;">METRO BANK</h1><br>
        <hr style="width:40%"><br><br>
        <img src="cloud.png" alt="error" id="cloud1">
        <img src="cloud.png" alt="error" id="cloud2">
       <br>
       <!--<img src="mountain.png" alt="error" id="mount">-->
       <center>
    <div id="center"><br><br>
    <?php
    
    $server="localhost";
    $username="root";
    $password="";
    $connection=mysqli_connect($server,$username,$password);
    echo "The list of customers present in the bank are :- <br>";
    $db="bank";
    $table="customers";
    $connection=mysqli_connect($server,$username,$password,$db);
    $sql2="select * from $table";
    $result2=mysqli_query($connection,$sql2);
    echo "<table style='padding:10px'><tr>";
    $count=0;
    while($row=mysqli_fetch_assoc($result2))
    {
        $count++;
        $name=$row["Customer_Name"];
        if($count>2)
        {
            echo "<th style='padding:10px'>".$name."</th>";
            echo "</tr>";
            $count=0;
        }
        else
            echo "<th style='padding:10px'>".$name."</th>";
       
    }
    echo "</table>";
    ?>
    <br><br><br><br>
    <a href="form.html">Click here to transfer money</a>
    </div>
    </center>
    <br><br>
    </body>
    </html>