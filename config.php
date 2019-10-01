<?php

session_start();
if(!isset($_SESSION)) {
    $message = 'Session Empty';
	$_SESSION["access"] = 0;
	$_SESSION["sorted"] = 0;
} else {
	$message = 'Session ok';
	// echo "$message <br>";
}
