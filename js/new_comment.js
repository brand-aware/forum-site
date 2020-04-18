function submitComment(){
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action", "create_comment.php");
	
	//store hidden variable for comment_text
	var comment_var = document.getElementById("comment_text").value;
	var comment_input_element = document.createElement("input");
	comment_input_element.setAttribute("type", "hidden");
	comment_input_element.setAttribute("name", "comment_post");
	comment_input_element.setAttribute("value", comment_var);
	form.appendChild(comment_input_element);

	//store hidden variable for username
	var username_var = document.getElementById("comment_username").value;
	var username = document.createElement("input");
	username.setAttribute("type", "hidden");
	username.setAttribute("name", "comment_username_post");
	username.setAttribute("value", username_var);
	form.appendChild(username);

	//use GET var from url for theme
	var full_url = window.location.href;
	var split_url = full_url.split("?");
	var split_params = split_url[1].split("&");
	var split_var = split_params[0].split("=");
	var theme = split_var[1];
	var comment_theme = document.createElement("input");
	comment_theme.setAttribute("type", "hidden");
	comment_theme.setAttribute("name", "theme_get");
	comment_theme.setAttribute("value", theme);
	form.appendChild(comment_theme);

	//use GET var from url for orig_id
	var full_url = window.location.href;
	var split_url = full_url.split("?");
	var split_params = split_url[1].split("&");
	var split_var = split_params[1].split("=");
	var orig_id = split_var[1];
	var comment_orig_id = document.createElement("input");
	comment_orig_id.setAttribute("type", "hidden");
	comment_orig_id.setAttribute("name", "orig_id");
	comment_orig_id.setAttribute("value", orig_id);
	form.appendChild(comment_orig_id);
	
	document.body.appendChild(form);
	form.submit();
}