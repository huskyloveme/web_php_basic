<?php
	session_start();
    if (!isset($_SESSION['myusername']) || $_SESSION['myusername'] == ''){
    	header("location:../testphp/View/login.html");
    }
?> 
<html>
	<head>
	<base href="http://localhost/testphp/">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div>
			<?php
				$account_rule = $_SESSION['level'];
				if ($account_rule == 0){
					echo '<h1 style="display: inline; margin-right: 70%; margin-bottom: -2%; ">Manage</h1>';
				}
				else{
					echo '<h1 style="display: inline; margin-right: 70%; margin-bottom: -2%; ">Show</h1>';
				}
			?>
			
			<a href="/testphp/View/new_db.html">New | </a>
			<a href="/testphp/View/login.html">Logout</a>
		</div>
		<table style="width:80%;margin-left: 10%">  
			<tr>
				<th style="width:5%">ID</th>
				<th style="width:15%">Thumb</th>
				<th style="width:40%">Title</th>
				<?php
					if ($account_rule == 0){
						echo '<th>Status</th>';
					} 		
				?>
				<th>Action</th>
			</tr>
			<?php 
				include 'Control/connect_show_db.php';
			?>
		</table>
		<?php 
			include 'Control/pagination.php';
		?>
		<div>
			<label for="page">Page:</label>
			<select id="page" onchange="myFunction()">
				<option value="">--Choose--</option>
				<option value="3">3</option>
			  	<option value="5">5</option>
			  	<option value="10">10</option>
			  	<option value="0">all</option>
			</select> 
			<p id="demo"></p>
		</div>
		<script>
			function myFunction() {
			 	var x = document.getElementById("page").value;
			 	if(x=="0"){
			 		var number_row = <?php echo json_encode($result_row); ?>;
			 		x = String(number_row);
			 	}
			 	window.location.href = "index.php?page="+1+"&number="+String(x);
			}
		</script>
	</body>
</html>