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
    <link rel="stylesheet" href="transfer_money.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
        include 'nav.php';
    ?>


    <?php
        $link=mysqli_connect("localhost","root","","new_sparks_bank") or die("<p>Database not connected".mysqli_connect_error()."</p>");

        session_start();
        $_SESSION['a'] = $_POST['id_number'];
        $a=$_SESSION['a'];
        $sql="SELECT * FROM new_all_customers WHERE ID='$a'";
        $check=mysqli_query($link,$sql);
        if(!$check)
        {
            die("<p>Data not found in the database".mysqli_error($link)."</p>");
        }

        $row=mysqli_fetch_array($check);
        $id=$row['ID'];
        $name=$row['name'];
        $email=$row['email'];
        $balance=$row['balance'];
    ?>

<div class='bank'>Transfer money</div>

        <?php
            $a = $_SESSION['a'];
            if(isset($_POST['transfer']))
            {
                if($_POST['name'] && $_POST['amount'])
                {
                    $i=$_POST['name'];
                    $amount=$_POST['amount'];

                    $sql="SELECT * FROM new_all_customers WHERE ID='$a'";
                    $check=mysqli_query($link,$sql);

                    $row=mysqli_fetch_array($check);
                    $sender=$row['name'];
                    $balance=$row['balance'];
                    $balan=$row['balance'];
                    $balance=$balance-$amount;
                    if($balance>=0 && $balance<=$balan)
                    {
                        $sql="UPDATE new_all_customers SET balance='$balance' WHERE ID='$a'";
                        $check=mysqli_query($link,$sql);
    
                        $sql="SELECT * FROM new_all_customers WHERE ID='$i'";
                        $check=mysqli_query($link,$sql);
                        $row=mysqli_fetch_array($check);
                        $reciever=$row['name'];
                        $balance=$row['balance'];
                        $balance=$balance+$amount;

                        $sql="UPDATE new_all_customers SET balance='$balance' WHERE ID='$i'";
                        $check=mysqli_query($link,$sql);

                        //transaction table
                        // $sql="INSERT INTO new_transaction_history(sender,reciever,amount) VALUES ('$sender','$reciever','$amount')";
                        // $check=mysqli_query($link,$sql);
                        echo "<script>alert('Transaction Successful')</script>";
                    }
                    else{
                        echo "<script>alert('Transaction Denied!')</script>";
                    }
                }
                else{
                    echo "<script>alert('Invalid Data!')</script>";
                }
            }
        ?>


        <div class="user_information">
            <table> 
                <tr><th colspan="4">Your Account</th></tr>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>

                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $balance; ?></td>
                </tr>
            </table>
        </div>
        

        <?php
            $sql="SELECT * FROM new_all_customers";
            $check=mysqli_query($link,$sql);
            $size=mysqli_num_rows($check);
        ?>
    <div class="transfer_money">
        <form action="" method="post">
            <p>
            <label for="transfer">Transfer To:</label>
            <select name="name" id="transfer" required>
                <option value="" disabled selected>--Select An Option--</option>
                <?php
                    $x=0;
                    while($x < $size)
                    {
                        $row=mysqli_fetch_array($check);
                        $a=$row['ID'];
                        echo "<option value='$a'>".$row['name']."(".$row['balance'].")</option>";
                        $x++;
                    }
                ?>
            </select>
            </p>

            <p>
            <label for="amount">Amount:<?php echo $a; ?></label>
            <input type="number" id="amount" name="amount" placeholder="Amount" required>
            </p>

            <p>
            <button name="transfer" id="transfered" value="transfered">Transfer</button>
            </p>
        </form>


    </div>

    <?php
        include 'footer.php';
    ?>


</body>
<script>
    $(function(){
        $("#submited").button();
        $("#transfered").button();
    });
</script>
</html>