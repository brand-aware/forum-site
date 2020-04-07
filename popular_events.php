<!DOCTYPE html>
<html>
<head>
	<title>popular_events</title>
	<script src="js/popular_events.js"></script>
	<link href="css/popular_events.css" rel="stylesheet" />
	<meta charset="UTF-8">
	<link rel="icon" href="img/company.png">
</head>
<body>
    <p>
        <img src="img/popular_events.png"></img>
    </p>
    <p>
        <?php
            require("php/db_credentials.php");
            $username=USERNAME;
            $password=PASSWORD;
            $url=DATABASE;
            $database="forum_site";
            $table="popular_events";

            $conn=mysqli_connect($url, $username, $password, $database);
            $query="SELECT * FROM $table";
            if($result=mysqli_query($conn, $query)){
                $x=1;
                echo("<table id=\'popular_events_results\'>");
                while($row = mysqli_fetch_row($result)){
                    $topic=$row[3];
                    $newtopic1=str_replace("%20", " ", $topic);
                    $newtopic2=str_replace("%21", "?", $newtopic1);
                    $newtopic3=str_replace("%22", "'", $newtopic2);
                    ## str_replace("/"", "%23", $topic); ----- not supported
                    $newtopic4=str_replace("%24", "=", $newtopic3);
                    $newtopic5=str_replace("%25", "<", $newtopic4);
                    $newtopic6=str_replace("%26", ">", $newtopic5);
                    $newtopic7=str_replace("%27", "$", $newtopic6);
                    
                    $username=$row[1];
                    $newusername1=str_replace("%20", " ", $username);
                    $newusername2=str_replace("%21", "?", $newusername1);
                    $newusername3=str_replace("%22", "'", $newusername2);
                    ## str_replace("/"", "%23", $topic); ----- not supported
                    $newusername4=str_replace("%24", "=", $newusername3);
                    $newusername5=str_replace("%25", "<", $newusername4);
                    $newusername6=str_replace("%26", ">", $newusername5);
                    $newusername7=str_replace("%27", "$", $newusername6);
                    
                    $timestamp=$row[2];
                    $id=$row[0];
                    echo("<tr><td class=\'result_cell\'>$x.POPULAR_EVENTS</td>");
                    echo("<td class=\'result_cell\'><a class=\'popular_events_comments\' href=\'display_topic.php?theme=popular_events&topic=$topic&orig_id=$id'>$newtopic7</a></td>");
                    echo("<td class=\'result_cell\'>$newusername7</td>");
                    echo("<td class=\'result_cell\'><i>posted on: </i>");
                    echo("$timestamp</td>");
                    echo("</tr>");
                    $x=$x+1;
                }
                echo("</table>");
                mysqli_free_result($result);
            }
            mysqli_close($conn);
        ?>
    </p>
    <div>
        <p>
            <a id="popular_events_new_topic" onClick="newTopic()" href="new_topics.html">
                start a new topic
            </a>
        </p>
        <p>
            <a href="index.html">
                home
            </a>
        </p>
    </div>
</body>
</html>
