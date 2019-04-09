<html>
        <head>
                <title>Welcome to malala Yousfazia</title>
                <link rel="stylesheet" href="style.css">
        </head>

    <body>

    <div><?php include("includes/header.php"); ?></div>
    <div><?php include("includes/navbar.php"); ?></div>

<!-- This is where we show the search content while removing the maincontent .php -->


         <div id="main_content">
<h1 align="center"> Your Search Result are </h1>
            <?php
                //include the database
                include("includes/connect.php");
                    $post_title = "";
                    $post_content = "";
                    $post_image="";
                    if(isset($_GET['search'])){

                        $search_id=$_GET['value'];
                        $search_query="SELECT * FROM posts WHERE post_keywords LIKE  '%$search_id%'    ";

                        $run_query=mysql_query($search_query);

                        while ( $search_row=mysql_fetch_array($run_query) ){
                               $post_id=$search_row['post_id'];
                                $post_title= $search_row ['post_title'];
                                $post_image=$search_row['post_image'];
                                $post_content=$search_row['post_content'];
                               // echo $post_image;

            ?>
<center>
<a href="pages.php?id=<?php echo $post_id;?>">

<h2> <?php echo $post_title;  ?> </h2>
</a>
<a href="pages.php?id=<?php echo $post_id;?>">

<img src="images/<?php echo $post_image;?>" >
</a>
<p><?php echo $post_content; ?></p>
</center>

 <?php }} ?>
</div>

  <!-- This is where we show the search content while removing the maincontent .php -->



 <div><?php include("includes/sidebar.php"); ?></div>




        <div id="footer"> Footer</div>


    </body>


</html>