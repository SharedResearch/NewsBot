<?php
include"Bigram.php";
//similarity();
$myfile = fopen("Stokens1.txt", "r") or die("Unable to open file!");
	$myfiles = fopen("Stokens2.txt", "r") or die("Unable to open file!");
	//$myfile2 = fopen("percentages.txt", "w") or die("Unable to open file!");
	$myfile3= fopen("GSummarry.txt", "w+") or die("Unable to open file!");
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
						$j++;
						$count++;
					}
					else
					{
						$max = $matrix[$i][$j]['percentage'];
						$index[$i]=$matrix[$i][$j]['string2'];
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
		}
		
		$matrix1=array();
		$matrix1=[[]];
		//////////////////similarity
		for($i=0;$i<sizeof($index);$i++)
		{
			$text1 = $index[$i];
			$j=0;
			for($j=0;$j<sizeof($index);$j++)
			{
				$text2=$index[$j];		
				//$similarity= compareStrings($text1,$text2);
				similar_text($text1, $text2, $percent); 
				$matrix[$i][$j]=array('string'=>$text2 ,'percentage'=>round($percent,2),'flag'=>0);
				//echo ' '.$j.') '.$matrix[$i][$j]['string'].'.<br/>';
				
			}
	
		}
		/////////////////////////////MAXIMUM PERCENTAGES//////////////////////////////////////////
	$index1[]=array();


	for($i=0;$i<sizeof($matrix)-1;$i++)
		{	
			$max=0;
			for($j=0;$j<sizeof($matrix)-1;)
			{
				while($j<=$i)
				{
					$j++;
				}
				if($matrix[$i][$j]['percentage']>$max)
				{
					$max = $matrix[$i][$j]['percentage'];
					$index1[$i]=$j;
					$j++;
				}
				else
				{
					$j++;
				}
			}
		}
		echo  '<br/>'.'<br/>'."Summary".'<br/>'.'<br/>';
		//////////////////SENTENCES TO BE INCLUDED////////////////////////
		 for($i=0;$i<sizeof($index1)-1;$i++)
		{	$flag=0;
			for($j=0;$j<sizeof($index1)-1;$j++)
			{
				if($index1[$j]==$i)
				{
					$flag=1;					
					break;
				}	
			}
			if($flag==0)
			{
				echo $matrix[$i][$i]['string'].'. ';
				//fwrite($myfile3, $matrix[$i][$i]['string']);
			}
		}
?>