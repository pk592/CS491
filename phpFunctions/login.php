<?php
	session_start();

	require "../DatabaseConnection/connectionForDB.php";

	if(isset($_POST['submit']))
	{
		echo "Good";
		$email = $_POST['email'];
		$password = $_POST['password'];





		try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();


		 // set the resulting array to associative
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($result);
//print("\n");
//print_r($stmt);

  if(empty($result)){

  	echo " result are empty";
  }
  //$var_dump($result['email']);
  //print_r($result);
  $hashPassword = $result['usersPassword'];
  //var_dump($hashPassword);
 // var_dump($password);

  if (password_verify($password, $hashPassword))
  {
  	echo "password match";
  	echo "<br>";

$_SESSION["firstName"] = $result['firstname'];

	if ($result['user_type'] == "admin")
	{
		  header("location ./adminHome.php");
	}
	else {

			header("location: ../home.php");
	}

  	
  }
  else {

  	echo "password do not match";
  	echo "<br>";
  	echo "please try again";

  }


		//print_r($result);
		//print("\n");
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