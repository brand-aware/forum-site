<!DOCTYPE html>
<html>
<head>
	<title>search_results</title>
	<meta charset="UTF-8">
	<link rel="icon" href="img/company.png">
</head>

<body>
<p><h1><b>search_results</b></h1></p>
<p>
<?php
    require("php/db_credentials.php");
    $username=USERNAME;
    $password=PASSWORD;
    $url=DATABASE;
    $database="forum_site";

    $search_text=$_POST['search_post'];
    $query1="SELECT * FROM entertainment WHERE topic LIKE '%$search_text%'";
    $query2="SELECT * FROM politics WHERE topic LIKE '%$search_text%'";
    $query3="SELECT * FROM popular_events WHERE topic LIKE '%$search_text%'";
    $query4="SELECT * FROM science WHERE topic LIKE '%$search_text%'";
    $query5="SELECT * FROM technology WHERE topic LIKE '%$search_text%'";
    $query6="SELECT * FROM unexpected_things WHERE topic LIKE '%$search_text%'";

    $conn=mysqli_connect($url, $username, $password, $database);
    $x=1;

    if($result1=mysqli_query($conn, $query1)){
        while($row=mysqli_fetch_row($result1)){
            $time[$x]=$row[2];
            $row[]="entertainment";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result1);
    }

    if($result2=mysqli_query($conn, $query2)){
        while($row=mysqli_fetch_row($result2)){
            $time[$x]=$row[2];
            $row[]="politics";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result2);
    }

    if($result3=mysqli_query($conn, $query3)){
        while($row=mysqli_fetch_row($result3)){
            $time[$x]=$row[2];
            $row[]="popular_events";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result3);
    }

    if($result4=mysqli_query($conn, $query4)){
        while($row=mysqli_fetch_row($result4)){
            $time[$x]=$row[2];
            $row[]="science";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result4);
    }

    if($result5=mysqli_query($conn, $query5)){
        while($row=mysqli_fetch_row($result5)){
            $time[$x]=$row[2];
            $row[]="technology";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result5);
    }

    if($result6=mysqli_query($conn, $query6)){
        while($row=mysqli_fetch_row($result6)){
            $time[$x]=$row[2];
            $row[]="unexpected_things";
            $all_row[$x]=$row;
            $x=$x+1;
        }
        mysqli_free_result($result6);
    }

    $all_results=array_combine($time, $all_row);
    ksort($all_results);

    $x=1;
    echo("<p><h3>results for: $search_text</h3></p>");
    echo ("<table id='search_table'>");
    foreach ($all_results as $key => $val){
        $topic=$val[3];
        $newtopic1=str_replace("%20", " ", $topic);
        $newtopic2=str_replace("%21", "?", $newtopic1);
        $newtopic3=str_replace("%22", "'", $newtopic2);
        ## str_replace("/"", "%23", $topic); ----- not supported
        $newtopic4=str_replace("%24", "=", $newtopic3);
        $newtopic5=str_replace("%25", "<", $newtopic4);
        $newtopic6=str_replace("%26", ">", $newtopic5);
        $newtopic7=str_replace("%27", "$", $newtopic6);

        $username=$val[1];
        $newusername1=str_replace("%20", " ", $username);
        $newusername2=str_replace("%21", "?", $newusername1);
        $newusername3=str_replace("%22", "'", $newusername2);
        ## str_replace("/"", "%23", $topic); ----- not supported
        $newusername4=str_replace("%24", "=", $newusername3);
        $newusername5=str_replace("%25", "<", $newusername4);
        $newusername6=str_replace("%26", ">", $newusername5);
        $newusername7=str_replace("%27", "$", $newusername6);
        echo("<tr><td>$x.$val[4]</td>");
        echo("<td><a href='display_topic.php?theme=$val[4]&topic=$val[3]&orig_id=$val[0]'>$newtopic7</a></td>");
        echo("<td><i>posted by: $newusername7</i></td>");
        echo("<td>on: $val[2]</td>");
        echo("</tr>");
        $x = $x + 1;
    }
    if($x == 1){
        echo("<p><i>sorry.....no results found....");
    }
    echo("</table>");
    mysqli_close($conn);
?>
</p>
    <p>
        <a href="index.html">
            home
        </a>
    </p>
</body>
</html>

