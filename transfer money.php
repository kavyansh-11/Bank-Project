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


    <div class='bank'>Transfer money</div>

    <?php
    $link=mysqli_connect("localhost","root","","new_sparks_bank") or die("<p>Database not connected".mysqli_connect_error()."</p>");
    if(isset($_POST['transfer']))
            {
                if($_POST['name'] && $_POST['amount'])
                {
                    $get_reciever_ID=$_POST['id_number'];
                    $i=$_POST['name'];
                    $amount=$_POST['amount'];

                    $sql="SELECT * FROM new_all_customers WHERE ID='$get_reciever_ID'";
                    $check=mysqli_query($link,$sql);

                    $row=mysqli_fetch_array($check);
                    $sender=$row['name'];
                    $balance=$row['balance'];
                    $balan=$row['balance'];
                    $balance=$balance-$amount;
                    if($balance>=0 && $balance<=$balan)
                    {
                        $sql="UPDATE new_all_customers SET balance='$balance' WHERE ID='$get_reciever_ID'";
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
                        $sql="INSERT INTO new_transaction_history(sender,reciever,amount) VALUES ('$sender','$reciever','$amount')";
                        $check=mysqli_query($link,$sql);
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

    <!-- Enter id number -->
    <?php
            $sql="SELECT * FROM new_all_customers";
            $check=mysqli_query($link,$sql);
            $size=mysqli_num_rows($check);
        ?>

    <div class="transfer_money">
        <form action="" method="post">
            <p>
                <label for="id_number">Enter Your ID:</label>
                <input type="number" id="id_number" name="id_number" placeholder="Enter Your ID" required>
            </p>

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
            <label for="amount">Amount:</label>
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
        $("#transfered").button();
    });
</script>
</html>