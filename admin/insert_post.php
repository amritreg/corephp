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
    <h2><a href="View_posts.php">View Post</a></h2>
    <h2><a href="insert_post.php">Enter New Post</a></h2>
    <h2><a href="#">View Comment</a></h2>
</div>
<form method="post" action="insert_post.php" enctype="multipart/form-data">
				
					<table width="600" align="center" border="10">
					
						<tr>
								<td align="center" bgcolor="yellow" colspan="6"><h1>Insert New Post Here</h1></td>
						</tr>
						
						<tr>
								<td align="right" >Post Title:</td>
								<td><input type="text" name="title" size="30"></td>
								
						</tr>
						
						<tr>
								<td align="right">Post Author:</td>
								<td><input type="text" name="author" size="30"></td>
						</tr>
						
						<tr>
								<td align="right">Post Keywords:</td>
								<td><input type="text" name="keywords" size="30"></td>
						</tr>
						
						<tr>
								<td align="right">Post Image:</td>
								<td><input type="file" name="image"></td>
						</tr>
						
						<tr>
								<td align="right">Post Content:</td>
								<td><textarea  name="content" cols="30" rows="15"></textarea></td>
						</tr>
						
						<tr>
						<td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
						</tr>
					</table>
						
		
				</form>
		
		</body>
</html>


<?php

include ("includes/connect.php");
//checking if value is set
if(  isset($_POST['submit']) ){
//then it executes all below code
	 $post_title=$_POST['title'];  //taking form data entered from user table
	 $post_date=date("D M d, Y G:i a");
	 $post_author=$_POST['author'];
	$post_keywords=$_POST['keywords'];
	$post_content=$_POST['content'];
	$post_image= $_FILES ["image"] ["name"];// multipart/form-data image can have name , type, size, we take only image name	
	$image_tmp=$_FILES['image']['tmp_name'];

	//check if the field are empty 
	
	if($post_title=='' or $post_keywords=='' or $post_content=='' or $post_author=='' or $post_image==''){
		//if its empty
		echo "<script>alert ('Please Fill in all Fields')</script>";
		exit();
	}else{
		//we move image to image folder with its temp name converted to real name  
		move_uploaded_file($image_tmp,"../images/$post_image");
		
		//run a query to insert into database
		$insert_query="INSERT INTO 
		posts (post_title, post_date, post_author, post_image , post_keywords , post_content )
		VALUES('$post_title', '$post_date' , '$post_author', '$post_image' ,'$post_keywords', '$post_content')
		";
		//if query runs succesfully then dislpay 
		if(mysql_query($insert_query)){
			echo "<script>alert('Post has been succesfully POsted')</script>";
			echo "<script>window.open('view_posts.php','_self')</script>";
		}
	
	
	}

}else{
	//echo'Cannot connect to database';
}





?>

