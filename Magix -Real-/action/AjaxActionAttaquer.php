<?php
    require_once("action/CommonAction.php");

    class AjaxActionAttaquer extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {

            $data = [];
            $data["key"] = $_SESSION["key"];

            // if($_POST["action"] == "ATTACK")
            // {
            //     $data["type"] = $_POST["action"];
            //     $data["uid"] = $_POST["maCarte"];
            //     $data["targetuid"] = $_POST["opCarte"];
            // }
            // else if($_POST["action"] == "PLAY")
            // {
            //     $data["type"] = $_POST["action"];
            //     $data["uid"] = $_POST["maCarte"];
            // }
            

            $data["type"] = $_POST["choix"];
            $data["uid"] = $_POST["maCarte"];
            $data["targetuid"] = $_POST["opCarte"];
            


            // $data["type"] = "TRAINING";
            // $data["type"] = $_SESSION["TRAINING"];
            $result = parent::callAPI("games/action",$data);
            

            if (!empty($result)) {

                
                // if ($result == "INVALID_KEY" ) {
                //     $hasConnectionError = true;
                    
                    
                // }
                // else {
                    
                //     $data2 = $result;
                    
                // }

                return compact("result");
            }


            
        }
    }