<?php


class config{
    private static $instance = NULL;

    public static function getConnexion() {
        if (!isset(self::$instance)) {
            try{
                self::$instance = new PDO("mysql:host=localhost;dbname=database", "wicked", "apiger123*abid");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo "Connected successfully";
            }catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
       
        return self::$instance;
    }
}

// $connect=mysqli_connect('localhost','wicked','apiger123*abid','database');
// if(!$connect)
// {
//     echo 'Connection error' . mysqli_connect_error();
// }
// else{
//     echo "database is conected ";
// }
?>
