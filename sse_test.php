<!DOCTYPE html>
<html lang="en">
<head>
    <title>HTML5 Server-Sent Events</title>
    <script type="text/javascript">
        window.onload = function(){
            var source = new EventSource("sse_test_data.php");
            source.onmessage = function(event){
                document.getElementById("result").innerHTML += "New transaction: " + event.data + "<br>";
            };
        };
    </script>
</head>
<body>
    <div id="result">
        <!--Server response will be inserted here-->
    </div>
</body>
</html>
