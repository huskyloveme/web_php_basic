<html>
	<head>
	<!-- Sử dụng thuộc tính border bằng CSS -->
	<link rel="stylesheet" href="css/style.css">
	<base href="http://localhost/testphp/">
	</head>
	<body>
		<h2>Edit</h2>
		<div style="margin-left: : 20%;">
			<form action="/testphp/Control/edit_action_db.php">
				
				<?php
					$id = $_GET['id'];
					$conn = new mysqli('localhost', 'root', '123123', 'testphp');
					$sql = "select * from photo where id=".$id.";";
					$result = $conn->query($sql);
					$row = $result-> fetch_assoc();
					echo '<label for="title" >ID:</label>';
					echo '<input value="'.$row['id'].'" style="width: 40%;margin-left: 21.9%;" type="text" id="id" name="id" readonly><br><br>';
					echo '<label for="title" >Title:</label>';
				 	echo '<input value="'.$row['title'].'" type="text" id="title" name="title" style="width: 40%;margin-left: 20.8%;" placeholder="Title"><br><br>';
				  	echo '<label for="Description">Description:</label>';
				 	echo '<input value="'.$row['descriptionn'].'" type="text" id="description" name="description" style="width: 40%;margin-left: 17.15%;" placeholder="Description"><br><br>';
				 	

				 	echo '<label for="Image" stype="margin-left=60%;">Image:</label>';

					echo '<img id="showImg" src="'.$row['image'].'" alt="No file selected" style="margin-left: 20%;" width="100" height="100"/>';

				?>
					
					<img id="blahh" alt="No file selected" style="display: none; margin-left: 0%;" width="100" height="100"/>
					<input type="file" id="image" name="image" style="width: 80%;margin-left: 22%; margin-bottom: 20px" onchange="document.getElementById('showImg').src = window.URL.createObjectURL(this.files[0]);">
				<?php
					if($row['statuss']==1){
						$status = 'Enable';
					} else{
						$status = 'Disable';
					}
					
				 	echo '<label for="status">Status:</label>';
				 	echo '<p id="demo">'.$status.'</p>';
					echo '<select id="status" name="status" style="width: 10%;margin-left: 1%;">
											<option value="Enable">Enable</option>
										  	<option value="Disable">Disable</option>
										</select>';

				 	echo '<input type="submit" value="Edit" style="width: 10%;margin-left: 20%;">';
			 	?>
			</form>
		</div>
	</body>
</html>