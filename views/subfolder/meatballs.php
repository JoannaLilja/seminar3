<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>The Tasty Recipes Website</title>
  <link rel="stylesheet" type="text/css" href="../../resources/css/stylesheet.css"/>
</head>
<body>
		<br>
	  <H1>The Delicious Recipes Website</H1>
	  <br>
	  <div class="topnav">
	    <a href="FirstPage">Index</a>
	    <a href="CalendarPage">Calendar</a>
	    <a href="MeatballPage" style = "color: red">Meatballs Recipe</a>
	    <a href="PancakePage">Pancakes Recipe</a>
	    <a href="LoginPage">Log In</a>
	  </div>
	  <br>

	Meatball Recipe

	<h1>Comments</h1>


	<?php

	while ($row = $allComments->fetch_assoc())
	{

		//$result->fetch_assoc();
		/*echo '
		<div class="comment-container">
		<div class="comment-username">'.$row['username'].'</div>
		<div class="comment-text">'.$row['comment'].'</div>
		</div>
		';*/

		echo ('
		<form action="DeleteComment">
		<div class="comment-container">
		<div class="comment-username">'.$row['username']. '
		<input class="in" style="display:none;" type="text" name="type" value="meatballs" required>
		<input class="in" style="display:none;" type="text" name="id" value='.$row['comment_id'].' required>
		'.( $row["username"] = $_SESSION["user"]["username"] ? "<button type=submit>Delete</button> ": "" ).'
		</div>
		<div class="comment-text">'.$row['comment'] . ' </div>
		</div>
		</form>
		');
	}

	if(isset($_SESSION["user"]))
	{
		echo '<form action="AddComment">
		<div class="imgcontainer">
		</div>
		<br>
		<div class="container">
		<label><b>Write a comment</b></label>
		<input class="in" type="text" name="comment" maxlength= "200" required>
		<input class="in" style="display:none;" type="text" name="type" value="meatballs" required>
		<input class="in" style="display:none;" type="text" name="username" value='.$_SESSION["user"]["username"].' required>
		</div>
		<br>
		<div class="container">
		<button type="submit">Submit</button>
		</div>
		</form>';

	}

	?>

</body>
</html>
