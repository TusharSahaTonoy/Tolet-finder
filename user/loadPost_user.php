<?php
session_start();

include_once('../db/crud.php');
$crud = new Crud();

if(!isset($_SESSION['email']))
{
    echo 'Please Login';
    exit;
}

$email =$_SESSION['email'];
$query = "SELECT id,title,description,approved from posts where user_email='$email';";

$result = $crud->execute($query);
if($result)
{
    while($res = $result->fetch_assoc())
    {
        echo '<div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <input type="hidden" name="post_id" value="'.$res['id'].'">
                <h4>'.$res['title'].'</h4>
                <p>'.$res['description'].'</p>
                <a class="btn btn-success" href="#">View Project</a>
            </div>
            <div class="col-md-2">
                <p>Approved: <label class="col-4 btn btn-success">'.$res['approved'].'</label></P>
            </div>
        </div>
        <hr class="hr_purple">';
    }

}
else
{
    echo "<br>Could not execute the query<br>";
}

?>