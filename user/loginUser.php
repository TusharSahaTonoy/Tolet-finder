<?php

include_once('../db/crud.php');
$crud = new Crud();

$email = $_POST['email'];
$pass  = $_POST['password'];

if(!empty($email) && !empty($pass))
{
    $query = "SELECT * from user where email='$email' and password ='$pass';";

    $result = $crud->execute($query);
    $res = $result->fetch_assoc();

    if($res){
        session_start();
        $_SESSION['email'] = $res['email'];
        echo 'Logged in';
    }
    else{
        echo 'User not found';
    }
}
else
    echo 'Email and password could not be posted.';

// if($res['email'])
// {
//     echo 'user found';
// }else{
//     echo 'user not found';
// }

?>