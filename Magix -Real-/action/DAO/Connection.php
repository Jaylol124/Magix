<?php
    require_once("constants.php");
    class Connection {
        private static $connection;

        public static function getConnection() {
            if (Connection::$connection == null) {
                //Connection::$connection = new PDO("pgsql:host=". DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                Connection::$connection = new PDO("pgsql:host=webpgsql.notes-de-cours.com" . ";dbname=" . "db_e2056949", "e2056949", "e2056949");
                Connection::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                Connection::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }

            return Connection::$connection;
        }
    }