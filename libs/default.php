<?php

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

function checkRegistraionData($login,$password,$email){
	$ArrayRegistrationErrors = array();
	if (mb_strlen($login) < 3) {
		$ArrayRegistrationErrors["Error_Login"] = "Login must be more than 3 characters!";
	}
	if (mb_strlen($password) < 6) {
		$ArrayRegistrationErrors["Error_Password"] = "Password must be more than 6 characters!";
	}
	if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$ArrayRegistrationErrors["Error_Email"] = "E-mail is not correct!";
	}
	return $ArrayRegistrationErrors;
}

function isUser($link,$login,$email) {
	$isUser = "";
	//$isUserLogin = false;
	//$isUserEmail = false;
	
	$TQ = "
	SELECT * FROM `users` WHERE
	`LOGIN` = '".$login."' OR 
	`EMAIL` = '".$email."' 
	";
	echo '<p>'.$TQ.'<p>';
	$res = mysqli_query($link,$TQ) or exit(mysqli_error($link));
	if (mysqli_num_rows($res)){
		while ($row = mysqli_fetch_assoc($res)){
			if (($row['LOGIN'] == $login) && ($row['EMAIL'] == $email)){
				$isUser = "Существует пользователь с таким логином и почтовым аккаунтом";
			} else {
				if ($row['LOGIN'] == $login){
						$isUser = "Существует пользователь с таким логином";
					} else {
						$isUser = "Существует пользователь с таким почтовым аккаунтом";
						}	
				}
		}
	}
	return $isUser;
}
