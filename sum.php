<?php
$myfile = fopen("Stokens1.txt", "r") or die("Unable to open file!");
	$myfiles = fopen("Stokens2.txt", "r") or die("Unable to open file!");
	//$myfile2 = fopen("percentages.txt", "w") or die("Unable to open file!");
	$myfile3= fopen("doc.txt", "w+") or die("Unable to open file!");
	$matrix=array();
	$matrix=[[]];
	
	$i=0;
	$j=0;
	///////////////////////SIMILARITY OF SENTENCES////////////////////////
	while(! feof($myfile))
	{
		$text1 = fgets($myfile);
	
		$myfiles = fopen("Stokens2.txt", "r") or die("Unable to open file!");
		$j=0;
		while(!feof($myfiles))
		{
			$text2=fgets($myfiles);
			//$similarity= compareStrings($text1,$text2);
			similar_text($text1, $text2, $similarity); 
			$matrix[$i][$j]=array('string1'=>$text1 ,'string2'=>$text2,'percentage'=>round($similarity,2),'flag'=>0);
		//	echo ' '.$j.') '.$matrix[$i][$j]['string1'].$matrix[$i][$j]['string2'].$matrix[$i][$j]['percentage'].' % '.'   ,  '.'<br/>';
			$j++;	
		}
		$i++;	
		fclose($myfiles);
	}
	/////////////////////////////MAXIMUM PERCENTAGES//////////////////////////////////////////
	$index[]=array();
$count=1;

	for($i=0;$i<sizeof($matrix)-1;$i++)
		{	
			$max=0;
			for($j=0;$j<sizeof($matrix)-1;)
			{
				/*while($j<=$i)
				{
					$j++;
				}*/
				if($matrix[$i][$j]['percentage']>$max)
				{
					if($count%2!=0)
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string1'];
						//fwrite($myfile3,$matrix[$i][$j]['string1']);
						$j++;
						$count++;
					}
					else
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string2'];
						//fwrite($myfile3,$matrix[$i][$j]['string2']);
						$j++;
						$count++;
					}
				}
				else
				{
					$j++;
				}
			}
		}
		for($i=0;$i<sizeof($index);$i++)
		{
		//	echo $index[$i].".";
				fwrite($myfile3,$index[$i]);
		}
		fclose($myfile);
		//fclose($myfiles);
		fclose($myfile3);
	$myfile4=fopen("Stokens3.txt", "r") or die("Unable to open file!");
	$myfile3=fopen("doc.txt", "r")or die("Unable to open file!");
	////////////////////////////////
		//$matrix=array();
//	$matrix=[[]];
	
	$i=0;
	$j=0;
	///////////////////////SIMILARITY OF SENTENCES////////////////////////
	while(! feof($myfile4))
	{
		$text1 = fgets($myfile4);
		
		$myfile3=fopen("doc.txt", "r")or die("Unable to open file!");
		$j=0;
		while(!feof($myfile3))
		{
			$text2=fgets($myfile3);
			//$similarity= compareStrings($text1,$text2);
			similar_text($text1, $text2, $similarity); 
			$matrix[$i][$j]=array('string1'=>$text1 ,'string2'=>$text2,'percentage'=>round($similarity,2),'flag'=>0);
		//	echo ' '.$j.') '.$matrix[$i][$j]['string1'].$matrix[$i][$j]['string2'].$matrix[$i][$j]['percentage'].' % '.'   ,  '.'<br/>';
			$j++;	
		}
		$i++;	
		//fclose($myfile3);
	}
	/////////////////////////////MAXIMUM PERCENTAGES//////////////////////////////////////////
	//$index[]=array();
$count=1;

	for($i=0;$i<sizeof($matrix)-1;$i++)
		{	
			$max=0;
			for($j=0;$j<sizeof($matrix)-1;)
			{
				/*while($j<=$i)
				{
					$j++;
				}*/
				if($matrix[$i][$j]['percentage']>$max)
				{
					if($count%2!=0)
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string1'];
						//fwrite($myfile3,$matrix[$i][$j]['string1']);
						$j++;
						$count++;
					}
					else
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string2'];
						//fwrite($myfile3,$matrix[$i][$j]['string2']);
						$j++;
						$count++;
					}
				}
				else
				{
					$j++;
				}
			}
		}
		for($i=0;$i<sizeof($index);$i++)
		{
		//	echo $index[$i].".";
				fwrite($myfile3,$index[$i]);
		}
//		fclose($myfile3);
		fclose($myfile4);
///////////////////////////////////////////////////////////////////		
	$myfile5 = fopen("Stokens4.txt", "r") or die("Unable to open file!");
	$myfile6 = fopen("doc.txt", "r") or die("Unable to open file!");
		
		
	$i=0;
	$j=0;
	///////////////////////SIMILARITY OF SENTENCES////////////////////////
	while(! feof($myfile5))
	{
		$text1 = fgets($myfile5);
		
		$myfile6=fopen("doc.txt", "r")or die("Unable to open file!");
		$j=0;
		while(!feof($myfile6))
		{
			$text2=fgets($myfile6);
			//$similarity= compareStrings($text1,$text2);
			similar_text($text1, $text2, $similarity); 
			$matrix[$i][$j]=array('string1'=>$text1 ,'string2'=>$text2,'percentage'=>round($similarity,2),'flag'=>0);
		//	echo ' '.$j.') '.$matrix[$i][$j]['string1'].$matrix[$i][$j]['string2'].$matrix[$i][$j]['percentage'].' % '.'   ,  '.'<br/>';
			$j++;	
		}
		$i++;	
		fclose($myfile6);
	}
	/////////////////////////////MAXIMUM PERCENTAGES//////////////////////////////////////////
	//$index[]=array();
$count=1;

	for($i=0;$i<sizeof($matrix)-1;$i++)
		{	
			$max=0;
			for($j=0;$j<sizeof($matrix)-1;)
			{
				/*while($j<=$i)
				{
					$j++;
				}*/
				if($matrix[$i][$j]['percentage']>$max)
				{
					if($count%2!=0)
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string1'];
						//fwrite($myfile3,$matrix[$i][$j]['string1']);
						$j++;
						$count++;
					}
					else
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string2'];
						//fwrite($myfile3,$matrix[$i][$j]['string2']);
						$j++;
						$count++;
					}
				}
				else
				{
					$j++;
				}
			}
		}
		for($i=0;$i<sizeof($index);$i++)
		{
			echo $index[$i].".";
				fwrite($myfile3,$index[$i]);
		}
		
	fclose($myfile3);
	fclose($myfile5);
		
?>