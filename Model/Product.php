<?php 
include('../../Core/conection.php');
include('../../Core/ClasseProduct.php');

class CrudProduct
{
    // public static function insert($Product)
    // {
    //     $sql = "INSERT INTO user(id,username,password,email,phone_number,status) 
    //     VALUES ('',:username,:password,:email,:phone_number,'0')  ";
    //     $db = config::getConnexion();
    //     try
    //     {
    //         $req=$db->prepare($sql);
    //         $req->bindValue(":username", $User->getUsername());
    //         $req->bindValue(":password", $User->getPassword());
    //         $req->bindValue(":email", $User->getEmail());
    //         $req->bindValue(":phone_number", $User->getPhoneNumber());
    //         $req->execute();
    //     }
    //     catch (Exception $e){
    //         echo 'Erreur: '.$e->getMessage();
    //     }
    // }
    // public static function Update($User)
    // {
    //     $sql = "UPDATE user
    //      SET `username`= :username, `password`= :password, `email`= :email, `phone_number`= :phone_number where email=:email  ";
    //      $db = config::getConnexion();
    //     try
    //     {
    //         $req=$db->prepare($sql);
    //         $req->bindValue(":username", $User->getUsername());
    //         $req->bindValue(":password", $User->getPassword());
    //         $req->bindValue(":email", $User->getEmail());
    //         $req->bindValue(":phone_number", $User->getPhoneNumber());
    //         $req->execute();
    //     }
    //     catch (Exception $e){
    //         echo 'Erreur: '.$e->getMessage();
    //     }
    // }
    // public static function Delete($id)
    // {
    //     $sql = "DELETE FROM user where id=:id";
    //     $db = config::getConnexion();
    //     try{
    //          $req=$db->prepare($sql);
    //          $req->bindValue(':id',$id);
    //          $req->execute();
    //         }
    //    catch (Exception $e){
    //         echo 'Erreur: '.$e->getMessage();
    //     }
    //     }
       

    public function Display_All_Products()
    {
        $sql="SELECT * FROM  product ";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

     public function searchByUsername($arg1)
    {
        $sql="SELECT * FROM user where username like  '%".$arg1."%'" ;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
    public function SearchWithCheckBox($ConditionAttribut1,$ConditionAttribut2,$OrderAttribut)
    {
        if(($ConditionAttribut1=="")&&($ConditionAttribut2==""))
        {
        $sql="SELECT * FROM product order by price ".$OrderAttribut;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }

        if(($ConditionAttribut1!="")&&($ConditionAttribut2!=""))
        {
        $sql="SELECT * FROM product where categories='".$ConditionAttribut1."' and type='".$ConditionAttribut2."' order by price ".$OrderAttribut;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }
        if(($ConditionAttribut1=="")&&($ConditionAttribut2!="")){
            $sql="SELECT * FROM product where  type='".$ConditionAttribut2."' order by price ".$OrderAttribut;
            $db=config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        if(($ConditionAttribut1!="")&&($ConditionAttribut2==""))
        {    $sql="SELECT * FROM product where  categories='".$ConditionAttribut1."' order by price ".$OrderAttribut;
            $db=config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   


        }

        
    }
}  
    
    
?>