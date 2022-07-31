<?php

session_start();

$_SESSION['user_posts'] = 1;
$_SESSION['confirmed'] = 0;

if(isset($_POST["login_create_account"])){
    header("Location: create_account.php");
}

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($email != "" and $password != ""){
        $user_found = find_user($email, $password);
        if($user_found == 1){
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['user_posts'] = 1;
            header("Location: user_page.php?token=aa1234bb5678xyz");
        }
    }
}

function find_user($email, $password){
    $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("select count(*) from users where email = ? and password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();  
    $count = mysqli_num_rows($result);
    return $count;
}

if(isset($_POST["account"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $retyped = $_POST["retyped_password"];

    if($firstname != "" and $lastname !="" and $email != "" and $password != "" and $password == $retyped){
        // add_user($firstname, $lastname, $email, $password);

        $to = $email;
        $subject = "New account";
  
         $message = "Hello.\n \n";
         $message .= "Thank you for creating an account on our platform. We really hope you'll enjoy it. In order to be able to access it, there would be one more step. Press click on the link below to confirm your registration.\n";
         $message .= "http://localhost/web_php_no_js/images/email_link.php?firstname=".$firstname."&lastname=".$lastname."&email=".$email."&password=".$password;
         $message .= "\n \n Truth Rose Team ^_^";
         $header = "From: TruthRose \r\n X-Mailer: PHP/'" . phpversion();
        mail($to, $subject, $message, $header);

        header("Location: thank_you.php");
    }  
}

// function add_user($firstname, $lastname, $email, $password){
//     $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     $stmt = $conn->prepare("insert into users (first_name, last_name, email, password) values (?, ?, ?, ?)");
//     $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

//     $stmt->execute();
//     $stmt->get_result();

//     $stmt->close();
//     $conn->close();
// }



?>