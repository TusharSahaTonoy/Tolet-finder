<?php

include_once('../db/crud.php');
$crud = new Crud();

session_start();

if(isset($_SESSION['email']))
{
    $email  = $_SESSION['email'];
    $query  = "SELECT * from user where email = '$email';";
    $result = $crud->execute($query);

    $res =$result->fetch_assoc();
    if($res)
    {
        echo json_encode($res);
    }
    else
        echo 'user not found';

}
else
    echo 'not logged-in';

?>