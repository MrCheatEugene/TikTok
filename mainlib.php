<?php
require_once '/phplibs/vendor/autoload.php';
use SVG\SVG;
function chunk_split_unicode($str, $l = 76, $e = "\r\n") {
    $tmp = array_chunk(
        preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY), $l);
    $str = "";
    foreach ($tmp as $t) {
        $str .= join("", $t) . $e;
    }
    return $str;
}
function comment($title,$text){
$_GET['title']=$title;
$_GET['text']=$text;
$svg= SVG::fromFile("/test/test/template-tiktokc.svg");
//  $svg = new \SVG\SVG(600, 400);
$font = new \SVG\Nodes\Structures\SVGFont('Arial Black','arialb.ttf');
  $fontt = new \SVG\Nodes\Structures\SVGFont('Segoe UI Light','segoeuil.ttf');

$tittle=$title;
if(mb_strlen($tittle,'UTF8')<12){ $text=array('0'=>$text);
//print_r($text);
}else{
  $tittle=explode('=|-+|=',chunk_split_unicode($tittle,12,'=|-+|='));
}
 $svg->getDocument()->addChild($font);
  $svg->getDocument()->addChild(
    (new \SVG\Nodes\Texts\SVGText($tittle['0'],2,3.5))
      ->setFont($font)
      ->setSize(2.5)
  );$txtt=$_GET['text'];
//file_put_contents("tttt",mb_strlen($txtt,UTF8));
if(mb_strlen($txtt,'UTF8')<25){ $text=array('0'=>$txtt);
//print_r($text);
}else{
  $text=explode('=|-+|=',chunk_split_unicode($txtt,25,'=|-+|='));
}

//print_r($text);
//file_put_contents("fff",implode('s',$text));

if(count($text) > 2){
  foreach ($text as $key => $value){
  if($key >2){
unset($text[$key]);
  }
    
  }
 }

  $multiplierf=0.5;
  foreach ($text as $key => $value) { 
$multiplier=($key*2)+$multiplierf;
 $svg->getDocument()->addChild($fontt);
  $svg->getDocument()->addChild(
    (new \SVG\Nodes\Texts\SVGText($text[$key],2,5+$multiplier))
      ->setFont($fontt)
      ->setSize(1.5)
  );
  $multiplierf=$multiplierf+0.25;
  }
//header('Content-Type: image/svg+xml');

return $svg;

}

function commentplus($title,$text,$shpath,$inputvid,$outvid){
$fpath="/tmp/comment_temp".rand(0,9999).".svg";
file_put_contents($fpath, comment($title,$text));
$shhh=$shpath.rand(0,99999).'comment-temp-execute.sh';
$shhhhhhhhhhhhhhh =$shpath.rand(0,99999).'comment-execute-temp.sh';

file_put_contents($shhh,'ffmpeg -i '.$inputvid.' -i '.$fpath.' -filter_complex "overlay=25:25" '.$outvid.'; rm '.$shhh.'; rm '.$shhhhhhhhhhhhhhh.';');
file_put_contents($shhhhhhhhhhhhhhh,'screen -dmS commentexec'.rand(0,999).' sh '.$shhh);
shell_exec('sh '.$shhhhhhhhhhhhhhh);

}

  function recSong($file){
$rec = shell_exec('songrec audio-file-to-recognized-song '.$file.' 2>&1');
$return=array();
$rec=json_decode($rec,true);
$return['title']=$rec['track']['title'];
$return['artist']=$rec['track']['subtitle'];
$return['url']=$rec['track']['url'];   
   return $return;
  }
function getLicensers($songName){
  return json_decode(file_get_contents('http://vds.mrcheat.ga/search/search-sc.php?q='.$songName.'&json=1'),true);
}
function setText($text,$x,$y,$size,$symbol,$cutevery){
$svg=new \SVG\SVG(9999,9999);
$font= new \SVG\Nodes\Structures\SVGFont('Segoe UI Light','segoeuil.ttf');
$svg->getDocument()->addChild($font);
$txtt=$text;
if(mb_strlen($txtt,UTF8)<$symbol){ $text=array('0'=>$txtt);
//print_r($text);
}else{
  $text=explode('=|-+|=',chunk_split_unicode($txtt,$symbol,'=|-+|='));
}

//print_r($text);
//file_put_contents("fff",implode('s',$text));

if(count($text) > 2){
  foreach ($text as $key => $value){
  if($key >2){
unset($text[$key]);
  }
    
  }
 }

foreach($text as $key=>$value){
$svg->getDocument()->addChild(
(new \SVG\Nodes\Texts\SVGText($value,$x,$y+($cutevery*$key)))
->setFont($font)
->setSize($size)
->setStyle('fill','white')
);}
return $svg;
}

function setTextPlus($text,$x,$y,$size,$if,$of,$symbol,$cutevery){
$fpath="/tmp/settext_temp".rand(0,9999).".svg";
file_put_contents($fpath, setText($text,$x,$y,$size,$symbol,$cutevery));
$shhh=$shpath.rand(0,99999).'settext-temp-execute.sh';
$shhhhhhhhhhhhhhh =$shpath.rand(0,99999).'settext-execute-temp.sh';

file_put_contents($shhh,'ffmpeg -i '.$if.' -t  00:00:03 -i '.$fpath.' -filter_complex "overlay=25:25" '.$of.';'.'rm '.$shhhhhhhhhhhhhhh.'; rm '.$shhh);
file_put_contents($shhhhhhhhhhhhhhh,'screen -dmS commentexec'.rand(0,999).' sh '.$shhh);
shell_exec('sh '.$shhhhhhhhhhhhhhh);

}
function setTextApi($text,$x,$y,$size,$symbol,$cutevery){
$svg=new \SVG\SVG();
$font= new \SVG\Nodes\Structures\SVGFont('Segoe UI Light','segoeuil.ttf');
$svg->getDocument()->addChild($font);
$txtt=$text;
if(mb_strlen($txtt,UTF8)<$symbol){ $text=array('0'=>$txtt);
//print_r($text);
}else{
  $text=explode('=|-+|=',chunk_split_unicode($txtt,$symbol,'=|-+|='));
}

//print_r($text);
//file_put_contents("fff",implode('s',$text));

if(count($text) > 2){
  foreach ($text as $key => $value){
  if($key >2){
unset($text[$key]);
  }
    
  }
 }

foreach($text as $key=>$value){
$svg->getDocument()->addChild(
(new \SVG\Nodes\Texts\SVGText($value,$x,$y+($cutevery*$key)))
->setFont($font)
->setSize($size)
->setStyle('fill','black')
);}
return $svg;

//return $returnhtml

}

function uploadvid($invid,$outvid,$shpath){
$shhh=$shpath.rand(0,99999).'vidupload-temp-execute.sh';
$shhhhhhhhhhhhhhh =$shpath.rand(0,99999).'vidoupload-execute-temp.sh';

file_put_contents($shhh,'ffmpeg -i '.$shpath.$invid.' -crf 28 '.$outvid.'; rm '.$shhh.'; rm '.$shhhhhhhhhhhhhhh.'; rm '.$invid.'; 

php -r "'."include('".$shpath."mainlib.php'); cccopy('".$outvid."');".'"');
//file_get_contents($shhh,'rm '.$invid.';');
file_put_contents($shhhhhhhhhhhhhhh,'screen -dmS videxec'.rand(0,999).' sh '.$shhh);

  
shell_exec('sh '.$shhhhhhhhhhhhhhh);

}
function removeMusic($check){
  $shhh=$shpath.rand(0,99999).'removeMusic-temp-execute.sh';
$shhhhhhhhhhhhhhh =$shpath.rand(0,99999).'removeMusic-execute-temp.sh';
//-af "afftdn=nf=-25"
file_put_contents($shhh,'/test/ffmpeg -y -i '.$check.' -af "equalizer=f=20:width_type=h:width=400:g=-50,equalizer=f=690:width_type=h:width=20000:g=-50,equalizer=f=400:width_type=h:width=690:g=+10,volume=15dB" yup_'.$check.';'.'rm '.$shhhhhhhhhhhhhhh.'; rm '.$shhh);//.'rm '.$shhhhhhhhhhhhhhh.'; rm '.$shhh
file_put_contents($shhhhhhhhhhhhhhh,'screen -dmS commentexec'.rand(0,999).' sh '.$shhh);
shell_exec('sh '.$shhhhhhhhhhhhhhh);
}
function cccopy($check){
  $res=recSong($check);
//  file_put_contents("ffffff", json_encode($res));

  if(($res['title'] == null) or ($res['artist'] == null) or ($res['url'] == null)) {

  }else{
//unlink($toremove)
removeMusic($check);
//file_put_contents("ffffff", json_encode($res));
  }
  //file_put_contents("/var/www/html/folder_test/ffffff", implode('glue',$res));
}
?>


