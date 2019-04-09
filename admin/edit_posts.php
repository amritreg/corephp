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
    <h2><a href="#">Enter New Post</a></h2>
    <h2><a href="#">View Comment</a></h2>
</div>


<?php
    include("includes/connect.php");
    //first check if edit button is clicked or not
if (isset($_GET['edit'])) {
      //if its clicked sabai kura tanney database bata
            $edit_id=$_GET['edit'];
            $edit_query="SELECT * FROM posts WHERE post_id='$edit_id' ";
            $run_edit=mysql_query($edit_query);

//sabai row haru tanney aba
            while ($edit_row=mysql_fetch_array($run_edit)) {
                $post_id=$edit_row['post_id'];
                $post_title=$edit_row['post_title'];
                $post_author=$edit_row['post_author'];
                $post_keywords=$edit_row['post_keywords'];
                $post_image=$edit_row['post_image'];
                $post_content  =$edit_row['post_content'];




?>


                <form method="post" action="edit_posts.php?edit_form=<?php post_id;?>" enctype="multipart/form-data">

                    <table width="600" align="center" border="10" bgcolor="orange">

                        <tr>
                                <td align="center" bgcolor="yellow" colspan="6"><h1>Edit  Post Here</h1></td>
                        </tr>

                        <tr>
                                <td align="right" >Post Title:</td>
                                <td><input type="text" name="title" size="30" value="<?php echo $post_title;?>"</td>

                        </tr>

                        <tr>
                                <td align="right">Post Author:</td>
                                <td><input type="text" name="author" size="30" value="<?php echo $post_author;?>"></td>
                        </tr>

                        <tr>
                                <td align="right">Post Keywords:</td>
                                <td><input type="text" name="keywords" size="30" value="<?php echo $post_keywords;?>"></td>
                        </tr>

                        <tr>
                                <td align="right">Post Image:</td>
                                <td>
                                <input type="file" name="image">
                                <img src="../images/<?php echo $post_image?>" height="100" width="100">
                                </td>
                        </tr>

                        <tr>
                                <td align="right">Post Content:</td>
                                <td><textarea  name="content" cols="30" rows="15"><?php echo $post_content;?></textarea></td>
                        </tr>

                        <tr>
                        <td align="center" colspan="6"><input type="submit" name="update" value="Update Now"></td>
                        </tr>
                    </table>


                </form>
<?php }}?>

        </body>
</html>


 <?php
                    if (isset($_POST['update'])) {
                        $update_id=$_GET['edit_form'];
                        $post_title1=$_POST['title'];
                        $posts_date=date('m-d-y');
                        $post_author1=$_POST['author'];
                        $post_keywords1=$_POST['keywords'];
                        $post_content1=$_POST['content'];
                        $post_image1=$_FILES['image']['name'];
                        $image_temp=$_FILES['image']['tmp_name'];


                            if ($post_title1=='' or $post_author1=='' or  $post_keywords1=='' or $post_content1==''  or $post_image1==''){
                                echo "<script> alert ('Any of the field is empty')</script>";
                                exit();
                            }else{
                                move_uploaded_file($image_temp, "../images/$post_image1");

                                $update_query="UPDATE posts SET posts_title='$post_title1',posts_date='$post_date1', posts_author='$post_author1',
                                posts_keywords='$post_keywords1', posts_image='$post_image1',posts_content='$post_content1' WHERE post_id='$update_id' ";

                                                if (mysql_query($update_query)){
                                                     echo "<script>alert ('Post has been updated')</script>";
                                                    echo "<script>window.open('view_posts.php',_self)</script>";
                                                }

                            }
                        }

?>
