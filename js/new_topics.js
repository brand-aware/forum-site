function submitButton(){
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action", "create_topic.php");

	//store hidden variable for new_topic text
	var topic_text = document.getElementById("topic_input").value;
	var topic_input_element = document.createElement("input");
	topic_input_element.setAttribute("type", "hidden");
	topic_input_element.setAttribute("name", "topic_post");
	topic_input_element.setAttribute("value", topic_text);
	form.appendChild(topic_input_element);

	//store hidden variable for username
	var username_text = document.getElementById("username_input").value;
	var username_input_element = document.createElement("input");
	username_input_element.setAttribute("type", "hidden");
	username_input_element.setAttribute("name", "username_post");
	username_input_element.setAttribute("value", username_text);
	form.appendChild(username_input_element);


	//use GET var from url
	var full_url = window.location.href;
	var split_url = full_url.split("?");
	var split_var = split_url[1].split("=");
	var topic = split_var[1];
	var topic_element = document.createElement("input");
	topic_element.setAttribute("type", "hidden");
	topic_element.setAttribute("name", "topic_get");
	topic_element.setAttribute("value", topic);
	form.appendChild(topic_element);	
	
	document.body.appendChild(form);
	form.submit();
}
