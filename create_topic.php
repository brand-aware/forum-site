<!DOCTYPE html>
<html>
<head>
	<title>create_topic</title>
	<meta charset="UTF-8">
	<link rel="icon" href="img/company.png">
</head>

<body>
    <p>
        <?php
            function customError($errno, $errstr){
                echo"<b>Error:</b> [$errno] $errstr";
            }
            set_error_handler("customError");
            $username = "guest";
            $password = "guestpassword";
            $url = "localhost";
            $database = "forum_site";
            $theme = $_POST['topic_get'];
            
            $topic_text = $_POST['topic_post'];
            echo("$topic_text</br>");
            $newtopic1=str_replace(" ", "%20", $topic_text);
            $newtopic2=str_replace("?", "%21", $newtopic1);
            $newtopic3=str_replace("'", "%22", $newtopic2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newtopic4=str_replace("=", "%24", $newtopic3);
            $newtopic5=str_replace("<", "%25", $newtopic4);
            $newtopic6=str_replace(">", "%26", $newtopic5);
            $newtopic7=str_replace("$", "%27", $newtopic6);
            
            $username_text = $_POST['username_post'];
            echo("username: $username_text</br>");
            $newusername1=str_replace(" ", "%20", $username_text);
            $newusername2=str_replace("?", "%21", $newusername1);
            $newusername3=str_replace("'", "%22", $newusername2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newusername4=str_replace("=", "%24", $newusername3);
            $newusername5=str_replace("<", "%25", $newusername4);
            $newusername6=str_replace(">", "%26", $newusername5);
            $newusername7=str_replace("$", "%27", $newusername6);

            $conn = mysqli_connect($url, $username, $password, $database);	
            $query = "INSERT INTO $theme (username, topic)
                VALUES ('$newusername7', '$newtopic7')";
            if($result = mysqli_query($conn, $query)){
                echo("your data has been posted");
            }else{
                echo("post failed");
            }
        ?>
    </p>
    <p>
        <a href="index.html">
            home
        </a>
    </p>
</body>
</html>
