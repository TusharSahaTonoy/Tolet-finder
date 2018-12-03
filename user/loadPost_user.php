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
$query = "SELECT id,title,description,price,approved,image1 from posts where user_email='$email';";

$result = $crud->execute($query);
if($result)
{
    while($res = $result->fetch_assoc())
    {
        echo '<div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="../Tolet search - Copy/image/'.$res['image1'].'" height="270px" width="650px" alt="Post image">
                </a>
            </div>
            <div class="col-md-5">
                <input type="hidden" name="post_id" value="'.$res['id'].'">
                <h4>'.$res['title'].'</h4>
                <p>'.$res['description'].'</p>
                <label>Price: '.$res['price'].'</label>
                <br>
                <a class="btn btn-success" href="#">View Project</a>
            </div>
            <div class="col-md-2">
                <p>Approved: <label class="col-4 btn btn-success">'.$res['approved'].'</label></P>
            </div>
        </div>
        <hr class="hr_green">';
    }

}
else
{
    echo "<br>Could not execute the query<br>";
}

// '.$res['image1'].'
?>