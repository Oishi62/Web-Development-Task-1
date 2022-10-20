<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Klee+One&display=swap" rel="stylesheet">

    <style>
        #d{
            text-align:justify;
            margin-left:350px;
            margin-top:20px;
            width:700px;
            height:700px;
            color:white;
            background-color:grey;
        }
        
        #d:hover{
            background-color:skyblue;
            color:black;
            box-shadow: 0 0 8px 8px skyblue;
            width:710px;
            height:710px;
        }
    
    </style>
    </head>
    
    <body style="background: linear-gradient(to right,silver,grey);font-family:Klee One;text-align:center;font-weight: bold; ">
        <div id="d">
    </body>
</html>


<?php


$server="localhost";
$username="root";
$password="";
$connection=mysqli_connect($server,$username,$password);

$db="bank";
/*$sql1="create database $db";
$result1=mysqli_query($connection,$sql1);
if($result1== true)
        echo "Database created<br>";
else
        echo "Database couldn't be created<br>";*/

$connection=mysqli_connect($server,$username,$password,$db);

$send=$_REQUEST["T1"];
$recep=$_REQUEST["T2"];
$money=$_REQUEST["T3"];
$tablename="transfers";

$sql2="select count(*) as 'num' from $tablename";
$result2=mysqli_query($connection,$sql2);
$row=mysqli_fetch_assoc($result2);
$count = $row['num'];
$count=$count+1;

$sql4="insert into $tablename values('$count','$send','$recep','$money')";
$result4=mysqli_query($connection,$sql4);
$sql3 = "UPDATE `customers` SET `Current_Balance`=`Current_Balance`-$money WHERE `Customer_Name`='$send';";
$result3=mysqli_query($connection,$sql3);

$sql5 = "UPDATE `customers` SET `Current_Balance`=`Current_Balance`+$money WHERE `Customer_Name`='$recep';";
$result5=mysqli_query($connection,$sql5);

$sql6="select * from `customers` where Customer_Name='$send'";
$result6=mysqli_query($connection,$sql6);
$row=mysqli_fetch_assoc($result6);
$bal=$row["Current_Balance"];

echo "TRANSACTION SUCCESSFULL<br>";
echo "Thank you, ".$send." for using our services.<br>";
echo "You have successfully sent ₹".$money." to ".$recep;
echo "<br>Your current balance is ".$bal;
echo "<br>HAVE A GOOD DAY<br>";
echo "<a href='customers.php'>CLICK HERE TO VIEW CUSTOMERS</a>";
?>