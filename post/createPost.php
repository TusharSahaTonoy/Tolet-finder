<?php
session_start();
if(!isset($_SESSION['email']))
{
    echo 'signup first';
    exit;
}

include_once('../db/crud.php');

$crud = new Crud();

//user email and name
$email = $_SESSION['email'];
$query= "SELECT * from user where email = '$email'";
$result_u = $crud->execute($query);
$res_u    = $result_u->fetch_assoc();

//post id
$query = "SELECT * FROM `posts` ORDER BY `posts`.`counter` DESC LIMIT 1;";
$result_p = $crud->execute($query);
$res_p    = $result_p->fetch_assoc();

// Post id
$id = "p". date('y').date('m')."_".($res_p['counter'] + 1);
// title
$title              =$_POST['title'];
// description
$description        =$_POST['description']; 
//phone
$phone              =$_POST['phone'];
// date
$date               =date('d-m-Y');
// User name
$user_name          =$res_u['name'];
// User email
$user_email         =$res_u['email'];
// Preferred Client
$preferred_client   =$_POST['preferred_client'];
// Month
$month              =$_POST['month'];
// offring
$offering           =$_POST['offering'];
// quintity
$quantity           =$_POST['quantity'];

// sublet
$sublet             =$_POST['sublet'];
// district
$district           =$_POST['district'];
// aria
$aria               =$_POST['aria'];
// full address
$address            =$_POST['address'];
// price
$price              =$_POST['price'];
// nagotiable
$nagotiable         =$_POST['nagotiable'];

$query = "INSERT into posts values(null,'$id','$title','$description','$phone','$date','$user_name','$user_email','$preferred_client','$month','$offering','$quantity','$sublet','$district','$aria','$address','$price','$nagotiable','No');";

$result = $crud->execute($query);
if($result)
{
    echo 'Insert Successfull';
}else
{
    echo ' didn\'make it.Error in executing the query ';
}
?>