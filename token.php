<?php
function token(){
	$myfile = fopen("source1.txt", "r") or die("Unable to open file!");
	$myfiles = fopen("source2.txt", "r") or die("Unable to open file!");
///////////////////////tokens////////	
$write1 = fopen("Stokens1.txt", "w+") or die("Unable to open file!");
$write2 = fopen("Stokens2.txt", "w+") or die("Unable to open file!");

while(!feof($myfile))
{
	$news = fgets($myfile);
	$token = strtok($news, ".");
 
while ($token !== false)
   {
  // echo "$token<br>";
   fwrite($write1,$token.".".PHP_EOL);
   $token = strtok(".");
   }
}
		
fclose($myfile);
echo "<br><br>Source2<br><br>";
while(!feof($myfiles))
{
	$news2 = fgets($myfiles);
		$token1 = strtok($news2, ".");
 
while ($token1 !== false)
   {
   //echo "$token1<br>";
   fwrite($write2,$token1.PHP_EOL);
   $token1 = strtok(".");
   }
}
		
fclose($myfiles);
}
?>