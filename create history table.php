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
        $link=@mysqli_connect("localhost","root","","new_sparks_bank") or die("<p>Database not found.</p>");
        echo "<p>Database found successfully.</p>";

        $sql="CREATE TABLE new_transaction_history(ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,sender VARCHAR(50) NOT NULL,reciever VARCHAR(50) NOT NULL,amount INT(11) NOT NULL,date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $check=mysqli_query($link,$sql);
        if(!$check)
        {
            die("<p>Table not created".mysqli_error($link)."</p>");
        }
        echo "<p>Table created successfully.</p>";
    ?>
</body>
</html>