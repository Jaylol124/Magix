<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/StatsDao.php");

    class StatsAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {



            $total = StatsDao::get_count();

            $listeandcont = StatsDao::get_count_each_card();


            if (isset($_POST["supp"])) {
				
                StatsDao::del();
                header("location: lobby.php");
                        
                exit;
			}
            
            return compact("listeandcont","total");
            

        }
    }