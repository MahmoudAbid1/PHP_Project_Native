<?php
include ('User.php');
session_start();
if(isset($_POST['submit']))
{   $password=$_POST['password'];
    $phone_number=$_POST['phone_number'];
    $username=$_POST['username'];
    $user=new User('',$username,$password,$_SESSION['userEmail'],$phone_number);
    $userController = new CrudUser();
    $userController->update($user);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update password</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username" value="<?php echo($_SESSION['Username']); ?>" >
        <input type="password" name="password" placeholder="password" value="<?php echo($_SESSION['userPassword']);?>">
        <input type="text" name="phone_number" placeholder="phone_number" value="<?php echo($_SESSION['Phone_number']);?>" >
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>