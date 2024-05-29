 
 <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
$.ajax({
    url: "users.txt",
    dataType: "text",
    success: function(data) {
        var autoCompleteData = data.split(',');
        $("#tags").autocomplete({
            source: function(request, response) {
                var results = $.ui.autocomplete.filter(autoCompleteData, request.term);
                response(results.slice(0, 10)); // Display the first 10 results
            }
        });
    }
});
	 
	 </script>
	 <body>
	 
	 
	 
	 <form> 
	 
	<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
	 
	 
	 
	  </form> 
	 
	 
	 
 </body>
	 
	 </html  >