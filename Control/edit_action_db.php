<html>
	<head>
	<!-- Sử dụng thuộc tính border bằng CSS -->
	<link rel="stylesheet" href="css/style.css">
	<base href="http://localhost/testphp/">
	</head>
	<body>
		
		<h1>Result</h1>
		<h2>title:</h2>
		<?php
			echo $title=$_GET['title'];
			echo "<h2>Description:</h2>";
			echo $description=$_GET['description'];
			echo "<h2>Image:</h2>";
			echo $image="images/" . $_GET['image'];
			echo '<br>';
			echo '<img src="'.$image.'" alt="" style="width:100px;height:100px;text-align:center;">';
			echo "<h2>Status:</h2>";
			echo $status=$_GET['status'];
			if($status == "Enable"){
				$status = 1;
			} else {
				$status = 0;
			}
			echo "<h2>Update_at:</h2>";
			echo $datetime_update=(date("Y-m-d h:i:s"));
			echo "<br>";

			$new = "UPDATE photo SET title='".$title."',descriptionn='".$description."',image='".$image."',statuss=".$status.",update_at='".$datetime_update."' WHERE id=".$_GET['id'].";";
			// echo $new;
			$conn = new mysqli('localhost', 'root', '123123', 'testphp');

			if ($conn->query($new) === TRUE) {
			  	echo "Update successfully";
			} else {
			  	echo "Error: " . $new . "<br>" . $conn->error;
			}
			$conn->close();
		?>
	</body>
</html>