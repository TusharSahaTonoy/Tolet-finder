<?php

include_once('../db/crud.php');

$id="u".date("y").date("m")."_".rand(1, 1000000);

$name   = $_POST['name'];
$email  = $_POST['email'];
$pass   = $_POST['password'];


$crud = new Crud();

$query = "SELECT count(*) as 'count' from user where email='$email'";

$result = $crud->execute($query);
$res = $result->fetch_assoc();

if(!$res['count'])
{
    $query="insert into user values('$name','$email','$pass')";
    $result =$crud->execute($query);
    if($result)
        echo "Inserted";
    else
        echo "Could not insert";
}
else
{
    echo 'User alresdy exist';
}


?>