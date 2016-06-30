<?php

function uploadfile($fileinfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxsize = 2097152,$flag = true,$path = 'upload'){
//匹配错误号
  if($fileinfo['error']>0){
    switch($fileinfo['error']){
      case:1 
        $meg =  '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
        break;
      case:2
        $meg = '超过了表单max_file_size的大小';
        break;
      case:3
        $meg =  '文件只有部分被上传';
        break;
      case:4
        $meg =  '没有文件被上传';
        break;
      case:6
        $meg =  '找不到临时文件';
        break;
      case:7
        $meg =  '文件写入失败';
        break;
      case:8
        $meg =  '上传的文件被php扩展程序中断';
        break;
    }
    exit($meg);
  }
  //检测上传文件的类型
  $ext= strtolower(end(explode('.',$fileinfo['name'])));
  //$allowExt=array('jpeg','jpg','png','gif','wbmp');
  if(!is_array($allowExt)){
    exit('系统错误');
  }
  if(!in_array($ext,$allowExt)){
    exit('非法文件类型');
  }
  
  //检测文件上传大小
  //$maxsize = 2097152;//2M
  if($fileinfo['size'] > $maxsize){
    exit('上传文件大小不符合规范');
  }
  
  
  //判断文件是否是通过HTTP POST方式上传来的
  if(!is_uploaded_file($fileinfo['tmp_name'])){
    exit('文件不是通过HTTP POST方式上传来的');
  }
      
  //txt文件修改扩展名为允许类型,上传不为真实图片,判断是否为真实图片
  $flag = true;//检测是否为真实的图片类型
  if($flag){
    if(!getimagesize($tmp_name)){
      exit('不是真正图片类型');
    }
  }
    
    
    //上传文件
  $path = 'upload';
  if(!file_exists($path)){
    mkdir($path,0777,true);
    chmod($path,0777);
  }
  $uniName = md5(uniqid(microtime(true),true)).'.'.$ext;
  $destination = $path.'/'.$uniName;
  if(!@move_uploaded_file($fileinfo['tmp_name'],$destination)){
    echo '文件'.$filename.'上传失败';
    
  }
 // echo '文件'.$filename.'上传成功';
 return array(
   'newName'=>$destination,
   'size'=>$fileinfo['type'],
   'type'=>$fileinfo['type'],
   );
}






?>




<?php
//获取文件信息
function getfiles(){
	$i = 0;
	foreach($_FILE as $file){
		if(is_string($file['name'])){
			$files[$i]=$file;
			$i++;
		}elseif(is_array($file['name'])){
			foreach($file['name'] as $key=>$val){
				$files[$i]['name'] = $file['name'][$key];
				$files[$i]['type'] = $file['type'][$key];
				$files[$i]['tmp_name'] = $file['tmp_name'][$key];
				$files[$i]['error'] = $file['error'][$key];
				$files[$i]['size'] = $file['size'][$key];
			}
		}
	}
	return $files;
}

function uploadFile(){
	//判断错误号
	if($fileinfo['error'] === UPLOAD_ERR_OK){
		//
	}else{
		//匹配错误信息
		switch($fileinfo['error']){
		      case:1 
		        $meg =  '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
		        break;
		      case:2
		        $meg = '超过了表单max_file_size的大小';
		        break;
		      case:3
		        $meg =  '文件只有部分被上传';
		        break;
		      case:4
		        $meg =  '没有文件被上传';
		        break;
		      case:6
		        $meg =  '找不到临时文件';
		        break;
		      case:7
		        $meg =  '文件写入失败';
		        break;
		      case:8
		        $meg =  '上传的文件被php扩展程序中断';
		        break;
		 }
	}
}



?>








//多文件函数的调用
<?php
  header('Content-type:text/html;charset=utf-8');
  include_once('upload.func.php');
  foreach($_FILES as $fileinfo){
    $files[]=uploadFile($fileinfo);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        请选择要上传的文件 <input type="file" name="myFile[]">  //myFile的name,type,tmp_name每个属性是数组,$_FILES是个三维数组,要设法依然使其成为二维数组
        请选择要上传的文件 <input type="file" name="myFile[]">
        请选择要上传的文件 <input type="file" name="myFile[]">
        请选择要上传的文件 <input type="file" name="myFile[]">
        提交:<input type="submit" name="" value="上传文件">
    </form>
</body>
</html>
