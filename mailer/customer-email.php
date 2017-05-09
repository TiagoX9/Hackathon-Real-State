<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail for customer</title>

    <style>
        #content{
            position:center;
        }
    </style>
</head>
<body>
<div id="content">
    <img src="../img/logo.png">
    <h1>Thank you for your contact!</h1>
    <h2>First name: <?php echo $_POST['firstname']; ?></h2>
    <h2>Last name: <?php echo $_POST['surname']; ?></h2>
    <h2>Phone number: <?php echo $_POST['phone-number']; ?></h2>
    <h2>Email: <?php echo $_POST['email']; ?></h2>
    <h2>Message: <?php echo $_POST['your-message']; ?></h2>
</div>
</body>
</html>