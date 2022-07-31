<?php


if(!isset($_GET['token'])){
    header("Location: no_access.php");
}

session_start();

function load_header(){
    if($_SESSION['user_posts'] == 1)
        echo "Select image to upload:
                <input type='file' name='image' id='image'>
                <input type='submit' value='Upload Image' name='upload' id='upload'>";
    if($_SESSION['user_posts'] == 0 )
        echo "See all the photos uploaded by the users";
}

if(isset($_POST["upload"])){
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
            $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $url = "uploads/".$file_name;
            $date = new DateTime();
            $stmt = $conn->prepare("insert into images (email_user, url, upload_time) values (?, ?, NOW())");
            $stmt->bind_param("ss", $_SESSION['email'], $url);

            $stmt->execute();
            $stmt->get_result();

            $stmt->close();
            $conn->close();

            move_uploaded_file($file_tmp,"uploads/".$file_name);
        // echo "Success";
        }else{
        // print_r($errors);
        }
    }
    header("Location: user_page.php?token=aa1234bb5678xyz");
    exit; 
}

if(isset($_POST["feed"]))
    $_SESSION['user_posts'] = 0;

if(isset($_POST["user_page"]))
    $_SESSION['user_posts'] = 1;


function get_images(){
    if($_SESSION['user_posts'] == 0){
        $conn = new mysqli("localhost:3306", "root", "", "web_php");
    
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("select * from images order by upload_time desc");
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        $closed = 0;
        while($row = $result->fetch_assoc()){
            if($i == 0){
                $closed = 0;
                echo "<tr>";
            }
            echo "<td><img src=" .$row['url']. " alt=file></td>";
            $i = $i + 1;
            if($i == 3){
                echo "</tr>";
                $closed = 1;
                $i = 0;
            }
        }
        if($closed = 0)
            echo "</tr>";
    }
    if($_SESSION['user_posts'] == 1){
        $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("select * from images where email_user = ? order by upload_time desc");
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        $closed = 0;
        while($row = $result->fetch_assoc()){
            if($i == 0){
                $closed = 0;
                echo "<tr>";
            }
            echo "<td>
                    <img id='my_upload' src=" .$row['url']. " alt=file>
                    <br>
                    <form method='post' id='delete_form'>
                        <input type='submit' id='delete_btn' name='delete_btn' value='Delete'>
                        <br>
                        <input type='hidden' name='image_url' id='image_url' value=" .$row['url']. ">
                    </form>
                </td>";
            $i = $i + 1;
            if($i == 3){
                echo "</tr>";
                $closed = 1;
                $i = 0;
            }
        }
        if($closed = 0)
            echo "</tr>";
    }
}

if(isset($_POST['delete_btn'])){
    $conn = new mysqli("localhost:3306", "root", "", "web_php");
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
    $stmt = $conn->prepare("delete from images where email_user = ? and url = ?");
    $stmt->bind_param("ss", $_SESSION['email'], $_POST['image_url']);
    $stmt->execute();
    $stmt->get_result();

    $stmt->close();
    $conn->close();

    header("Location: user_page.php?token=aa1234bb5678xyz");
    exit; 
    
}

?>