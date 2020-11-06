<?php
  $db = new PDO('sqlite:news.db');

  $stmt = $db->prepare
  ('SELECT news.*, users.*, COUNT(comments.id) AS comments
	FROM news JOIN
    users USING (username) LEFT JOIN
    comments ON comments.news_id = news.id
	GROUP BY news.id, users.username
	ORDER BY published DESC
  ');
  $stmt->execute();
  $articles = $stmt->fetchAll();

  echo '<!DOCTYPE html>
		<html lang="en-US">

		<head>
			<title>
				News
			</title>
			<meta charset="utf-8">	
		</head>
		<body>';


  foreach($articles as $article) {
  	echo '<article>
  			<h1><a href="#">' . $article['title'] . '</a></h1>';
  	echo 	'<p>' . $article['introduction'] . '</p>';
  	echo 	'<p>' . $article['fulltext'] . '</p>
  		  </article>';

  	echo '<footer>
          	<span class="author">' . $article['username'] . '</span>';
    echo   	'<span class="tags"><a href="index.html">#' . $article['tags'] . '</a></span>';
    echo   	'<span class="date">' . $article['published'] . '</span>';
    echo   	'<a class="comments" href=" ./news_item.php?id=' . $article['id'] . '">#comments</a>
    	  </footer>';

  }

  echo '</body>
  </html>';
?>