<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/start/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
    </script>
    <link rel="stylesheet" href="transaction_history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';        
    ?>

    <div class='bank'>Transaction history</div>

    <?php
        $link=mysqli_connect("localhost","root","","new_sparks_bank");
        
        $sql="SELECT * FROM new_transaction_history";
        $check=mysqli_query($link,$sql);

        $size=mysqli_num_rows($check);
        $x=0;
        echo "
        <div class='sparks_table'>
        <table>
        <tr>
            <th>ID</th>
            <th>Sender</th>
            <th>Reciever</th>
            <th>Amount</th>
            <th>Date & Time</th>
        </tr>";

        while($x < $size)
        {
            $row=mysqli_fetch_array($check);
            $a=$row["ID"];
            echo "
            <tr>
                <td>".$row["ID"]."</td>
                <td>".$row["sender"]."</td>
                <td>".$row["reciever"]."</td>
                <td>".$row["amount"]."</td>
                <td>".$row["date"]."</td>
            </tr>";
            $x++;
        }
        echo "
        </table>
        </div>";
    ?>

    <?php
        include 'footer.php';
    ?>
</body>
</html>