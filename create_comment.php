<!DOCTYPE html>
<html>
<head>
	<title>create_comment</title>
	<meta charset="UTF-8">
	<link rel="icon" href="img/company.png">
</head>

<body>
    <p>
        <?php
            function customError($errno, $errstr) {
                echo "<b>Error:</b> [$errno] $errstr</br>";
            }

            //set error handler
            set_error_handler("customError");
            require("php/db_credentials.php");
            $username = USERNAME;
            $password = PASSWORD;
            $url = DATABASE;
            $database = "forum_site";
            
            //html display for user
            //topic of page (topic -> comments........)
            $topic=$_POST['topic_get'];
            echo("posted to topic: $topic</br>");
            $username_text = $_POST['comment_username_post'];
            echo("posted by: $username_text</br>");
            //comment on topic, posted by user
            $comment_text = $_POST['comment_post'];
            echo("new comment: $comment_text</br>");
            
            //remove special chars from topic
            $newtopic1=str_replace(" ", "%20", $topic);
            $newtopic2=str_replace("?", "%21", $newtopic1);
            $newtopic3=str_replace("'", "%22", $newtopic2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newtopic4=str_replace("=", "%24", $newtopic3);
            $newtopic5=str_replace("<", "%25", $newtopic4);
            $newtopic6=str_replace(">", "%26", $newtopic5);
            $newtopic7=str_replace("$", "%27", $newtopic6);
            
            //remove special chars from comment
            $newcomment1=str_replace(" ", "%20", $comment_text);
            $newcomment2=str_replace("?", "%21", $newcomment1);
            $newcomment3=str_replace("'", "%22", $newcomment2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newcomment4=str_replace("=", "%24", $newcomment3);
            $newcomment5=str_replace("<", "%25", $newcomment4);
            $newcomment6=str_replace(">", "%26", $newcomment5);
            $newcomment7=str_replace("$", "%27", $newcomment6);
            
            //remove special chars from username
            $newusername1=str_replace(" ", "%20", $username_text);
            $newusername2=str_replace("?", "%21", $newusername1);
            $newusername3=str_replace("'", "%22", $newusername2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newusername4=str_replace("=", "%24", $newusername3);
            $newusername5=str_replace("<", "%25", $newusername4);
            $newusername6=str_replace(">", "%26", $newusername5);
            $newusername7=str_replace("$", "%27", $newusername6);
            $orig_id=$_POST['orig_id'];
            $theme=$_POST['theme_get'];

            $conn = mysqli_connect($url, $username, $password, $database);
            //note: all comments for all themes/topics in 'comments' table
            $query = "INSERT INTO comments (username, theme, prev_id, comment)
                    VALUES ('$newusername7', '$theme', '$orig_id','$newcomment7')";
            if($result = mysqli_query($conn, $query)){
                echo("your comment has been posted");
            }else{
                echo("comment not posted");
            }
            mysqli_close($conn);
        ?>
    <p>
        <a href="index.html">
            home
        </a>
    </p>
</body>
</html>
