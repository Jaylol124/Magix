<?php
	require_once("action/CommonAction.php");
	

	class LoginAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			$hasConnectionError = false;

			$data = [];
			
			
			if (isset($_POST["username"])) {
				$data["username"] = $_POST["username"];
				$data["password"] = $_POST["pwd"];
			 	$result = parent::callAPI("signin",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_USERNAME_PASSWORD") {
						$hasConnectionError = true;
						// err
					}
					else {
						// Pour voir les informations retournées : var_dump($result);exit;
						$key = $result->key;
						$_SESSION["username"] = $data["username"];
						// $_SESSION["visibility"] = $result["visibility"];
						$_SESSION["key"] = $key;
		
						header("location: lobby.php");
						exit;
					}
			 	}
			}
			
			return compact("hasConnectionError");
		}
	}

	
	
			// if (isset($_POST["username"])) {
			// 	$result = UserDAO::authenticate($_POST["username"], $_POST["pwd"]);

			// 	if (!empty($result)) {
			// 		$_SESSION["username"] = $result["username"];
			// 		$_SESSION["visibility"] = $result["visibility"];

			// 		header("location:admin-index.php");
			// 		exit;
			// 	}
			// 	else {
			// 		$hasConnectionError = true;
			// 	}
			// }

			// return compact("hasConnectionError");