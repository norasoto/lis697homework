<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIS 697: Code Homework 1</title>
</head>
<body>
<h1>Challenge: Correct Change</h1>
<?php
# number representing change due to user in cents
$changedue = 159;

# array of all cents possible
$change = array(100, 25, 10, 5, 1);


/* Notes:
	* to figure out how $changedue goes into 100/25/10/5/1 [X] times => (int)($changedue / $change[0/1/2/3/4])
	* (int)to the right rounds down remainder to an integer
	* then we have to subtract 100/25/10/5/1 from $changedue [X] times
	* need to decrease $changedue after each cent tier -> create new $changedue for each tier*/

# dollar = 100 cents; $change[0]
$dollars = (int)($changedue / $change[0]); // how many dollars go into $changedue
$dollarsdue = $changedue % $change[0]; // $change - 100; to figure out remaining quarters in next step

# quarter = 25 cents; $change[1]
$quarters = (int)($dollarsdue / $change[1]); // how many quarters go into ($changedue - $dollars)
$quartersdue = $changedue % $change[1]; // $change - 25; to figure out remaining dimes

# dime = 10 cents; $change[2]
$dimes = (int)($quartersdue / $change[2]); // how many dimes go into ($changedue - $dollars - $quarters)
$dimesdue = $changedue % $change[2]; // $change - 10; to figure out remaining nickels

# nickel = 5 cents; $change[3]
$nickels = (int)($dimesdue / $change[3]); // how many nickels go into ($changedue - $dollars - $quarters - $dimes)
$nickelsdue = $changedue % $change[3]; // $change - 5; to figure out remaining pennies
/* Error:
	Something's wrong with my nickels variables for different amounts of $changedue (30, 130, 230, 330...), but I can't figure out how to fix it.
	Seems that using $dimesdue in $nickels is messing up the code when there are $quarters with left over for dimes/nickels.
	31 is okay (1 quarter, 1 cent) but 35 is wrong (1 quarter, 1 dime, 1 nickel).
	I don't know what would be a better alternative though.*/

# pennies = cents ; $change[4]
$pennies = (int)($nickelsdue / $change[4]); // how many pennies go into ($changedue - $dollars - $quarters - $dimes - $nickels)

# 1: You are due ? cents back in change total.
# If change due is more than 0 cents
if ($changedue > 0)
{
	echo "<p>You are due $changedue cents back in change total.</p>";
}

# 2: You are due back ? dollar(s), ? quarter(s), ? dime(s), ? nickel(s), and ? cent(s).
if ($changedue > 0)
{
	echo "<p>You are due back " . $dollars . " dollar(s), " . $quarters . " quarter(s), " . $dimes . " dime(s), " . $nickels . " nickel(s), and " . $pennies . " cent(s).</p>";
}
	elseif ($changedue == 0)
	{
		echo "<p>You are due back no change.</p>";
	}

?>
<h1>Challenge: 99 Bottles of Beer</h1>
<?php

# for (bottle total; minimum bottles; decrease bottles each loop)
for ($count = 99; $count >= 1; --$count)
	{
		if ($count != 1) // not equal to 1
			{
        $bottles = "bottles";
    	} 
    else 
    	{
        $bottles = "bottle";
      }
		echo "<p>$count $bottles of beer on the wall, $count $bottles of beer!</p>";
		echo "<p>Take one down and pass it around, ". ($count - 1) ." $bottles of beer on the wall!</p>";
	}
			/* longer way for 1/bottle
				if ($count = 1)
				{
					echo "<p>$count bottle of beer on the wall, $count bottle of beer!</p>";
					echo "<p>Take one down and pass it around, ". ($count - 1) ." bottles of beer on the wall!</p>";
				}*/
				
# any number of beers
$inputnumber = 4;

echo "<h2>Now, for <u>$inputnumber</u> bottles!</h2>";
for ($count = $inputnumber; $count >= 1; --$count)
	{
		if ($count != 1) 
			{
        $bottles = "bottles";
    	} 
    		else 
    			{
        		$bottles = "bottle";
        	}
		echo "<p>$count $bottles of beer on the wall, $count $bottles of beer!</p>";
		echo "<p>Take one down and pass it around, ". ($count - 1) ." $bottles of beer on the wall!</p>";
	}
?>
</body>
</html>