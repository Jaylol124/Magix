<?php
    require_once("action/CommonAction.php");
   

    class LobbyAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            
            $hasConnectionError = false;

			$data = [];
			
			
			if (isset($_POST["play"])) {
			
                $data["key"] = $_SESSION["key"];
                $data["type"] = "TRAINING";
                // $data["type"] = $_SESSION["TRAINING"];
			 	$result = parent::callAPI("games/auto-match",$data);
	
			 	if (!empty($result)) {
					if ($result == "INVALID_KEY" || $result == "INVALID_GAME_TYPE" || $result == "DECK_INCOMPLETE" ) {
						$hasConnectionError = true;
                        // header("location: lobby.php");
                        
                        
					}
					else {
						// // Pour voir les informations retournées : var_dump($result);exit;
						// $key = $result->key;
						// $_SESSION["username"] = $data["username"];
						// // $_SESSION["visibility"] = $result["visibility"];
						// $_SESSION["key"] = $key;
		
						header("location: jeu.php");
                        
						exit;
					}
			 	}
			}
			
			return compact("hasConnectionError");
        }
    }