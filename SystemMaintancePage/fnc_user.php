<?php
	$database = "if20_marcus_praktika";

//FUNCTION FOR WHEN NEW ACCOUNT CREATED
	function signup($email, $password){
		$notice = null;
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//Show where to enter new data
		$stmt = $conn->prepare("INSERT INTO accounts (user, password) VALUES(?,?)");
		echo $conn->error;
		//Encrypt password
		$options = [
						'cost' => 12,
					];
		//Hash it
		$pwdhash = password_hash($password, PASSWORD_BCRYPT, $options);
		
		//Send to database
		$stmt->bind_param("ss", $email, $pwdhash);
		if($stmt->execute()){
			$notice = "ok";
		} else {
			$notice = $stmt->error;
		}
		//Close connection
		$stmt->close();
	    $conn->close();
		return $notice;
	}
	
//FUNCTION FOR ACCOUNT SIGNS IN
	function signin($email, $password){
		$notice = null;
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//Show what it needs to select
		$stmt = $conn->prepare("SELECT password FROM accounts WHERE user = ?");
		echo $conn->error;
		//What variable to put data into
		$stmt->bind_param("s", $email);
		$stmt->bind_result($passwordfromdb);
		if($stmt->execute()){
			//Getting the data worked
			if($stmt->fetch()){
				if(password_verify($password, $passwordfromdb)){
					//Correct password, now log in
					$notice = "ok";
					$stmt->close();
					
					//Show what it needs to select
					$stmt = $conn->prepare("SELECT accounts_id FROM accounts WHERE user = ?");
					echo $conn->error;
					//What variable to put data into
					$stmt->bind_param("s", $email);
					$stmt->bind_result($idfromdb);
					$stmt->execute();
					$stmt->fetch();
					
					$_SESSION["userid"] = $idfromdb;
					
					//Close connection
					$stmt->close();
					header("Location: home.php");
					exit();
				} else {
					//If wrong password
					$notice = "Vale salasõna!";
				}
			} else {
				//If there is no account with that email
				$notice = "Sellist kasutajat (" .$email .") kahjuks pole!";
			}
		} else {
			//If there was an error
			$notice = "Sisselogimisel tekkis tehniline viga: " .$stmt->error;
		}
		//Close connection
		$stmt->close();
		$conn->close();
		return $notice;
	}

//FUNCTION FOR ACCOUNT PASSWORD CHANGE
	function newpassword($email, $password, $newpassword){
		$notice = null;
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//Show what it needs to select
		$stmt = $conn->prepare("SELECT password FROM accounts WHERE user = ?");
		echo $conn->error;
		//What variable to put data into
		$stmt->bind_param("s", $email);
		$stmt->bind_result($passwordfromdb);
		if($stmt->execute()){
			//Getting the data worked
			if($stmt->fetch()){
				if(password_verify($password, $passwordfromdb)){
					//Correct password
					$stmt->close();
					//Encrypt new password
					$options = [
						'cost' => 12,
					];
					//Hash new password
					$pwdhash = password_hash($newpassword, PASSWORD_BCRYPT, $options);
					
					//Lets replace old has with new
					$sql = "UPDATE accounts SET password='$pwdhash' WHERE user='$email';";
					
					//LET'S SEND IT TO THE MOON (aka database)
					if ($conn->query($sql) === TRUE) {
					  echo "Record updated successfully";
					} else {
					  echo "Error updating record: " . $conn->error;
					}
					
					$notice = "ok";
					//Close connection
					$conn->close();
					header("Location: home.php");
					exit();
				} else {
					//If wrong old password
					$notice = "Vale salasõna!";
				}
			} else {
				//If there is no account with that email
				$notice = "Sellist kasutajat (" .$email .") kahjuks pole!";
			}
		} else {
			//If there was an error
			$notice = "Parooli muutmisel tekkis tehniline viga: " .$stmt->error;
		}
		return $notice;
	}
	
//FUNCTION TO SHOW ALL ACCOUNTS
	function AccountsOutput() {
	  $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	  $conn->set_charset("utf8");
	  //Show what it needs to select
	  $SQLsentence = "SELECT accounts_id, user FROM accounts";
	  $stmt = $conn->prepare($SQLsentence);
	  //What variable to put data into
	  $stmt->bind_result($idfromdb, $emailfromdb);
	  $stmt->execute();
	  $lines = "";
	  //Create Tabel from results
	  while($stmt->fetch()) {
		$lines .= "<td>" .$idfromdb ."</td>\n";   
		$lines .= "<td>" .$emailfromdb ."</td></tr>\n";
	  }
	  if(!empty($lines)) {
		  $notice = "<table>\n<tr>\n" .'<th>ID</th>';
		  $notice .= "\n" .'<th>Email</th>';
		  $notice .= "</tr>\n" .$lines ."</table>\n";
	  }
	  //Close connection
	  $stmt->close();
	  $conn->close();
	  return $notice;
  }
