<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/ContentDAO.php");

    class AdminIndexAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_ADMINISTRATOR);
        }

        protected function executeAction() {

            $savedSuccessfully = false;

            if (!empty($_POST["ecrireText"])) {

				$result = ContentDAO::setContent($_POST["ecrireText"]);
                $savedSuccessfully = true;
				
			}

            $indexText = ContentDAO::getContent();
            return compact("indexText", "savedSuccessfully");
        }
    }