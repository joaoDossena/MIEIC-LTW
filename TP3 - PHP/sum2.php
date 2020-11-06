<?php 

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

echo '<!DOCTYPE html>
		<html lang="en-US">

		<head>
			<title>
				Sum2
			</title>
			<meta charset="utf-8">	
		</head>
		<body>';


echo "<h1>" . ($num1 + $num2) . "</h1>";

echo "<a href='./form2.html'>Back to form</a>";
echo '</body>
  </html>';
?>