<?php
/*
Titler: SIMPLE OPENCART PASSWORD DECRYPTOR BASED ON WORD LIST
Author: Taufik saputra
Github: https://github.com/taufiksptra

USAGE:
php opencript.php <HASH> <SALT> <WORDLIST>


DEMO:
C:\Users\demo\open-cript-master>php opencript.php f2e9efd4a366507c5b1cba7749659d93d61ae335 oInuc412L wordlist_demo.txt

HASH:f2e9efd4a366507c5b1cba7749659d93d61ae335
SALT:oInuc412L
PASSWORD:12345
TIME:3.814697265625E-5
*/

$password = $argv[1];
$salt = $argv[2];
$wordlist = $argv[3];

$lines = file($wordlist, FILE_IGNORE_NEW_LINES);
$start = microtime(true);

foreach($lines as $string)
{
   $hashed=SHA1($salt.SHA1($salt.SHA1($string)));
   if($hashed==$password){tempo($string,$password,'1',$start,$salt); break;}else{}
   if(!next($lines) ) { tempo($string,$password,'0',$start,$salt); break;} else{}
}

function tempo($string,$hashed,$found,$start,$salt){
$time = microtime(true) - $start;

	if($found=='1') {
		echo "\nHASH:".$hashed."\nSALT:".$salt."\nPASSWORD:".$string."\nTIME:".$time."\n";
	}
	else {
		echo "not foud\nTIME: ".$time."\n";
	}
}

?>

