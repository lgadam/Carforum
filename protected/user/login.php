<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) 
	{
		$postData =
		[
			'email' => $_POST['email'],
    		'password' => $_POST['password']
		];
		if (empty($postData['email']) || empty($postData['password'])) 
		{
			echo "hiányzó adatok! ellenőrizd az adatbevitelt";
		} else if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) 
		{
    		echo "Hibás email formátum!";
  		} else if(!UserLogin($postData['email'], $postData['password'])) 
  		{
    		echo "Hibás email cím vagy jelszó!";
  		}
  		$postData['password'] = "";
	}
?>

<h1><center>Bejelentkezés</center></h1>

<form method="post">
  <div class="form-group">
    <label for="Email1">Email</label>
    <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
  </div>
  <div class="form-group">
    <label for="Password1">Jelszó</label>
    <input type="password" class="form-control" id="Password1" name="password" value="">
  </div>
  <button type="submit" class="btn btn-primary bg-dark" name="login">Bejelentkezés</button>
</form>