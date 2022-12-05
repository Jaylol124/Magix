<?php
	require_once("action/CommonAction.php");
	

	class LoginAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			$hasConnectionError = false;

			$data = [];
			$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			if (isset($_POST["username"])) {
				$data["username"] = $_POST["username"];
				$data["password"] = $_POST["pwd"];
			 	$result = parent::callAPI("signin",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_USERNAME_PASSWORD") {
						$hasConnectionError = true;
					}
					else {
						$key = $result->key;
						$_SESSION["username"] = $data["username"];
						$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
						$_SESSION["key"] = $key;
		
						header("location: lobby.php");
						exit;
					}
			 	}
			}
			return compact("hasConnectionError");
		}
	}