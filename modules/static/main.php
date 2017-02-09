<?php
	$TLink = isset($_POST["TLink"]) ? $_POST["TLink"] : '';
	if (!empty($TLink)){
		$res = mysqli_query($link,$TLink) or exit(mysqli_error($link));
		while ($row = mysqli_fetch_assoc($res)){
			wtf($row,1);
		} 		
	} else {
		echo '<p>Nothig</p>';
	}

?>
