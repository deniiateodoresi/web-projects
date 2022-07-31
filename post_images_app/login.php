<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truth Rose | Login </title>
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
        form {
            border-radius: 25px;
            padding: 20px;
            width: 400px;
            height: 330px;
            margin: auto;
            text-align: center;
            background-color: #c44c4c;
            box-shadow: 3px 3px 1px #761212;
        }
        input{
            border-radius: 10px;
            padding: 5px;
            font-size:24px;
            margin: 10px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fcd3ce;
        }
        #login{
            width: 100px;
            font-weight: bold;
        }

        #login_create_account{
            background-color: #9cdb97;
            font-weight: bold;
            font-size:20px;
        }
        hr{
            background-color: #fcd3ce;
        }
    </style>
</head>
  
<body>
    <form method="post">
        <p><input type="text" id="email" name="email" placeholder="Email"></p>
        <p><input type="password" id="password" name="password" placeholder="Password"></p>
        <p><input type="submit" id="login" name="login" value="Login"></p>
        <hr>
        <p><input type="submit" id="login_create_account" name="login_create_account" value="Create account"></p>
    </form>
    
</body>
  
</html>