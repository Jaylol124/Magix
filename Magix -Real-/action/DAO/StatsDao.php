<?php
    require_once("Connection.php");

    class StatsDao{
       

        public static function get_count(){
            $connection = Connection::getConnection();

            $statement = $connection->prepare(("SELECT COUNT( idcard) as total FROM info_jeu"));
            $statement->setFetchMode(PDO::FETCH_ASSOC); // retourne en forme de array
            $statement->execute();

            return $statement->fetchAll();
        }

        public static function get_count_each_card(){
            $connection = Connection::getConnection();

            $statement = $connection->prepare(("  SELECT idcard, COUNT(*) AS occurence FROM info_jeu GROUP BY idcard ORDER BY occurence DESC;"));
            $statement->setFetchMode(PDO::FETCH_ASSOC); // retourne en forme de array
            $statement->execute();

            return $statement->fetchAll();
        }


        public static function add_id($id){

            $connection = Connection::getConnection();
 
            // ne pas oublier de specifier les champs qu'on veut insert
            $statement = $connection->prepare(("INSERT INTO info_jeu  VALUES (?)"));
            // $statement->bindParam(1,$id);
            $statement->execute([$id]);

            
        }

        public static function del(){

            $connection = Connection::getConnection();
 
            // ne pas oublier de specifier les champs qu'on veut insert
            $statement = $connection->prepare(("DELETE FROM info_jeu"));
            $statement->setFetchMode(PDO::FETCH_ASSOC); // retourne en forme de array
            $statement->execute();

            return $statement->fetchAll();
        }

        
    }

    
?>