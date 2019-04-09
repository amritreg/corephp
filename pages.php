<html>
		<head>
				<title>Welcome to malala Yousfazia</title>
				<link rel="stylesheet" href="style.css">
		</head>

	<body>

	<div><?php include("includes/header.php"); ?></div>
	<div><?php include("includes/navbar.php"); ?></div>



	<div id="main_content">


<?php
//include the database
include("includes/connect.php");
//mysql query to select from method $_GET  id shuld be set while clicking the link

if(isset ($_GET['id'])){

$page_id=$_GET['id'];

$select_query="SELECT * From posts WHERE post_id='$page_id' ";



//runnign the query
$run_query=mysql_query($select_query);

	//retrieving the data from database


	while($row=mysql_fetch_array($run_query)){

		$post_id= $row['post_id'];
		$post_title= $row['post_title'];
		$post_date= $row['post_date'];
		$post_author= $row['post_author'];
		$post_image= $row['post_image'];
		$post_keywords= $row['post_keywords'];
		$post_content= ($row['post_content']);



?>

<h2>
<a href="pages.php?id=<?php echo $post_id;?>">
<?php echo $post_title; ?>
</a>

</h2>

<p align="left">Published on:&nbsp;&nbsp;<b><?php echo $post_date; ?></b></p>

<p align ="right">Posted By:&nbsp;&nbsp;<b><?php echo $post_author;?></b></p>

<center><img src="images/<?php echo $post_image;?>" width="300" height="200"></center>

<p align="justify"><?php echo $post_content ;?></p>

	<?php }}?>
</div>







	<div><?php include("includes/sidebar.php"); ?></div>




		<div id="footer"> Footer</div>


	</body>


</html>