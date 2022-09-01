<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Administrator </title>
    <?php include("pb6_3.php"); ?>
    <style>
        html,body, div{
            height:100%;
            width:100%;
            margin:0;
            background-color: #CDC2AE;
            text-align: center;
        }
        body {
            display:flex;
        }
        form {
            border-radius: 25px;
            padding: 20px;
            width: 800px;
            min-height: 100px;
            max-height: fit-content;
            margin: 20px 200px 20px 250px;
            text-align: center;
            background-color: #826F66;
            box-shadow: 3px 3px 1px white;
        }
        input{
            border-radius: 10px;
            padding: 5px;
            font-size: 20px;
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
        label{
            font-size: 20px;
            color: white;
            word-wrap: break-word;
        }
    </style>
</head>
  
<body>
    <div>
        <?php
            load_new_articles();
        ?>
    </div>
    
</body>
  
</html>