/**
 * Created by wontzer on 3/11/14.
 */

function searchButtonClick(){
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action", "search.php");

	//store hidden variable for search text
	var search_text = document.getElementById("search_text").value;
	var search_element = document.createElement("input");
	search_element.setAttribute("type", "hidden");
	search_element.setAttribute("name", "search_post");
	search_element.setAttribute("value", search_text);
	form.appendChild(search_element);

	document.body.appendChild(form);
	form.submit();
}