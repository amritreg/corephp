<?php
    //login page ma pani we have to start a sessionm
    session_start();
    session_destroy();
    header("location:../index.php");
?>