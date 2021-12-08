<form enctype="multipart/form-data" method="POST"> 
<input type="hidden" name="json" value="0">
Видео:
<input type="file" name="video">
<br>
Название:
<input type="text" name="title">
<br>
<input type="submit" name="">

</form>

<?php



if(empty($_FILES) ==false){
if(empty($_POST) ==false){
if(empty($_POST['json'])==false and $_POST['json']==1){
include 'mainlib.php';
$newfn = "video".intval(random_int(0,999999)).'.mp4';
$outvid = "video".intval(random_int(0,999999)).'.mp4';

while (file_exists($newfn)==true) {
	$newfn = "video".intval(random_int(0,999999)).'.mp4';
}
while (file_exists($outvid)==true) {
$outvid = "video".intval(random_int(0,999999)).'.mp4';
}

$result = move_uploaded_file($_FILES['video']['tmp_name'],$newfn );
uploadvid($newfn,$outvid,"/usr/share/nginx/html/folder_test/");	
header("Content-Type: application/json");
echo json_encode(array('result' => $result,'video_title'=>$_POST['title']));
}else{
include 'mainlib.php';   
$newfn = "video".intval(random_int(0,999999)).'.mp4';
$outvid = "video".intval(random_int(0,999999)).'.mp4';

while (file_exists($newfn)==true) {
	$newfn = "video".intval(random_int(0,999999)).'.mp4';
}
while (file_exists($outvid)==true) {
$outvid = "video".intval(random_int(0,999999)).'.mp4';
}
$result_state=move_uploaded_file($_FILES['video']['tmp_name'],$newfn );
if ($result_state) {
$result="успешно.";
}else{
	$result="не удалось.";
echo $_FILES['video']['error'];
}
echo "Загрузка видео ".$_POST['title']." завершена. Перемещение файла ".$result.'';

uploadvid($newfn,$outvid);
}
}


}


