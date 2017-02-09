<?php
	if (!$Reg_OK){
?>
<div style="padding:50px;">
	<form method = "post">
		<table>
			<tr>
				<td>
					<div style="padding:5px;"><b>Login *:<b></div>
				</td>
				<td>
					<input type="text" name="login">
				</td>
				<td>
					<div style="padding:5px; color:red; font-size:11px;"><?php if ($isError_Login) echo $Error_Login; ?> </div>
				</td>
			</tr>
			<tr>
				<td>
					<div style="padding:5px;"><b>Password *:<b></div>
				</td>
				<td>
					<input type="password" name="password">
				</td>
				<td>
					<div style="padding:5px; color:red; font-size:11px;"><?php if ($isError_Password) echo $Error_Password; ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<div style="padding:5px;"><b>Email *:<b></div>
				</td>
				<td>
					<input type="text" name="email">
				</td>
				<td>
					<div style="padding:5px; color:red; font-size:11px;"><?php if ($isError_Email) echo $Error_Email; ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<div style="padding:5px;"><b>Age :<b></div>
				</td>
				<td>
					<input type="text" name="age">
				</td>
			</tr>
			<tr>
				<td>
					<div style="padding:5px;"><b>Gender :<b></div>
				</td>
				<td>
					M&nbsp <input type="radio" name="gender" value="0" checked>
					&nbsp|&nbsp
					F&nbsp <input type="radio" name="gender" value="1">
				</td>
			</tr>
		</table>
		<div style="padding:10px; color:black; font-size:9px;">* - fields are required</div>
		<p><input type="submit"></p>
		<input type="hidden" name="Reg" value="true">
	</form>
</div>
<?php
	}
	else {
		if (mb_strlen($isUser) == 0) {
			echo '<p><h2>Успешная регистрация пользователя <b>'.$login.'</b></h2></p>';
		} else {
			echo $isUser;
		}
		
	}
?>