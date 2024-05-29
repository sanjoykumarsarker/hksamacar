<style type="text/css">

#wrapper	{
		background-color: #787878;
	}

.card-header	{
	background-color: #3c3c3c;
	max-height: 40px;
	padding: 5px;
	}

.card-link {
	color: white;
	}

.card-link:Hover {
	color: yellow;
	}

.card-body {
	padding: 5px;
	background-color: #f0f0f0;

	}

.card-body a {
	color: black;
	}

</style>

<?php
if (!isset($_SESSION)) session_start();

include_once "function.php";
include_once "session_check.php";

$u_name=user_id_name($_SESSION["id"]);
$user_key=get_user_key($_SESSION["id"]);


echo  "<div class='border border-white shadow p-2'>
		<p class='badge badge-info d-none d-lg-block'>$u_name</p>";
echo '
	<div class="d-flex justify-content-center">
		<a href="/hks_user_info.php" class="badge badge-light badge-pill mr-2">
			<i class="fa fa-user"></i>
		</a>
		<a href="//www.harekrishnasamacar.com/hks_admin_login.php" class="badge badge-danger badge-pill">
			<i class="fa fa-power-off"></i>
		</a>
	</div>
</div>';
?>
