<?php
	echo '<div style="margin-left: 40%">';
	if($page != 1){
		echo '<a href="index.php?page=' . ($page-1) . '&number='.$number_of_result. '">' . "<<"  . '</a>';
		echo "&nbsp;&nbsp;&nbsp;";
	}
	for ($p=1;$p<=$number_of_page;$p++){
			if($p != $page){
				echo '<a href="index.php?page=' . $p . '&number='.$number_of_result. '">' . $p  . '</a>';
				echo "&nbsp;&nbsp;&nbsp;";
			} else{
				echo '<a href="index.php?page=' . $p . '&number='.$number_of_result. '">'.'<strong style="color: red;">' .$p.'</strong>' . '</a>';
				echo "&nbsp;&nbsp;&nbsp;";
			}
	}
	if($page != $number_of_page){
		echo '<a href="index.php?page=' . ($page+1) . '&number='.$number_of_result. '">' . ">>"  . '</a>';
		echo "&nbsp;&nbsp;&nbsp;";
	}
	$conn->close();
	echo '</div>';

?>