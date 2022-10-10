<?php
    require_once("action/CommonAction.php");

    class ContentDAO {

        public static function setContent($name) {
            file_put_contents("data/data.txt", $name);
        }

        public static function getContent() {
            
            return file_get_contents("data/data.txt");

        }


    }