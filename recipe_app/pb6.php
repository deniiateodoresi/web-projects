<?php

if(isset($_POST["admin"])){
    header("Location: login_admin.php");
}

if(isset($_POST["post_comment"])){
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    if($name != "" and $comment != ""){
        $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("insert into comentarii (nume, comentariu) values (?, ?)");
        $stmt->bind_param("ss", $name, $comment);

        $stmt->execute();
        $stmt->get_result();

        $stmt->close();
        $conn->close();
    }
    header('location: index.php');
    exit; 
}


function load_articles(){
    $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("select * from comentarii where aprobat = 1");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        echo "<div id='comment_approved'>
                Postat de: <i>".$row['nume']."
                </i><p id='text_comment'>".$row['comentariu']."</p>
            </div>
        ";
    }
}

?>