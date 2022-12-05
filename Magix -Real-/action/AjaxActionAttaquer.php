<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/StatsDao.php");
    

    class AjaxActionAttaquer extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $data = [];
            $data2 = [];
            if($_POST["choix"] == "PLAY")
            {
                $data2["id"] = $_POST["id"];
                StatsDao::add_id($data2["id"]);
            }
            
            $data["key"] = $_SESSION["key"];

            $data["type"] = $_POST["choix"];
            $data["uid"] = $_POST["maCarte"];
            $data["targetuid"] = $_POST["opCarte"];
            
            $result = parent::callAPI("games/action",$data);

            if (!empty($result)) {

                return compact("result");
            }
        }
    }