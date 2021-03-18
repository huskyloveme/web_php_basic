<?php

	$conn = new mysqli('localhost', 'root', '123123', 'testphp');
	$sql = "select * from photo where statuss=1";
	$result = $conn->query($sql);
	$result_row = mysqli_num_rows($result);
	$number_of_result = 3;
	
	if(!isset($_GET['page']) && !isset($_GET['number'])){
		$page = 1;
		$number_of_result = 3;
	} else{
		$page = $_GET['page'];
		$number_of_result = $_GET['number'];
	}

	$limit = $number_of_result;
	$number_of_page = ceil($result_row/$number_of_result);
	$start_limit_number = ($page-1)*$number_of_result;
	$sql2 = "SELECT * FROM photo LIMIT $start_limit_number, $limit";
	if ($account_rule == 1){
		$sql2 = "SELECT * FROM photo WHERE statuss=1 LIMIT $start_limit_number, $limit";
	}
	$result = $conn->query($sql2);
	if($result-> num_rows >0){
		while ($row = $result-> fetch_assoc()){
			if ($row['statuss']==0 and $account_rule == 1){
				continue;
			}
			if ($row['statuss']==1) {
				$status = "Enable";
			} else{
				$status = "Disable";
			}
			$image = '<img src="'.$row['image'].'" alt="" style="width:70px;height:70px;text-align:center;">';
			$action_show = '<a href="View/show_action_page.php?id='.$row['id'].'">Show</a>';
			$action_edit = '<a href="View/edit_action_page.php?id='.$row['id'].'">Edit</a>';
			// $action_edit = '<a href="edit_db/'.$row['id'].'">Edit</a>';
			$action_delete = '<a href="Control/delete_action_db.php?id='.$row['id'].'">Delete</a>';
			if($account_rule == 0){
				echo "<tr><td>". $row['id']. '</td><td style="text-align:center;">'. $image ."</td><td>". $row['title']."</td><td>". $status ."</td><td>". $action_show." | ".$action_edit." | ".$action_delete."</td></tr>";
			}
			else{
				echo "<tr><td>". $row['id']. '</td><td style="text-align:center;">'. $image ."</td><td>". $row['title']."</td><td>". $action_show."</td></tr>";
			}
		}
	}
	
?>