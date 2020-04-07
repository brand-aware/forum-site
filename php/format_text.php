<?php
    	function customError($errno, $errstr){
		echo "<b>Error:</b> [$errno] $errstr";
	}
	set_error_handler("customError");

	class FormatText {

            function removeForPrint($text){
                $new_text1=str_replace("'", "%22", $text);
                $new_text2=str_replace("<", "%25", $new_text1);
                $new_text3=str_replace(">", "%26", $new_text2);
                $new_tex4=str_replace("$", "%27", $new_text3);
                return $new_text4;
            }

            function removeForWeb($text){
                $new_text=str_replace(" ", "%20", $text);
                $new_text=str_replace("?", "%21", $text);
                $new_text=str_replace("=", "%24", $text);
                return $new_text;
            }

            function removeFrom($text){
                $newtopic=str_replace("%20", " ", $text);
                $newtopic=str_replace("%21", "?", $text);
                $newtopic=str_replace("%22", "'", $text);
                $newtopic=str_replace("%24", "=", $text);
                $newtopic=str_replace("%25", "<", $text);
                $newtopic=str_replace("%26", ">", $text);
                $newtopic=str_replace("%27", "$", $text);
                return $newtopic;
            }
	}
        $text_replace = new FormatText();
?>

