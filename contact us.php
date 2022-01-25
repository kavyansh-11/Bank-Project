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
    <link rel="stylesheet" href="contact_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <div class="bank">Contact us</div>

    <div class="transfer_money">
    <form action="" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name">
        </p>

        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>

        <p>
            <label for="number">Contact Number:</label>
            <input type="numer" id="number" name="contact_no" placeholder="Contact Number">
        </p>

        <p>
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10" maxlength="5"></textarea>
        </p>

        <button id="send" name="send" value="message_send">Send</button>
    </form>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
<script>
    $(function(){
        $("#send").button();
    })
</script>
</html>