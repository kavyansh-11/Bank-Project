<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $link=@mysqli_connect("localhost","root","") or die("<p>Database not connected ".mysqli_connect_error()."</p>");

        $sql="CREATE DATABASE new_sparks_bank";
        $check=mysqli_query($link,$sql);
        if(!$check)
        {
            die("<p>Database not created ".mysqli_error($link)."</p>");
        }

        $link=@mysqli_connect("localhost","root","","new_sparks_bank") or die("<p>Database not found.</p>");
        echo "<p>Database found successfully.</p>";

        $sql="CREATE TABLE new_all_customers(ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,name VARCHAR(50) NOT NULL,email VARCHAR(50) NOT NULL,address VARCHAR(50) NOT NULL,password VARCHAR(30) NOT NULL,balance INT(11) NOT NULL)";
        $check=mysqli_query($link,$sql);
        if(!$check)
        {
            die("<p>Table not created".mysqli_error($link)."</p>");
        }
        echo "<p>Table created successfully.</p>";
    ?>
</body>
</html>