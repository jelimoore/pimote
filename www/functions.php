<?php
function irsend($device, $key) {
	if (preg_match('/\s/',$device)) {
		die("hack attempt");
	} elseif (preg_match('/\s/',$key)) {
		die("hack attempt");
	} else {
		exec('irsend SEND_ONCE ' . $device . ' ' . $key);
	}
}

function irmacro($macro){
	switch ($macro) {
		case tv:
			$file = fopen("on.txt", "r") or die("unable to work properly");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(50000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} 
			
			irsend ("TV", "KEY_T");
			irsend ("STEREO", "KEY_TAPE");
		break;
		case dvd:
			$file = fopen("on.txt", "r") or die("unable to work properly");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "111");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "111");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(50000);
				irsend("STEREO", "KEY_POWER");
				usleep(5000);
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "111");
				fclose($file);
				sleep(10);
			} elseif ($on == 110){
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "111");
				fclose($file);
			}
			
			irsend ("TV", "KEY_C");
			usleep(1000000);
			irsend ("TV", "KEY_H");
			usleep(5000);
			irsend ("STEREO", "KEY_TAPE");
		break;
		case laptop:
			$file = fopen("on.txt", "r") or die("unable to work properly");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(5000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} 
			irsend ("TV", "KEY_C");
			usleep(1000000);
			irsend ("TV", "KEY_H");
			usleep(1000000);
			irsend ("TV", "KEY_H");
			usleep(5000);
			irsend ("STEREO", "KEY_TAPE");
		break;
		case wii:
			$file = fopen("on.txt", "r") or die("unable to work properly");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(5000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w") or die("unable to work properly");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} 
			
			irsend ("TV", "KEY_C");
			irsend ("STEREO", "KEY_TAPE");
		break;
		case poweroff:
			$file = fopen("on.txt", "r") or die("unable to work properly!");
			$on = fread($file,filesize("on.txt"));
			if ($on == 111){
				irsend("TV", "KEY_POWER");
				irsend("STEREO", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
			} elseif ($on == 110){
				irsend("TV", "KEY_POWER");
				irsend("STEREO", "KEY_POWER");
			} elseif ($on == 101){
				irsend("TV", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
			} elseif ($on == 100){
				irsend("TV", "KEY_POWER");
			} elseif ($on == 011){
				irsend("STEREO", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
			} elseif ($on == 010){
				irsend("STEREO", "KEY_POWER");
			} elseif ($on == 001){
				irsend("DVD, KEY_POWER");
			} elseif ($on == 000){
			} else {
				die("Well, somthing went wrong");
			}
			fclose($file);
			
			$file = fopen("on.txt", "w") or die("unable to work properlyish!");
			fwrite($file, "000") or die ("i suck");
			fclose($file);
			
		break;
	}
}
?>