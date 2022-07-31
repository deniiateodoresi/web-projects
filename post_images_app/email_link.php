<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truth Rose </title>
    <?php 
    
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['email'];
        $password = $_GET['password'];

        $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("insert into users (first_name, last_name, email, password) values (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $conn->close();

    ?>
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
        <img src="confirm.png" alt="Confirmed account">
        <p>Your account has been successfully created. You can now login into our platform.</p>
        <a href="http://localhost/web_php_no_js/login.php">Click to go to login page</a>
    </div>
    
</body>
  
</html>