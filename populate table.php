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
    <link rel="stylesheet" href="populate_table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <div class="bank">Sign Up and Create Account</div>

    <?php
        $link=mysqli_connect("localhost","root","","new_sparks_bank");
        
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $password=$_POST['password'];
            $balance=$_POST['balance'];
            
            $name=filter_var($name,FILTER_SANITIZE_STRING);
            $email=filter_var($email,FILTER_SANITIZE_EMAIL);
            $address=filter_var($address,FILTER_SANITIZE_STRING);

            $sql="INSERT INTO new_all_customers(name,email,address,password,balance) VALUES('$name','$email','$address','$password','$balance')";
            $check=mysqli_query($link,$sql);
            if($check)
            {
                ?><script>
                    window.alert("Account Created Successfully.");
                </script>
                <?php
            }
        }    
    ?>

        <div class="transfer_money">
    <form action="" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </p>

        <p>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>
        </p>

        <p>
            <label for="balance">Deposit Amount:</label>
            <input type="number" id="balance" name="balance" placeholder="Enter deposit balance" required>
        </p>

        <p><button name="submit" id="submit" value="submit">Submit</button></p>
    </form>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
<script>
    $(function(){
        $("#submit").button();
    });
</script>
</html>