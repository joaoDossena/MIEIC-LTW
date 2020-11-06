<?php
	
	$db = new PDO('sqlite:news.db');


	//Get news
	$stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
  	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  	$stmt->execute();
  	$article = $stmt->fetch();

  	//Get comments
  	$stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
  	$stmt->execute(array($_GET['id']));
  	$comments = $stmt->fetchAll();

  	echo '<!DOCTYPE html>
		<html lang="en-US">

		<head>
			<title>
				Comments
			</title>
			<meta charset="utf-8">	
		</head>
		<body>';


  	echo '<section id="comments"> <h3>Comments</h3>';

  	foreach ($comments as $comment) {
  		
        echo  '<article class="comment"><h6>Comment</h6>';
        echo   		'<span class="user">' . $comment['username'] . '</span>';
        echo    	'<span class="date">' . $comment['published'] . '</span>';
        echo   		'<p>' . $comment['text'] . '</p>
          	   </article>';
  	}

  	echo '</section>';
  	echo "<a href='./list_news.php'>Go back</a>";

  	echo '</body>
  	</html>';

?>