<?php
    require_once("action/CommonAction.php");

    class AjaxAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $data["key"] = $_SESSION["key"];
            // $data["type"] = "TRAINING";
            // $data["type"] = $_SESSION["TRAINING"];
            $result = parent::callAPI("games/state",$data);
            

            if (!empty($result)) {
                if ($result == "INVALID_KEY" ) {
                    $hasConnectionError = true;
                    
                    
                }
                else {
                    
                    $data2 = $result;
                    
                }

                return compact("data2");
            }
        }
    }