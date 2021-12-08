<?php 
include 'mainlib.php';
header("Content-Type: application/json");
if(empty($_GET['file']) ==false){
$rec=recSong($_GET['file']);
if(empty($rec) ==false){
	echo json_encode($rec,JSON_UNESCAPED_UNICODE);
}
}
