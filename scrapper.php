<?php
function scrap()
{
	$myfile = fopen("source1.txt", "w") or die("Unable to open file!");
	$html_string = file_get_contents('https://www.dawn.com/news/1337373');
	//echo $html_string;
	$dom = new DOMDocument();
	libxml_use_internal_errors(true);
	$dom->loadHTML($html_string);	
	libxml_clear_errors();
	$xpath = new DOMXpath($dom);
	$values = array();
	$row=$xpath->query('//div[contains(@class,"story__content      pt-4  ")]');
	foreach($row as $value) {
	//   $values[] = trim($value->textContent);
	fwrite($myfile,trim($value->textContent));
	//echo trim($value->textContent);
	}
	fclose($myfile);
	////////////source2////////////
	$myfile1 = fopen("source2.txt", "w") or die("Unable to open file!");
	//echo "<br/>"."<br/>"."Source2"."<br/>"."<br/>";
	$html_string = file_get_contents('http://dailytimes.com.pk/khyber-pakhtunkhwa/05-Jun-17/mashals-lynching-premeditated-no-proof-of-blasphemy-found-jit');
	//echo $html_string;
	$dom = new DOMDocument();
	libxml_use_internal_errors(true);
	$dom->loadHTML($html_string);
	libxml_clear_errors();
	$xpath = new DOMXpath($dom);
	$values = array();
	$row=$xpath->query('//div[contains(@class,"entry-content")]');
	foreach($row as $value) {
	//   $values[] = trim($value->textContent);
		fwrite($myfile1,trim($value->textContent));
	//echo trim($value->textContent);
	}
	fclose($myfile1);
}
?>