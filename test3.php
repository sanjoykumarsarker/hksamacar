<html>
	<head>
		<title>JavaScript - Close Current Tab on Button Click with Confirmation.</title>
		<script type="text/javascript">
			function closeCurrentTab(){
				var conf=confirm("Are you sure, you want to close this tab?");
				if(conf==true){
					close();
				}
			}
		</script>
	</head>

	<body style="text-align: center;">
		<h1>JavaScript - Close Current Tab on Button Click with Confirmation. </h1>
		<p><input type="button" value="Close Tab." onclick="closeCurrentTab()"</p>

	</body>

</html>