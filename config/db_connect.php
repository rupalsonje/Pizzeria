<?php 
 //connect to database
 $conn = mysqli_connect('localhost','rupal','1234567890','pizza_proj');

// check connection
    if(!$conn){
        echo 'econnection error: '. mysqli_connect_error();
    }
?>