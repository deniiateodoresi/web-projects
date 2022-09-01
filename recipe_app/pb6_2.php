<?php

if(isset($_POST["login_admin"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username != "" and $password != ""){
        $admin_found = find_admin($username, $password);
        if($admin_found == 1){
            header("Location: admin_page.php?token=xyz123abc");
        }
    }
}

function find_admin($username, $password){
    $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("select count(*) from admin where username = ? and password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();  
    $count = mysqli_num_rows($result);
    return $count;
}


?>