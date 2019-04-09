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
    <h2><a href="insert_post.php?insert=insert">Enter New Post</a></h2>
    <h2><a href="#">View Comment</a></h2>
</div>
<table width="1000" border="2" align="center" bgcolor="pink">
    <tr >
            <td colspan="10" align="center" bgcolor="yellow">
                    <h1>View All Posts</h1>
            </td>
    </tr>
    <tr bgcolor="orange">
            <th>Post No:</th>
            <th>Post Date</th>
            <th>Post Author</th>
            <th>Post Title</th>
            <th>Post Image</th>
            <th>Post Content</th>
            <th>Delete Post</th>
            <th>Edit Post</th>
    </tr>

<?php
    include ("includes/connect.php");
    $query="SELECT * FROM posts ORDER BY 1 DESC";
    $run=mysql_query($query);
    while ($row=mysql_fetch_array($run)) {
        $post_id=$row['post_id'];
        $post_date=$row['post_date'];
        $post_author=$row['post_author'];
        $post_title=$row['post_title'];
        $post_content=substr($row['post_content'], 0,100);
        $post_image=$row['post_image'];


?>
    <tr align="center">
        <td><?php echo $post_id;?></td>
        <td><?php echo $post_date;?></td>
        <td><?php echo $post_author;?></td>
        <td><?php echo $post_title;?></td>
        <td><img src="../images/<?php echo $post_image;?>"width="80" height="80"</td>
        <td><?php echo $post_content;?></td>
        <td><a href="delete.php?del=<?php echo $post_id ?>;">Delete</a></td>
        <td><a href="edit_posts.php?edit=<?php echo $post_id; ?>">Edit</a></td>
</tr>
<?php };?>
</table>




</body>

</html>