<html>
	<head>
	<!-- Sử dụng thuộc tính border bằng CSS -->
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
		$conn = new mysqli('localhost', 'root', '123123', 'testphp');
		$sql = "DELETE FROM photo WHERE id=".$_GET['id'].";";
		if ($conn->query($sql) === TRUE) {
			  	echo "Delete successfully";
			} else {
			  	echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
		?>
	</body>
</html>