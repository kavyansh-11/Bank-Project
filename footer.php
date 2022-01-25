<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <footer class="foot">
        <div class="box1">
            <ul>
                <li><h2>Useful Links</h2></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Apply for Credit Card</a></li>
                <li><a href="#">Login to Netbanking</a></li>
                <li><a href="#">Website Usage Terms</a></li>
                <li><a href="#">Security</a></li>
            </ul>
        </div>

        <div class="box2">
            <ul>
                <li><h2>Need Help</h2></li>
                <li><a href="#">Customer Care</a></li>
                <li><a href="#">Contact Us</a></>
                <li><a href="#">Customer Care</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>  
        </div>

        <div class="box3">
            <ul>
                <li><h2>Connect</h2></li>
                <li><a href="#"><i class="fa fa-instagram insta"></i> Instagram</a></li>
                <li><a href="#"><i class="fa fa-youtube yt"></i> Youtube</a></li>
                <li><a href="#"><i class="fa fa-linkedin-square linked"></i> Linked IN</a></li>
            </ul> 
        </div>

        <div class="box4">
            <hr>
            <br>
        <p>We use cookies to provide a user-friendly experience. By continuing to browse this site, you agree to the use of cookies.</p>
        <?php
        echo "<p>&copy;-".date('Y')," Sparks Bank Ltd.</p>";
        ?>
        </div>
    </footer>
</body>
</html>