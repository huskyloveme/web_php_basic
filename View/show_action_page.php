<html>
	<head>
	<!-- Sử dụng thuộc tính border bằng CSS -->
	<base href="http://localhost/testphp/">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h2>Show</h2>
		<div>
			<form>
				<?php
					$id = $_GET['id'];
					$conn = new mysqli('localhost', 'root', '123123', 'testphp');
					$sql = "select * from photo where id=".$id.";";
					$result = $conn->query($sql);
					$row = $result-> fetch_assoc();
					echo '<label for="title" >ID:</label>';
					echo '<input value="'.$row['id'].'" style="width: 40%;margin-left: 21.9%;" type="text" id="id" name="id" readonly><br><br>';
					echo '<label for="title" >Title:</label>';
				 	echo '<input value="'.$row['title'].'" type="text" id="title" name="title" style="width: 40%;margin-left: 20.8%;" placeholder="Title" readonly><br><br>';
				  	echo '<label for="Description">Description:</label>';
				 	echo '<input value="'.$row['descriptionn'].'" type="text" id="description" name="description" style="width: 40%;margin-left: 17.15%;" placeholder="Description" readonly><br><br>';
				 	

				 	echo '<label for="Image" stype="margin-left=60%;">Image:</label>';

					echo '<img src="'.$row['image'].'" alt="No file selected" style="margin-left: 20%;margin-right: 65%;" width="100" height="100"/>';

					if($row['statuss']==1){
						$status = 'Enable';
					} else{
						$status = 'Disable';
					}
					$cach = str_repeat("&nbsp;", 61);;
				 	echo '<label for="status">Status:'.$cach.$status.'</label>'; 
			 	?>
			</form>
		</div>
	</body>
</html>