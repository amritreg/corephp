<div id="sidebar">

        <!-- we will add custom search engine in side bar over here -->


    <div id="searchbox">
                <form action="search.php" method="GET" enctype="multipart/form-data">
                    <input type ="text" name="value" placeholder="Search this site" size="25">
                    <input type="submit" name="search" value="search">
                </form>


    </div>






        <div id="social">
            <h2>Follows us </h2>
            <a href="http://facebook.com/amrit.regmi76" target="blank"><img src="images/facebook.jpg"></a>
            <a href="#"><img src="images/google.jpg"></a>
            <a href="#"><img src="images/twitter.jpg"></a>
            <a href="#"><img src="images/youtube.jpg"></a>
        </div>

<!-- inside this div tag we start writing php code-->
                      <h3 align="center">Recent Posts</h3>
                    <div>
                            <?php
                                    include("includes/connect.php");
                                    //now create the query variable to select recent post
                                    $query="select * FROM   posts ORDER BY 1 DESC LIMIT 0,5";
                                    //now run the query
                                    $run=mysql_query($query);
                                    //now fetch the array turn by turn
                                    while (  $row = mysql_fetch_array($run)) {
                                             $title=$row['post_title'];
                                            $post_id=$row['post_id'];
                                            $image=$row['post_image'];

                            ?>

                                    <center>

                                    <a href="pages.php?id=<?php echo $post_id;  ?>">
                                            <h2 ><?php echo $title;?></h2>
                                            </a>
                                            <a href="pages.php?id=<?php echo $post_id;  ?>">
                                           <img src="images/<?php echo $image;?>"  width="200"  height="100" align="center">
                                            </a>
                                    </center>

                                           <?php }  ?>
                        </div>

    </div>