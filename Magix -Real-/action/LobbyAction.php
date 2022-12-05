<?php
    require_once("action/CommonAction.php");
   

    class LobbyAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            
            $hasConnectionError = false;

			$data = [];
			
			if (isset($_POST["TRAINING"])) {
				echo($_POST["TRAINING"]);
			
                $data["key"] = $_SESSION["key"];
                $data["type"] = "TRAINING";
               
			 	$result = parent::callAPI("games/auto-match",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_KEY" || $result == "INVALID_GAME_TYPE" || $result == "DECK_INCOMPLETE" ) {
						$hasConnectionError = true;
					}
					else {
						header("location: jeu.php");
						exit;
					}
			 	}
			}

			if (isset($_POST["PVP"])) {
				echo($_POST["PVP"]);
			
                $data["key"] = $_SESSION["key"];
                $data["type"] = "PVP";
			 	$result = parent::callAPI("games/auto-match",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_KEY" || $result == "INVALID_GAME_TYPE" || $result == "DECK_INCOMPLETE" ) {
						$hasConnectionError = true;   
					}
					else {
						header("location: jeu.php");
						exit;
					}
			 	}
			}

			if (isset($_POST["logout"])) {
				
                $data["key"] = $_SESSION["key"];
			 	$result = $result = parent::callAPI("signin",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_KEY" ) {
						$hasConnectionError = true;
					}
					else {
						$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
						header("location: login.php");
						exit;
					}
			 	}
			}
			return compact("hasConnectionError");
        }
    }