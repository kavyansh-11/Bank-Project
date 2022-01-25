<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sparks_bank.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <div class="bank">Welcome to sparks bank.</div>

    <div class="flow">
        <a href="display table.php">View all accounts</a>
        <a href="transfer money.php">Transfer Money</a>
        <a href="transaction history.php">Transfer history</a>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>