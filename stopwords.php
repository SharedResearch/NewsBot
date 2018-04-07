<?php
require"scrapper.php";
scrap();
function removeStopwords(){
/////////////////////removing stopwords//////////////
////source1 below

$myfile = fopen("source1.txt", "r") or die("Unable to open file!");
	$myfiles = fopen("removeStopwords1.txt", "w") or die("Unable to open file!");
while(! feof($myfile))
{
	$string =  fgets($myfile);
	$stopwords = array("The","a","A","about","above","after","again","against","all","am","an","and","any","are","aren't","as","at","be","because","been","before","being","below","between","both","but","by","can't","cannot","could","couldn't","did","didn't","do","does","doesn't","doing","don't","down","during","each","e.g.","few","for","from","further","had","hadn't","has","hasn't","have","haven't","having","he","he'd","he'll","he's","her","here","here's","hers","herself","him","himself","his","how","how's","i","i'd","i'll","i'm","i've","if","in","into","is","isn't","it","it's","its","itself","let's","me","more","most","mustn't","my","myself","no","nor","not","of","off","on","once","only","or","other","ought","our","ours","ourselves","out","over","own","same","shan't","she","she'd","she'll","she's","should","shouldn't","so","some","such","than","that","that's","the","their","theirs","them","themselves","then","there","there's","these","they","they'd","they'll","they're","they've","this","those","through","to","too","under","until","up","very","was","wasn't","we","we'd","we'll","we're","we've","were","weren't","what","what's","when","when's","where","where's","which","while","who","who's","whom","why","why's","with","won't","would","wouldn't","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves");

	foreach ($stopwords as &$word) 
	{
		$word = '/\b' . preg_quote($word, '/') . '\b/';
	}
	$string2=preg_replace($stopwords, '', $string);
	fwrite($myfiles,$string2);
}
fclose($myfiles);

////////////////////////////////source2 below////////////////////////
$myfile = fopen("source2.txt", "r") or die("Unable to open file!");
	$myfiles = fopen("removeStopwords2.txt", "w") or die("Unable to open file!");
while(! feof($myfile))
{
	$string =  fgets($myfile);
	$stopwords = array("The","a","A","about","above","after","again","against","all","am","an","and","any","are","aren't","as","at","be","because","been","before","being","below","between","both","but","by","can't","cannot","could","couldn't","did","didn't","do","does","doesn't","doing","don't","down","during","each","e.g.","few","for","from","further","had","hadn't","has","hasn't","have","haven't","having","he","he'd","he'll","he's","her","here","here's","hers","herself","him","himself","his","how","how's","i","i'd","i'll","i'm","i've","if","in","into","is","isn't","it","it's","its","itself","let's","me","more","most","mustn't","my","myself","no","nor","not","of","off","on","once","only","or","other","ought","our","ours","ourselves","out","over","own","same","shan't","she","she'd","she'll","she's","should","shouldn't","so","some","such","than","that","that's","the","their","theirs","them","themselves","then","there","there's","these","they","they'd","they'll","they're","they've","this","those","through","to","too","under","until","up","very","was","wasn't","we","we'd","we'll","we're","we've","were","weren't","what","what's","when","when's","where","where's","which","while","who","who's","whom","why","why's","with","won't","would","wouldn't","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves");

	foreach ($stopwords as &$word) 
	{
		$word = '/\b' . preg_quote($word, '/') . '\b/';
	}
	$string2=preg_replace($stopwords, '', $string);
	fwrite($myfiles,$string2);
}
fclose($myfiles);
}
///////////////////////tokenisation/////////////////
function tokens(){
 $myfile1 = fopen("removeStopwords1.txt", "r") or die("Unable to open file!");
 $myfile2 = fopen("removeStopwords2.txt", "r") or die("Unable to open file!");
 // Output one line until end-of-file
$write1 = fopen("tokens1.txt", "w+") or die("Unable to open file!");
$write2 = fopen("tokens2.txt", "w+") or die("Unable to open file!");

while(!feof($myfile1))
{
	$news1 = fgets($myfile1);
	$tok1= strtok($news1," ");
	while ($tok1!==false)
	{
		if($tok1==PHP_EOL)
		{
			echo "OK";
		fwrite($write1,$tok1.PHP_EOL);	

	}
		else
		{
			fwrite($write1,$tok1.PHP_EOL);
		}
		
		
		$tok1=strtok(" ");		
	}
}
		
fclose($myfile1);

///////source2
while(!feof($myfile2))
{
	$news2 = fgets($myfile2);
	$tok2= strtok($news2," ");
	while ($tok2!==false)
	{
		if($tok2==PHP_EOL)
		{
		fwrite($write2,$tok2.PHP_EOL);	

	}
		else
		{
			fwrite($write2,$tok2.PHP_EOL);
		}
		
		
		$tok2=strtok(" ");		
	}
}
		
fclose($myfile2);
}
?>




