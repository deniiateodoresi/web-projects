<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truth Rose </title>
    <?php include("pb4_5.php"); ?>
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
            background: radial-gradient(circle, rgba(4,135,87,1) 0%, rgba(156,219,151,1) 100%);
        }
        body {
            display:flex;
        }
        div{
            margin: auto;
            border-radius: 25px;
            padding: 20px;
            text-align: center;
            background-color: #c44c4c;
            box-shadow: 3px 3px 1px #761212;
            width: 570px;
        }
        p{
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            color: #fcd3ce;
            font-family: Arial, Helvetica, sans-serif;
            text-shadow: -1px 1px 0 #000,
                          1px 1px 0 #000,
                         1px -1px 0 #000,
                        -1px -1px 0 #000;
        }
        img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
  
<body>
    <div>
        <img src="sent.png" alt="Sent email">
        <p>Thank you for creating an account. It will be done after you confirm by clicking on the link in the email that we've just sent you.
    </div>
    
</body>
  
</html>