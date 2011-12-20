<?php
//---------Difine the class string
class StringClass{

     public $string1 = 'PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag.';
     public $string2 = 'PHP does not require (or support) explicit type definition in variable declaration; a variable\'s type is determined by the context in which the variable is used.';

     public $str1 = <<<STR1
PHP parses a file by looking for <br/> one of the special tags that tells it to start interpreting the text as PHP code. The parser then executes all of the code it finds until it runs into a PHP closing <br/> tag. 
STR1;
     public $str2 = <<<STR2
PHP does not require (or support) explicit type definition in variable declaration; a variable's type is determined by the context in which the variable is used.
STR2;
//public $stringA=htmlspecialchars($this->string1);
     public function displayVar(){ 
	//function to display the strings
	echo "Class:";	
	echo get_class($this);
	echo "<br/>";
	echo "<b>String1: </b>";       
	echo htmlspecialchars($this->string1);
        echo "<br/>";
	echo "<b>String2: </b>";
        echo $this->string2;
     }
     public function displayHereDoc(){
	//display string using heredoc
	echo "<b>String1: </b>";       
	echo $this->str1;
	echo "<br/>";
	echo "<b>String2: </b>";       
	echo $this->str2;
     }
    public function stringToUpper(){
	//String to upper case
	echo "<b>String1: </b>";
	//$stringA=htmlspecialchars($this->string1);
	echo strtoupper(htmlspecialchars($this->string1));
	echo "<br/>";
	echo "<b>String2: </b>"; 
	echo strtoupper($this->str2);
     }
   public function stringCombine(){
	//------combine two strings----
	echo htmlspecialchars($this->str1) . htmlspecialchars($this->str2);
     }
   public function stringLength(){
	echo "<b>length of string1: </b>";
	echo strlen(htmlspecialchars($this->str1)); 
	echo "<br/><b>length of string2: </b>";
	echo strlen($this->str2);
     }
   public function stringOcc(){
	echo "<b>Occurence of PHP: </b>";
	echo substr_count($this->str1,'PHP');
    }
   public function stringPosition(){
	echo "<b>Position of PHP: </b>";
	print_r(str_word_count($this->str1, 2));;
	echo "<br/>";
	$start = 0;
	$to_find= "PHP";
	while( ($pos = strpos(($this->str1),$to_find,$start)) !== false) {
		echo 'Found PHP at position '.$pos."<br/>";
		$start = $pos+1; // start searching from next position.
        }
   }	
   public function removeHtmlTags(){ 
	//function to display the string withou html tag
	echo "<b>Display string without tags</b>";	
	echo "<br/>";
	echo "<b>String1: </b>";       
	echo strip_tags($this->string1);
   }
   public function stringToArray(){
	echo "<b>String1 to array:</b>";
	print_r(str_word_count($this->str1, 1));
	echo "<br>";
	$arr = str_word_count($this->str1, 1);
	for($i=0;$i<str_word_count($this->str1,0);$i++){
  	  echo "[$i] = ";
	  echo $arr[$i];
	  echo "<br>";
	}
   }
   public function cutAndPrint(){
	echo "<b>cut the string1 into four chunks:</b><br/>";	
	print_r(chunk_split(htmlspecialchars($this->str1),57,"<br/>"));
   }
   public function divideByDot(){
	echo "<b>Divide string by '.' </b></br>";
	$arr= explode(".",htmlspecialchars($this->str1));
	echo "[0] = ".$arr[0];
	echo "<br/>";
	echo "[1] = ".$arr[1];
   }
   public function createFile(){
	echo "<b>File copied</b><br>";	
	$newfile= "file.txt";
	$op = $this->str1 . $this->str2; 
	$file = fopen ($newfile, "w"); 
	fwrite($file, $op); 
	/*file_put_contents($newfile, $op);*/
	$getData = file_get_contents($newfile);
	echo $getData;
	fclose ($file); 
   }
  public function displayWord(){
	echo "<b>Display PHP in String1</b><br/>";
	preg_match_all("/\bPHP\b/i", $this->str1,$array);
	print_r($array);
	echo "<br/>";
	$start = 0;
	$to_find= "PHP";
	while( ($pos = strpos(($this->str1),$to_find,$start)) !== false) {
		echo 'Found PHP at position ['.$pos."]->PHP<br/>";
		$start = $pos+1; // start searching from next position.
        }
	
  }
}


//---------Dispaly both the string---------------
	echo "<b>Echo string1 and string 2</b><br/>";
	$a = new StringClass();
	$a->displayVar();
	echo "<br/><br/>";

//-----------Displaying through Herdoc function----------
	echo "<b>Echo string and string 2 using heredoc</b><br/>";
	$a->displayHereDoc();
	echo "<br/><br/>";
//-----------display string to upper case---------------
	echo "<b>Capitalize both the strings</b></br>";
	$a->stringToUpper();
	echo "<br/><br/>";
//-------------combine two string--------------------
	echo "<b>Combine both the string</b><br/>";
	$a->stringCombine();
	echo "<br/><br/>";
//------------Length of strings--------
	$a->stringLength();
	echo "<br/><br/>";
//-------------Occurence of PHP-------
	$a->stringOcc();
	echo "<br/><br/>";
//-----------Position of PHP----------
	$a->stringPosition();
	echo "<br/><br/>";
//----------Remove html tag-----
	$a->removeHtmlTags();
	echo "<br/><br/>";
//-------create array of string1-----
	$a->stringToArray();
	echo "<br/><br/>";
//---------cut into 4 parts and print-----
	$a->cutAndPrint();
	echo "<br/><br/>";
//----------divide string by '.'----
	$a->divideByDot();
	echo "<br/><br/>";
//--------copy string to file ----
	$a->createFile();
	echo "<br/><br/>";
//--------display PHP word----
$a->displayWord();
	echo "<br/><br/>";
//---------------------------------Date Class------------------------

class DateClass{
    public function presentDateInArray(){
	echo "Present date in array format: ";  
	$today =getdate(); 
	print_r($today);
    }
    public function presentDate(){
	echo "<br><b>Present date:</b> ";  
	echo date("F j, Y, g:i a"); 
    }
    public function presentActualDate(){
	echo "<br><b>Print date:</b> ";  
	$date = mktime(0,0,0,1,12,2012);
	echo date("jS M, Y", mktime(0,0,0,1,12,2012));
    }
    public function addDays(){
	echo "<b>Add 7 days:</b>";	
	$date = date("Y-m-d");
	echo Date("Y-m-d", strtotime("+7 days"));
    }
    public function addMoreDays(){
	echo "<b>Add 20 days:</b>";	
	$date = date("Y-m-d");
	echo Date("Y-m-d", strtotime("+20 days"));
    }
public function diffDate(){ 
$start  = strtotime('2010/12/04'); 
$end    = strtotime('2011/12/05'); 
$myClass->Diff($start,$end); 
}
}

$b = new DateClass();
//-----display date in array form-----
$b->presentDateInArray();
//------print current date------------
$b->presentDate();
echo "<br>";
//------print actual date-----------
$b->presentActualDate();
echo "<br>";
$b->addDays();
echo "<br>";
$b->addMoreDays();
?>
