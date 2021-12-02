<?php
class DBConnect{
    public static function Connection(){
        try{
            $conn=new PDO("mysql:host=localhost; port=3306;dbname=flit_database", "root","");
            return $conn;
        }
        catch(PDOException $e){
            return "Conection failed: ".$e->getMessage();
        }
    }
}
?>