<?php

include_once('../db/crud.php');
$crud = new Crud();

$post_id  = $_POST['post_id'];

if(!isset($post_id))
{
    echo("post id not found");
    exit;
}

$query  = "SELECT * from posts where id = '$post_id';";
$result = $crud->execute($query);

$res =$result->fetch_assoc();
if($res)
{
    echo json_encode($res);
}
else
    echo '<br>No Post Found';
?>