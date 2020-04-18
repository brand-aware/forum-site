<!DOCTYPE html>
<html>
<head>
	<title>comments</title>
        <link href="css/display_topic.css" rel="stylesheet" />
	<link rel="icon" href="img/company.png">
</head>

<body>
    <div>
        <p>
            <table id="dis_table">
                <tr>
                    <td id="header_title">
                        <h1><b>comments</b></h1>
                    </td>
                    <td id="header_link">
                        <a href="index.html">
                            <img src="img/index_small.png">
                        </a>
                    </td>
                </tr>
            </table>
        </p>
    </div>
    
    <div>
    <p>
        <?php
            //error handler function
            function customError($errno, $errstr) {
              echo "<b>Error:</b> [$errno] $errstr</br>";
            }

            //set error handler
            set_error_handler("customError");
            
            require("php/db_credentials.php");
            $theme=$_GET['theme'];
            $topic=$_GET['topic'];
            $newtopic1=str_replace("%20", " ", $topic);
            $newtopic2=str_replace("%21", "?", $newtopic1);
            $newtopic3=str_replace("%22", "'", $newtopic2);
            ## str_replace("/"", "%23", $topic); ----- not supported
            $newtopic4=str_replace("%24", "=", $newtopic3);
            $newtopic5=str_replace("%25", "<", $newtopic4);
            $newtopic6=str_replace("%26", ">", $newtopic5);
            $newtopic7=str_replace("%27", "$", $newtopic6);

            $orig_id=$_GET['orig_id'];
            $username=USERNAME;
            $password=PASSWORD;
            $url=DATABASE;
            $database="forum_site";
            $query="SELECT * FROM comments WHERE theme='$theme' AND prev_id=$orig_id";
            $query2="SELECT username,reg_date FROM $theme WHERE id=$orig_id";
            $conn=mysqli_connect($url, $username, $password, $database);
            
            //begin html output
            echo("<div id='output_area'>");
            echo("<div class='display_body'>");
            echo("<div id='topic_title'><b>$newtopic7</b></div>");
            echo("</div>");
            echo("<div>");
            if($results=mysqli_query($conn, $query2)){
                while($row=mysqli_fetch_row($results)){
                    $topic_username=$row[0];
                    $topic_timestamp=$row[1];
                }
                $new_username1=str_replace("%20", " ", $topic_username);
                $new_username2=str_replace("%21", "?", $new_username1);
                $new_username3=str_replace("%22", "'", $new_username2);
                ## str_replace("/"", "%23", $topic); ----- not supported
                $new_username4=str_replace("%24", "=", $new_username3);
                $new_username5=str_replace("%25", "<", $new_username4);
                $new_username6=str_replace("%26", ">", $new_username5);
                $new_username7=str_replace("%27", "$", $new_username6);
                echo("<div id='topic_username'>$new_username7</div>");
                echo("<div id='topic_timestamp'>$topic_timestamp</div>");
                mysqli_free_result($results);
            }
            echo("</div>");
            
            if($results = mysqli_query($conn, $query)){
                while($row = mysqli_fetch_row($results)){
                    $comment=$row[5];
                    $newcomment1=str_replace("%20", " ", $comment);
                    $newcomment2=str_replace("%21", "?", $newcomment1);
                    $newcomment3=str_replace("%22", "'", $newcomment2);
                    ## str_replace("/"", "%23", $topic); ----- not supported
                    $newcomment4=str_replace("%24", "=", $newcomment3);
                    $newcomment5=str_replace("%25", "<", $newcomment4);
                    $newcomment6=str_replace("%26", ">", $newcomment5);
                    $newcomment7=str_replace("%27", "$", $newcomment6);
                    $user=$row[1];
                    $newuser1=str_replace("%20", " ", $user);
                    $newuser2=str_replace("%21", "?", $newuser1);
                    $newuser3=str_replace("%22", "'", $newuser2);
                    ## str_replace("/"", "%23", $topic); ----- not supported
                    $newuser4=str_replace("%24", "=", $newuser3);
                    $newuser5=str_replace("%25", "<", $newuser4);
                    $newuser6=str_replace("%26", ">", $newuser5);
                    $newuser7=str_replace("%27", "$", $newuser6);
                    $timestamp=$row[2];
                    echo("<div class='display_body'>");
                    echo("<div class='display_comment'>$newcomment7</div>");
                    echo("</div>");
                    echo("<div>");
                    echo("<div class='display_username'><i>by: $newuser7</i></div>");
                    echo("<div class='display_timestamp'><i>on: $timestamp</i></div>");
                    echo("</div>");
                }
                echo("</div>");
                mysqli_free_result($results);
            }else{
                echo("<div id='display_topic_table'>");
                echo("<div><b><h3>$newtopic7</h3></b></div>");
                echo("<div><i>be the first to comment...</i></div>");
                echo("</div>");
            }
            mysqli_close($conn);
        ?>
    </p>
    </div>
    <div id='footer'>
        <div id='comment_link'>
            <a id='new_comment_link' href='<?php echo("new_comment.html?theme=$theme&orig_id=$orig_id"); ?>'>
                comment
            </a>
        </div>
        <div>
            <a href="index.html">
                home
            </a>
        </div>
        <div id="footer_logo">
            <img src="img/company_small.png" />
        </div>
    </div>
</body>
</html>