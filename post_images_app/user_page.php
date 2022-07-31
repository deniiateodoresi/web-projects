<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Truth Rose | Profile </title>
    <?php include("pb5_2.php"); ?>
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
            overflow:auto;
            min-height: 100%;
            max-height: max-content;
            background: linear-gradient(0deg, rgba(255,135,135,1) 0%, rgba(156,219,151,1) 100%);
        }
        body {
            display:flex;
        }
        #info_section, table, tr{
            text-align: center;
            width: calc(attr(body.width) - 100px);
        }
        #navigation {
            position: fixed;
            text-align: center;
            background-color: grey;
            opacity: 0.5;
            width: 150px;
            height: 100%;
        }
        #content{
            width: calc(100% - 150px);
            overflow:auto;
            height: max-content;
            
        }
        p{
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        #welcome{
            color: #fcd3ce;
            font-size: 30px;
            font-weight: bold;
            text-shadow: -1px 1px 0 #000,
                          1px 1px 0 #000,
                         1px -1px 0 #000,
                        -1px -1px 0 #000;
        }
        img{
            width: 180px;
            object-fit: contain;
        }
        hr{
            background-color: #000;
            color: #000;
            height: 5px;
            opacity: 0.7;
        }
        td{ 
            width: 500px;
            height: 230px;
            text-align: center;
        }
        #feed, #user_page{
            height: 60px;
            width: 100px;
            background-color: #790000;
            font-size: 16px;
            border-radius: 10px;
            color: white;
        }
        #delete_btn{
            background-color: #790000;
            color: white;
        }
    </style>
</head>
  
<body>
    <div style="position: relative; width: 150px;">
        <div style="position: absolute; width: 150px;">
            <div id="navigation">
                <form method="post" id="user_profile">
                    <p><input type="submit" value="Your Profile" name="user_page" id="user_page"></p>
                </form>
                <form method="post" id="feed_form">
                    <p><input type="submit" value="Posts Feed" name="feed" id="feed"></p>
                </form>
                </div>
        </div>
    </div>
    <div id="content">
        <form method="post" id="info_section" enctype="multipart/form-data">
            <p><label id="welcome">Welcome</label></p>
            <p> 
                <?php
                    load_header();
                ?>
            </p>
        </form>
        <hr>
        <table id="images">
            <?php
                get_images();
            ?>
        </div>
    </div>
    
</body>
  
</html>