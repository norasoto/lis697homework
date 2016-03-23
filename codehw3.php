<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIS 697: Code Homework 3</title>
<style>

table, th, td {
  border-collapse: collapse;
  width: 75%
}
th, td {
  text-align: left;
  padding: 8px 16px;
}
th {
  background-color: #0fc0fc;
  color: white;
}
tr:hover {
	background-color: #e4f8fe;
}
td {
    border-bottom: 1px solid #e4f8fe;
}
td:first-child {
	font-style: italic;
}
</style>
</head>
<body>
<h1>Challenge: Book Lists</h1>
<?php
# multi-dimensional array => associative array
$books = array(
	array('title'=>"PHP and MySQL Web Development", 'author'=>"Luke Welling", 'pages'=>144, 'type'=>"Paperback", 'price'=>"31.63"),
	array('title'=>"Web Design with HTML, CSS, JavaScript and jQuery", 'author'=>"Jon Duckett", 'pages'=>135, 'type'=>"Paperback", 'price'=>"41.23"),
	array('title'=>"PHP Cookbook: Solutions & Examples for PHP Programmers", 'author'=>"David Sklar", 'pages'=>14, 'type'=>"Paperback", 'price'=>"40.88"),
	array('title'=>"JavaScript and JQuery: Interactive Front-End Web Development", 'author'=>"Jon Duckett", 'pages'=>251, 'type'=>"Paperback", 'price'=>"22.09"),
	array('title'=>"Modern PHP: New Features and Good Practices", 'author'=>"Josh Lockhart", 'pages'=>7, 'type'=>"Paperback", 'price'=>"28.49"),
	array('title'=>"Programming PHP", 'author'=>"Kevin Tatroe", 'pages'=>26, 'type'=>"Paperback", 'price'=>"28.96")
);


# Book Data: Title / Author / Number of pages / Type / Price
echo '<table>';
echo '<tr><th>Title</th><th>Author</th><th>Pages</th><th>Type</th><th>Price</th></tr>';
foreach($books as $row) # each array
{
    echo '<tr>'; // make row for each array
    foreach($row as $data) // data within each array
    {
        echo '<td>'.$data.'</td>';
    }
    echo '</tr>';
}
echo '</table>';


# Total Price for all books
# Originally I had 'price' as '$#.##' with the dollar sign, but this prevented me from adding them together as integers.
# So I got rid of the dollar signs for my convience.

/* array_sum doesn't seem to work with multidimensional arrays, plus that would add the page count, i.e. the only integers.
$totaldue = array_sum($books) is a no go*/

/*I could add the 'price' of each array
$totaldue = $books[0]['price']+$books[1]['price']+$books[2]['price']+$books[3]['price']+$books[4]['price']+$books[5]['price'];
This way could be simplied though.*/

$totaldue = 0; // starting point for total
foreach ($books as $row)
{
   $totaldue += $row['price'];
}

echo "<p>Your total price due is $totaldue.</p>";
?>

<h1>Challenge: Coin Toss</h1>
<?php

# Heads / Tails images:
$heads = '<img src="/img/heads.png">';
$tails = '<img src="/img/tails.png">';

# Basic Code
/*$flip = mt_rand(0,1);
echo "<p>Flipping a coin 1 time...</p>";
if ($flip == 0) {
	echo $heads;
	echo "<p>You got heads!</p>";
	} else {
			echo $tails;
			echo "<p>You got tails!</p>";
		}*/

# Flipping with functions
function flipcount($count) // function for the number of flips
{
	echo "<p>Flipping a coin $count times...</p>";
	$heads = '<img src="/img/heads.png">';
	$tails = '<img src="/img/tails.png">';
	for ($count; $count >= 1; --$count)
	{ 
		if (mt_rand(0,1) == 0) {
			print $heads; } 
		else {
			print $tails; }
	} 
}

flipcount(1);
flipcount(3);
flipcount(5);
flipcount(7);
flipcount(9);

/* Individual way:
for ($count = 1; $count <= 3; ++$count)
	{ 
		if (mt_rand(0,1) == 0) {
			echo $heads; } 
		else {
			echo $tails; }
		mt_rand(0,1);
	} */
	
	
/* Trying to figure out Part B...
echo "<h2>Coin Toss, Part B</h2>";
function flipheads()
{
	echo "<p>Beginning the coin toss...</p>";
	$heads = '<img src="/img/heads.png">';
	$tails = '<img src="/img/tails.png">';
	$twoheads = $heads.$heads; ???
	for ($count2 = 1; $count2 <= 50; ++$count2)
	{ 
		if (???) break;
		elseif (mt_rand(0,1) == 0) {
			print $heads; } 
		else {
			print $tails; }
	} 
	echo "<p>Flipped two heads in a row in $count2 flips!</p>";
}

flipheads();*/


echo "<h2>Coin Toss, Part C</h2>";
function flipheads($headcount)
{
	echo "<p>Beginning the coin toss. Looking for $headcount heads in a row...</p>";
	// echo str_repeat(mt_rand(0,0), $headcount); - trying to get randomized 0 to repeat however many times you specify $headcount
	$heads = '<img src="/img/heads.png">';
	$tails = '<img src="/img/tails.png">';
	for ($count = 0; $count <= 100; ++$count)
	{ 
		if (mt_rand(0,1) == 0) break; // I can't figure out what to put in the conditional expression for $headcount number of 0's in a row
		elseif (mt_rand(0,1) == 0) {
			print $heads; } 
		else {
			print $tails; }
	} 
	echo "<p>Flipped $headcount heads in a row in $count flips!</p>";
}

flipheads(3);

# Unfortunately, I couldn't complete this problem. I couldn't figure out how to have the 0 part of mt_rand repeat.

?>
</body>
</html>