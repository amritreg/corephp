<?php
include ("includes/connect.php");

if (isset($_GET['del'])){

    $delete_id=$_GET['del'];
    $delete_query="DELETE FROM posts WHERE post_id='$delete_id' ";

    if(mysql_query($delete_query)){

        echo "<script>alert ('POST HAS BEEN DELETED')</script>";
//redirecting the person to same page view_posts.php in that window
        echo "<script>window.open('view_posts.php','_self')</script>";
    }


}






?>