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
    <link rel="stylesheet" href="your_account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <div class="bank">Check your balance.</div>

    <div class="transfer_money">
        <form action="" method="post">
            <p>
            <label for="id">Enter Your ID:</label>
            <input type="number" id="id" name="id" placeholder="Enter Your ID" required>
            </p>

            <p>
            <button name="check" id="checking" value="check">Check Balance</button></p>
        </form>
    </div>

    <?php
        $link=mysqli_connect("localhost","root","","new_sparks_bank");
        if(isset($_POST['check']))
        {
            if($_POST['id'])
            {
                $id=$_POST['id'];
                $sql="SELECT * FROM new_all_customers WHERE ID='$id'";
                $check=mysqli_query($link,$sql);
                $row=mysqli_fetch_array($check);
                if($row)
                {
                    echo "
                    <div class='sparks_table'>
                    <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                    </tr>";

                    echo "
                    <tr>
                        <td>".$row["ID"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["balance"]."</td>
                    </tr>";
                    echo "
                    </table>
                    </div>"; 
                }
                else{
                    echo "<script>alert('Invalid ID!')</script>";
                }
            }
            else{
                echo "<script>alert('Invalid I!')</script>";
            }
        }
    ?>

    <?php
        include 'footer.php';
    ?>
</body>
<script>
    $(function(){
        $("#checking").button();
    });
</script>    
</html>