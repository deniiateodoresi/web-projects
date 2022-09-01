<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Administrator </title>
    <?php include("pb6_2.php"); ?>
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
            background-color: #CDC2AE;
        }
        body {
            display:flex;
        }
        form {
            border-radius: 25px;
            padding: 20px;
            width: 400px;
            height: 250px;
            margin: auto;
            text-align: center;
            background-color: #826F66;
            box-shadow: 3px 3px 1px white;
        }
        input{
            border-radius: 10px;
            padding: 5px;
            font-size:24px;
            margin: 10px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #E4D1B9;
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
        <p><input type="text" id="username" name="username" placeholder="Username"></p>
        <p><input type="password" id="password" name="password" placeholder="Password"></p>
        <p><input type="submit" id="login_admin" name="login_admin" value="Login"></p>
    </form>
    
</body>
  
</html>