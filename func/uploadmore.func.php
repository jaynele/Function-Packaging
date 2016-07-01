<?php
//common.func.php文件内容如下
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
				$i++;
			}
		}
	}
	return $files;
}

//获取文件类型
/**
 * 得到文件扩展名
 * @param string $filename
 * @param string
*/
function getExt($filename){
	return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
}
/**
 * 得到文件唯一名
 * @param string
*/
function uniName(){
	return md5(uniqid(microtime(true),true));
}


//upload.func.php文件内容如下
function uploadFile($fileinfo,$maxsize = 2097152,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$flag=true,$path = './upload'){
	//判断错误号
	if($fileinfo['error'] === UPLOAD_ERR_OK){
		//检测文件上传大小
		//$maxsize = 2097152;
		if($fileinfo['size']>$maxsize){
			$res['mes']=$fileinfo['name'].'上传文件过大';
		}
		
		
		//检测上传文件类型
		$ext= getExt($fileinfo['name']);
		//$allowExt=array('jpeg','jpg','png','gif','wbmp');
		if(!in_array($ext,$allowExt)){
			$res['mes']=$fileinfo['name'].'文件类型不对';
		}
		
		
		//检测是否为真实图片
		//$flag=true;
		if($flag){
			if(!getimagesize($fileinfo['tmp_name']){
			$res['mes']=$fileinfo['name'].'不是真实图片类型';
			}	
		}
		
		
		//判断文件是否是通过HTTP POST方式上传来的
		  if(!is_uploaded_file($fileinfo['tmp_name'])){
		    $res['mes']=$fileinfo['name'].'文件不是通过HTTP POST方式上传来的';
		  }
		  
		  
		  if($res) return $res;
		  
		  
		 //$path = './upload';
		  if(!file_exists($path)){
		    mkdir($path,0777,true);
		    chmod($path,0777);
		  }
		  
		  $ext=getExt($fileinfo['name']);
		  
		  $uniName=uniName();
		  
		  $destination = $path.'/'.$uniName.$ext; 
		  
		if(!@move_uploaded_file($fileinfo['tmp_name'],$destination)){
			 $res['mes']=$fileinfo['name'].'文件移动失败';
      		}
      		$res['mes']='文件上传成功';
      		$res['dest']=$destination;
      		return $res;
		
		
	}else{
		//匹配错误信息
		switch($fileinfo['error']){
		      case:1 
		        $res['mes'] =  '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
		        break;
		      case:2
		        $res['mes'] = '超过了表单max_file_size的大小';
		        break;
		      case:3
		        $res['mes'] =  '文件只有部分被上传';
		        break;
		      case:4
		        $res['mes']=  '没有文件被上传';
		        break;
		      case:6
		        $res['mes'] =  '找不到临时文件';
		        break;
		      case:7
		        $res['mes']=  '文件写入失败';
		        break;
		      case:8
		        $res['mes'] =  '上传的文件被php扩展程序中断';
		        break;
		 }
	}
}



?>








//多文件函数的调用
<?php
  header('Content-type:text/html;charset=utf-8');
  include_once('upload.func.php');
  include_once('common.func.php');
  $files = getFiles();
  foreach($files as $fileinfo){
    $res=uploadFile($fileinfo);
    echo $res['mes'],'<br />';
    $uploadFiles[]=$res['dest'];
  }
  $uploadFiles=array_values(array_filter($uploadFiles));
  print_r($uploadFiles);

?>

//模板文件内容如下
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        请选择要上传的文件 <input type="file" name="myFile[]">  //myFile的name,type,tmp_name每个属性是数组,$_FILES是个三维数组,要设法依然使其成为二维数组
        请选择要上传的文件 <input type="file" name="myFile1">
        请选择要上传的文件 <input type="file" name="myFile2">
        请选择要上传的文件 <input type="file" name="myFile[]">
        请选择要上传的文件 <input type="file" name="myFile[]" multiple='multiple'>//一次选择多个文件
        提交:<input type="submit" name="" value="上传文件">
    </form>
</body>
</html>
