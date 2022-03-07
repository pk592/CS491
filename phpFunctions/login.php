<?php
	session_start();

	require "../DatabaseConnection/connectionForDB.php";

	if(isset($_POST['submit']))
	{
		echo "Good";
		$email = $_POST['email'];
		$password = $_POST['password'];

		var_dump($email);
		var_dump($password);




		try {

		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		var_dump($stmt);

		 // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $var_dump($result);
  print_r($result);
  $hashPassword = $result['usersPassword'];
  var_dump($hashPassword);
  var_dump($password);

  if (password_verify($password, $hashPassword))
  {
  	echo "password match";
  }
  else {

  	echo "password do not match";
  }



	}
	catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}





	}
	else
	{
		echo "Not Good";
	}



?>