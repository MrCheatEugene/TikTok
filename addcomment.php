<?php

try{
//print_r($_FILES);
//move_uploaded_file($_FILES['a']['tmp_name'],'/var/www/html/folder_test/'.$_FILES['a']['name']);
include('mainlib.php');
$fname='out'.rand(0,99).'.mp4';
commentplus($_GET['title'],$_GET['text'],'/tmp/','/usr/share/nginx/html/folder_test/'.$_GET['vid'],'/usr/share/nginx/html/folder_test/'.$fname);
echo$fname;

//shell_exec('screen -dmS test sh /var/www/html/folder_test/test.sh');
}catch(Exception $e){echo $e;}

