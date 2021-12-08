<?php

if(empty($_GET['false'])){
include('mainlib.php');
if(empty($_GET['svg'])){
setTextPlus($_GET['text'],$_GET['x'],$_GET['y'],$_GET['size'],$_GET['vid'],$_GET['out'],$_GET['symbol'],$_GET['yy']);
}else{
echo setTextApi($_GET['text'],$_GET['x'],$_GET['y'],$_GET['size'],$_GET['symbol'],$_GET['yy']);
}



}
