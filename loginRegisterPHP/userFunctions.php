<?php
class Records{
    public function dbCon(){
        $dbhost ="localhost";
        $dbname = "ajaxlab";
        $dbuser = "root";
        $dbpwd = "";
        try {
            $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpwd);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch (PDOException $e) {
            echo 'Connection Failed ' . $e->getMessage();
        }
    }
    
    public function searchDate($value) {
        try {
            $dbConnection = $this->dbCon();
            $stmt = $dbConnection->prepare("SELECT email FROM `users` WHERE `email` = :value");
            $stmt->bindParam(':value', $value, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $result = 0;
            if ($count > 0) {
                $result = "Found";
            } else {
                $result = "Not Found";
            }
            return $result;
        } catch (PDOException $e) {
            echo 'Connection Failed ' . $e->getMessage();
        }
    }

}
