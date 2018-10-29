<?php
session_start();

if(isset($_SESSION['email']))
    echo 'ok';
else
    echo 'not ok';
?>