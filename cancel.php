<?php

session_start();
include('config.php');

if(isset($_POST['submit'])){
    // $book_id = $_SESSION['book_id'];
    $date = $_SESSION['date'];
    // echo $book_id;
    // echo $cus_id;
    
    $str = "delete from patient where date = '$date' ";
    $result  = mysqli_query($conn,$str);

    header("location:history.php");
}



?>