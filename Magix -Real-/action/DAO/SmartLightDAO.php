<?php
    require_once("action/DAO/Connection.php");

    class CartesDAO {

        public static function getmostplayed() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM lights"); // chercher la carte la plus jouer

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            return $statement->fetchAll();
        }

    }