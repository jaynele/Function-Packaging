<?php
$fileinfo = $_FILE['pic'];
//匹配错误号
if($fileinfo['error']>0){
  switch($error){
    case:1 
      echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
      break;
    case:2
      echo '超过了表单max_file_size的大小';
      break;
    case:3
      echo '文件只有部分被上传';
      break;
    case:4
      echo '没有文件被上传';
      break;
    case:6
      echo '找不到临时文件';
      break;
    case:7
      echo '文件写入失败';
      break;
    case:8
      echo '上传的文件被php扩展程序中断';
      break;
  }
}else{
}

?>
