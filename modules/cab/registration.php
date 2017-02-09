<?php 
	$Reg = isset($_POST['Reg']) ? $_POST['Reg'] : false;
	$Reg_OK = isset($_SESSION['Reg_OK']) ? $_SESSION['Reg_OK'] : false;
	
	$isError_Login = false;
	$isError_Password = false;
	$isError_Email = false;
	
	$login = htmlspecialchars(isset($_POST['login']) ? $_POST['login'] : '');
	$password = htmlspecialchars(isset($_POST['password']) ? $_POST['password'] : '');
	$email = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '');
	$age = htmlspecialchars(isset($_POST['age']) ? $_POST['age'] : '');
	
	$genderT = htmlspecialchars(isset($_POST['gender']) ? $_POST['gender'] : '');
	$gender = $genderT == '0' ? 0 : 1;
	
	$note = htmlspecialchars(isset($_POST['note']) ? $_POST['note'] : '');
	
	$isUser = isUser($link,$login,$email);
	echo '111111111111111111'.$isUser.'222222222222';
	
	if ($Reg && mb_strlen($isUser) == 0) {
		
		$ArrayRegistrationErrors = checkRegistraionData($login,$password,$email);
		
		if (count($ArrayRegistrationErrors) == 0) {
				$Reg_OK = true;
				$_SESSION['Reg_OK'] = true;
		} else {
			$isError_Login = isset($ArrayRegistrationErrors['Error_Login']);
			$isError_Password = isset($ArrayRegistrationErrors['Error_Password']);
			$isError_Email = isset($ArrayRegistrationErrors['Error_Email']);
		
			$Error_Login = $isError_Login ? $ArrayRegistrationErrors['Error_Login'] : '';
			$Error_Password = $isError_Password ? $ArrayRegistrationErrors['Error_Password'] : '';
			$Error_Email = $isError_Email ? $ArrayRegistrationErrors['Error_Email'] : '';
		}
	}
	
	if ($Reg_OK) {
		$res = mysqli_query($link,"
				INSERT INTO `users` SET
				`LOGIN` = '".mysqli_real_escape_string($link,$login)."',
				`PASSWORD` = '".mysqli_real_escape_string($link,$password)."',
				`EMAIL` = '".mysqli_real_escape_string($link,$email)."',
				`AGE` = ".(int)$age.",
				`GENDER` = ".(int)$gender.",
				`NOTE`= '".mysqli_real_escape_string($link,$note)."'
			") or exit (mysqli_error($link));
		
	} 
	
	$_POST['Reg'] = false;
	$_SESSION['Reg_OK'] = false;
	
	
?>