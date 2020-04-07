<!DOCTYPE html>
<html>
<head>
    <title>entertainment</title>
    <script src="js/entertainment.js"></script>
    <link href="css/entertainment.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <link rel="icon" href="img/company.png">
</head>
<body>
    <div id="entertainment_logo">
        <p><img src="img/entertainment.png"></img></p>
    </div>
    <div id="entertainment_body">
        <p>
            <?php
                require("php/db_credentials.php");
                $username=USERNAME;
                $password=PASSWORD;
                $url=DATABASE;
                $database="forum_site";
                $table="entertainment";

                $conn=mysqli_connect($url, $username, $password, $database);
                $query="SELECT * FROM $table";
                if($result=mysqli_query($conn, $query)){
                    $x=1;
                    echo("<table id='entertainment_results'>");
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
                        echo("<tr><td class='result_cell'>$x.entertainment</td>");
                        echo("<td class='result_cell'><a class='entertainment_comments' href='display_topic.php?theme=entertainment&topic=$topic&orig_id=$id'>$newtopic7</a></td>");
                        echo("<td class='result_cell'>$newusername7</td>");
                        echo("<td class='result_cell'><i>posted on: </i>");
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
    </div>
    <div id ="entertainment_links">
            <p>
                <a id="entertainment_new_topic" onClick="newTopic()" href="new_topics.html">
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
