<?php

include_once('../db/crud.php');
$crud = new Crud();

$query = "SELECT id,title,description,price,image1 from posts where approved='Yes';";

$result = $crud->execute($query);
if($result)
{
    while($res = $result->fetch_assoc())
    {
        echo '<div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="../Tolet search - Copy/image/'.$res['image1'].'" height="300px" width="700px" alt="POST IMAGE">
                </a>
            </div>
            <div class="col-md-7">
                <input type="hidden" name="post_id" value="'.$res['id'].'">
                <h4>'.$res['title'].'</h4>
                <p>'.$res['description'].'</p>
                <label>Price: '.$res['price'].'</label>
                <br>
                <a class="btn btn-success" href="#">View Project</a>
            </div>

        </div>
        <hr class="hr_white">';
    }

}
else
{
    echo "<br>Could not execute the query<br>";
}
?>