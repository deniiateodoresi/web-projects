<?php

if(!isset($_GET['token'])){
    header("Location: no_access.php");
}

$token = $_GET['token'];


function load_new_articles(){
    $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("select * from comentarii where aprobat = 0");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        echo "<form method='post' id='comment_to_approve'>
                <input type='hidden' name='writer_name' id='writer_name' value='".$row['nume']."'><br>
                <label><strong>Nume:</strong> ".$row['nume']."</label><br>
                <input type='hidden' name='comment_recipe' id='comment_recipe' value='".$row['comentariu']."'><br>
                <label><strong>Comentariu:</strong> ".$row['comentariu']."</label><br>
                <input type=submit id='approve' name='approve' value='Aproba comentariul'>
                <input type=submit id='reject' name='reject' value='Respinge comentariul'>
            </form>
        ";
    }
}

if(isset($_POST["approve"])){
    $name_a = $_POST["writer_name"];
    $comment_a = $_POST["comment_recipe"];

    $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("update comentarii set aprobat = 1 where nume = ? and comentariu = ?");
    $stmt->bind_param("ss", $name_a, $comment_a);

    $stmt->execute();
    $stmt->get_result();

    $stmt->close();
    $conn->close();

    header('location: admin_page.php?token='.$token);
    exit; 
}

if(isset($_POST["reject"])){
    $name_r = $_POST["writer_name"];
    $comment_r = $_POST["comment_recipe"];

    $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("delete from comentarii where nume = ? and comentariu = ?");
    $stmt->bind_param("ss", $name_r, $comment_r);

    $stmt->execute();
    $stmt->get_result();

    $stmt->close();
    $conn->close();

    header('location: admin_page.php?token='.$token);
    exit; 
}

?>