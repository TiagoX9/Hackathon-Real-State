<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail for customer</title>

    <style>
        .mail {
            background-color: #EBEBEB;
            width: 80%;
            margin: auto;
            padding: 3% 3% 3% 3%
        }

        .logo {
            width: 50%;
            margin: 20px auto;
        }

        h1 {
            margin: auto;
            text-align: center;
        }

        .notice {
            text-align: center;
        }

        h3 {
            width: 30%;
            height: 30px;
            margin: auto;
            text-align: center;
            color: #B1C393;
        }

        .message {
            background-color: white;
            border: solid 7px #D9DED5;
            width: 60%;
            padding-top: 10px;
            padding-bottom: 10px;
            margin: 5% auto;
        }

        .message-contents {
            width: 85%;
            margin: auto;
        }

        @media screen and (max-width:767px) {
            .mail {
                width: 90%;
                margin: auto;
                padding: 3% 3% 3% 3%;
            }

            .logo {
                width: 70%;
                margin: 20px auto;

            }

            h1 {
                margin: auto;
                text-align: center;
                font-size: 20px;
            }

            .notice {
                text-align: center;
            }

            h3 {
                width: 90%;
                height: 30px;
                margin: auto;
                text-align: center;
                color: #B1C393;
            }

            .message {
                background-color: white;
                border: solid 5px #D9DED5;
                width: 85%;
                padding-top: 10px;
                padding-bottom: 10px;
                margin: 5% auto;
            }

            .message-contents {
                width: 85%;
                margin: auto;
            }
        }


    </style>
</head>
<body>
<div class="mail">
    <div class="logo">
        <img src="cid:logo-brown" width="100%">
<!--                <img src="../img/logo-brown.png" width="100%">-->
    </div>
    <h1>Thank you for your contact!</h1>
    <p class="notice">We received your message properly, your request is in process, we will answer you in shortest
        delay.</p>


    <div class="message">
        <h3>Your message</h3>
<!--        <div class="message-contents">-->
<!--            <p>First name: Tomomi </p>-->
<!--            <p>Last name: Suda</p>-->
<!--            <p>Phone number: +420-000-000-000</p>-->
<!--            <p>Email: aaa@mail.com</p>-->
<!--            <p>Message: I would like to get more information.</p>-->
<!--        </div>-->

        <div class="message-contents">
            <p>First name: <?php echo $_POST['firstname']; ?></p>
            <p>Last name: <?php echo $_POST['surname']; ?></p>
            <p>Phone number: <?php echo $_POST['phone-number']; ?></p>
            <p>Email: <?php echo $_POST['email']; ?></p>
            <p>Message: <?php echo $_POST['your-message']; ?></p>
        </div>

    </div>

    <p class="notice">Please do not respond to this e-mail, it is sent automatically.
        If necessary, you can contact //put mail address // or //put phone number // .</p>
</div>
</body>
</html>