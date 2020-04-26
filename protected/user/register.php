<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) 
	{
		$postData = 
		[
			'fname' => $_POST['first_name'],
			'lname' => $_POST['last_name'],
			'email' => $_POST['email'],
			'email1' => $_POST['email1'],
			'password' => $_POST['password'],
			'password1' => $_POST['password1']
		];

		if(empty($postData['fname']) || empty($postData['lname']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['password']) || empty($postData['password1'])) 
		{
			echo "Egyik mező üres! Ellenőrizd az adatokat";
		} else if($postData['email'] != $postData['email1']) 
		{
			echo "Nem egyező emailcím!";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) 
		{
			echo "Hibás email formátum!";
		} else if ($postData['password'] != $postData['password1']) 
		{
			echo "A jelszavak nem egyeznek!";
		} else if(strlen($postData['password']) < 8) 
		{
			echo "A jelszónak legalább 8 karakter hosszúságúnak kell hogy legyen!";
		} else if(!UserRegister($postData['email'], $postData['password'], $postData['fname'], $postData['lname'])) 
		{
			echo "Sikertelen regisztráció!";
		}
		$postData['password'] = $postData['password1'] = "";
	}
?>

<h1 style="margin-bottom: 16px"><center>Regisztráció</center></h1>

<form method="post">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerFirstName">Keresztnév</label>
			<input type="text" class="form-control" id="registerFirstName" name="first_name" value="<?=isset($postData) ? $postData['fname'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<label for="registerLastName">Vezetéknév</label>
			<input type="text" class="form-control" id="registerLastName" name="last_name" value="<?=isset($postData) ? $postData['lname'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerEmail">Email</label>
			<input type="email" class="form-control" id="registerEmail" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<label for="registerEmail1">Email megerősítése</label>
			<input type="email" class="form-control" id="registerEmail1" name="email1" value="<?=isset($postData) ? $postData['email1'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerPassword">Jelszó</label>
			<input type="password" class="form-control" id="registerPassword" name="password" value="">
		</div>
		<div class="form-group col-md-6">
			<label for="registerPassword1">Jelszó megerősítése</label>
			<input type="password" class="form-control" id="registerPassword1" name="password1" value="">
		</div>
	</div>

	<button type="submit" class="btn btn-primary bg-dark" name="register">Regisztráció</button>
</form>