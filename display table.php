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
    <link rel="stylesheet" href="display_table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>

<div class="bank">Transfer money</div>

    <?php
        $link=mysqli_connect("localhost","root","","new_sparks_bank");
        
        $sql="SELECT * FROM new_all_customers";
        $check=mysqli_query($link,$sql);

        $size=mysqli_num_rows($check);
        $x=0;
        echo "
        <div class='sparks_table'>
        <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Balance</th>
        </tr>";

        while($x < $size)
        {
            $row=mysqli_fetch_array($check);
            $a=$row["ID"];
            echo "
            <tr>
                <td>".$row["ID"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["balance"]."</td>
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

    </div>
</body>
    <script>
        /*function switch_page()
        {
            window.location.href="sparks bank transfer money.php";
        }*/

    </script>
</html>