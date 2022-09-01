<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiramisu | Reteta</title>
    <?php include("pb6.php"); ?>
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
            overflow:auto;
            min-height: 100%;
            max-height: max-content;
            background-color: #CDC2AE;
        }
        body {
            display:flex;
        }
        #info_section, table, tr{
            width: calc(attr(body.width) - 500px);
            background-color: white;
        }
        #navigation {
            position: fixed;
            text-align: center;
            background: url("background.jpg");
            width: 500px;
            height: 100%;
        }
        #content{
            width: calc(100% - 500px);
            overflow:auto;
            height: max-content;
            display: flex;
            flex-direction: column;
        }
        p{
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }
        #welcome{
            background-color: white;
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
        #recipe{
            border-radius: 25px;
            padding: 20px;
            text-align: center;
            background-color: #ECE5C7;
            box-shadow: 3px 3px 1px #CDC2AE;
            width: 300px;
            margin-top: 20px;
            margin-left: 80px;
        }
        li{
            font-size: 15px;
        }
        #post_section{
            background-color: #EFEAD8;
            height: 180px;
            display: flex;
            flex-direction: column;
        }
        #name{
            font-size: 14px;
            width: 300px;
            margin: 30px 10px 10px 30px;
            box-shadow: 1px 2px #D0C9C0;
        }
        #comment{
            margin: 10px 30px 30px 30px;
            width: 700px;
            min-height: 30px;
            max-height: 30px;
            box-shadow: 2px 4px #D0C9C0;
        }
        #post_comment{
            width: 100px;
            margin-left: 635px;
            box-shadow: 1px 2px #D0C9C0;
        }
        #admin{
            width: 150px;
            height: 35px;
            margin-top: 20px;
            font-size: 18px;
            background-color: #EFEAD8;
            border-radius: 10px;
        }
        #comments{
            margin: auto;
            width: 700px;
        }
        #comment_approved{
            background-color: #EFEAD8;
            width: 500px;
            padding: 20px;
            margin-top: 20px;
            margin-left: 100px;
            margin-bottom: 30px;
            box-shadow: 2px 10px #826F66;
            border-radius: 15px;
        }
        #text_comment{
            text-align: left;
            padding: 10px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 2px 4px #D0C9C0;
            fit-content: contain;
            word-wrap: break-word;
        }
    </style>
</head>
  
<body>
    <div style="position: relative; width: 500px; text-align: center;">
        <div style="position: absolute; width: 150px; text-align: center; margin: auto;">
            <div id="navigation">
                <div id="recipe">
                    <h3>Reteta Tiramisu</h3>
                    <img src="tiramisu.jpg" alt="Sent email">
                    <p style="font-weight: bold">Ingrediente</p>
                    <ul>
                        <li>500g mascarpone</li>
                        <li>500ml cafea indulcita</li>
                        <li>400g piscoturi</li>
                        <li>8 linguri zahar</li>
                        <li>5 oua separate</li>
                        <li>3 linguri cacao</li>
                        <li>1 esenta vanilie</li>
                        <li>putina sare</li>
                    </ul>
                    <p>
                        Instructiunile complete si modul de preparare il gasiti pe<br>
                        <a href="https://jamilacuisine.ro/tiramisu-reteta-video/"> Reteta tiramisu Jamila</a>
                    </p>
                    
                </div>
                <form method="post">
                        <input type="submit" id="admin" name="admin" value="Login Admin">
                </form>
            </div>
        </div>
    </div>
    <div id="content">
        <form method="post" id="post_section">
            <input type="text" id="name" name="name" placeholder="Nume">
            <textarea id="comment" name="comment" placeholder="Comentariu"></textarea>
            <input type="submit" id="post_comment" name="post_comment" value="Posteaza">
        </form>
        <div id="comments">
            <?php
                load_articles();
            ?>
        </div>
    </div>
    
</body>
  
</html>