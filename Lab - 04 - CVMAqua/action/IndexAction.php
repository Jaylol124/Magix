<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/ContentDAO.php");

    class IndexAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            
            $data = ContentDAO::getContent();
            return compact ("data");
        }
    }