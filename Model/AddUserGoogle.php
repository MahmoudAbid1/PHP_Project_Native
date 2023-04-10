<?php
include('../../Core/conection.php');
include('../../Core/ClasseUserGoogle.php');

class CrudUserGoogle
{
    public function insert($Usergoogle)
    {
        
        //$sql = "INSERT INTO googleusers(email,first_name,last_name,verified_email,token)VALUES(':email',':first_name',':last_name',':verified_Email',':token')";
         // print_r($Usergoogle->getFirst_name());
        //$sql1 = "INSERT INTO `googleusers`(`id`,`email`,`first_name`,`last_name`,`verified_email`,`token`)
        //VALUES ('',':email',':first_name',':last_name',':verified_Email',':token')";

        $sql1 = "INSERT INTO `googleusers`(`email`,`first_name`,`last_name`,`verified_email`,`token`)
        VALUES (?,?,?,?,?)";
        $db = config::getConnexion();
        
        try
        {
            $req=$db->prepare($sql1);
           
    //     $req->bindValue(":email",$Usergoogle->getEmail());
    //     $req->bindValue(":first_name",$Usergoogle->getFirst_name());
    //     $req->bindValue(":last_name",$Usergoogle->getLast_name());
    //     $req->bindValue(":gendre", $Usergoogle->getGendre());
    //     $req->bindValue(":full_name", $Usergoogle->getFull_name());
    //     $req->bindValue(":picture", $Usergoogle->getPicture());
    //     $req->bindValue(":verified_Email",$Usergoogle->getVerifiedEmail());
    //     $req->bindValue(":token",$Usergoogle->getToken());
    //     print_r($Usergoogle->getFirst_name());
        $req->execute([$Usergoogle->getEmail(),$Usergoogle->getFirst_name(),$Usergoogle->getLast_name(),$Usergoogle->getVerifiedEmail(),$Usergoogle->getToken()]);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            
        }
    }
}
?>