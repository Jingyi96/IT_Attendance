<?php 

require_once 'db/conn.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);
    if ($result){
        header('Location:viewrecords.php');
    }else{
        // echo 'error';
        include 'includes/erroralert.php';
    }
}else{
    // echo 'error';
    include 'includes/erroralert.php';
    header("Location:viewrecords.php");
}

?>