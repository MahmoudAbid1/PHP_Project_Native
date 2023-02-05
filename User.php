<?php 
include('conection.php');
include('ClasseUser.php');
//$db = config::getConnexion();
class CrudUser
{
    public static function insert($User)
    {
        $sql = "INSERT INTO user(id,username,password,email,phone_number) 
        VALUES ('',:username,:password,:email,:phone_number)  ";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
       
        $req->bindValue(":username", $User->getUsername());
        $req->bindValue(":password", $User->getPassword());
        $req->bindValue(":email", $User->getEmail());
        $req->bindValue(":phone_number", $User->getPhoneNumber());
        $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    public static function Update($User)
    {
        $sql = "UPDATE user
         SET `username`= :username, `password`= :password, `email`= :email, `phone_number`= :phone_number where email=:email  ";
       
        
         $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(":username", $User->getUsername());
            $req->bindValue(":password", $User->getPassword());
            $req->bindValue(":email", $User->getEmail());
            $req->bindValue(":phone_number", $User->getPhoneNumber());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    
    
    public static function Delete($user)
    {
        $sql = "DELETE FROM user where id=:id";
        $db = config::getConnexion();
       
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$user->id);
          $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        }

        public function forgetpassword($email)
        {
            $liste="";
            $sql = "SELECT password FROM user where email='$email'";
            $db = config::getConnexion();
            try{
                    $liste = $db->query($sql);
                    foreach($liste as $list)
                    {
                        $list=['password'];
                        echo $list;
                    }
                }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
        }

        public function Verifie($email,$password)
        {
            
           try{
            $sql="SELECT * FROM user WHERE email = :email AND password = :password";
            $db=config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindParam(':email', $email);
            $req->bindParam(':password', $password);
            $req->execute();
            $result = $req->fetch();
           
           
            echo ("lol");
           
                if ($result) {
                  
                  $_SESSION['Username']=$result['username'];
                  $_SESSION['id']=$result['id'];
                  $_SESSION['Phone_number']=$result['phone_number'];
                
                    header('Location: ./now-ui-dashboard-master/examples/dashboard.php');
               
                } else {
             
                }
               
    }
     catch (PDOException $e) {
        //handle connection error
    }
        }
    
    
    }  
?>