<?php
    session_start();
    if ( ! isset($_SESSION['user_name'])) {
        header("location:login.php");
    }else{



?>


<html>
     <head>
                <title>Admin Pannel </title>
                <link rel="stylesheet" type="text/css" href="admin_style.css">
      </head>

<body>
<div id="header">
<a href="index.php"><h1>Welcome To The Admin Pannel</h1></a></div>
<div id="sidebar">
    <h2><a href="logout.php">Logout</a></h2>
    <h2><a href="view_posts.php">View Post</a></h2>
    <h2><a href="insert_post.php?insert=insert">Enter New Post</a></h2>
    <h2><a href="#">View Comment</a></h2>
</div>

<div id="welcome">
    <h1>Welcome to your Admin Pannel</h1>
    <p>This is your admin pannel, where you can manage your website files content</p>

</div>

    <?php
            if (isset($_GET['insert'])) {
                include("insert_post.php");
            }
    ?>


</body>

</html>
<?php }?>