<?php

header("Content-type:text/html;charset=utf-8");

ini_set('date.timezone','Asia/Shanghai');


//$wen="C:\wamp\www\linux-54-".date("Y-m-d");
$wen="/var/www/html/upload";
$dd=date("Y-m-d");
$pre=preg_match("/^([0-9])+_/",$_FILES['file']["name"][0]);
$size =$_FILES['file']["size"][0];

if (!is_dir($wen.'/')) {

  MKDIR($wen.'/', 0777);

}




// foreach($_FILES['file']['error'] as $k=>$v){

  if ($_FILES["file"]["error"][0] > 0 ) {
    echo "上传失败！请查看是否选择了需要上传的文件！";
    }else if($pre==0){
   
    echo "上传失败！文件名有误，请修改文件名为你的编号加下划线开头<br/>例如：1_老男孩_lnmp架构.mp4";


  }else if ($size<10) {

    echo "上传失败！文件为空文件！";
  }else{
   
    $tmp_name = $_FILES["file"]["tmp_name"][0];
    $name =$_FILES["file"]["name"][0];
	$name = iconv('utf-8','gb2312',$name);

    if (file_exists($wen."/" . $name))
      {
      echo "上传失败，文件".$_FILES["file"]["name"][0] . " 已经存在 ";
      }
    else
      {
      move_uploaded_file($tmp_name,$wen."/" . $name);
      echo "文件".$_FILES["file"]["name"][0]."上传成功";
      }
    
}

// }
?>
