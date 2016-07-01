<?php
    class upload{
        protected $fileName;
        protected $maxSize;
        protected $allowMime;
        protected $allowExt;
        protected $uploadPath;
        protected $imageFlag;
        protected $fileinfo;
        protected $error;
        protected $ext;
        /**
         * 
         * @param string $filename
         * @param string $uploadPath
         * @param string $imageFlag
         * @param number $maxSize
         * @param array $allowMime
         * @param array $allowExt
        */
        public function __construct($filename='myFile',$uploadPath='./uploads',$maxSize=5242880,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$imageFlag=true,$allowMime=array('image/jpeg','image/png','image/jpg','image/gif')){
          $this->fileName=$fileName;
          $this->maxSize=$maxSize;
          $this->allowMime=$allowMime;//支持类型
          $this->allowExt=$allowExt;
          $this->uploadPath=$uploadPath;
          $this->imageFlag=$imageFlag;
          $this->fileinfo=$_FILES[$this->filename];
        }
        /**
         * 检测是否有错
         * 
         * @return boolean
        */
        protected function checkError(){
          if($this->fileinfo['error']>0){
            switch($this->fileinfo['error']){
              case 1:
                $this->error= '上传文件超过了PHP配置文件中upload_max_filesize选项的值';;
                break;
              case 2:
                $this->error= '超过了表单max_file_size的大小';
                break;
              case 3:
                $this->error= '文件只有部分被上传';
                break;
              case 4:
                $this->error='没有文件被上传';
                break;
              case 6:
                $this->error='找不到临时文件';
                break;
              case 7:
                $this->error='文件写入失败';
                break;
              case 8:
                $this->error='上传的文件被php扩展程序中断';
                break;
            }
            return false;
          }
          return true;
        }
        /**
         * 检测文件大小
         * 
         * @return boolean
        */
        protected function checkSize(){
          if($this->fileinfo['error']>0){
            $this->error='上传文件过大';
          }
          return true;
        }
        /**
         * 检测扩展名
         * 
         * @return boolean
        */
        protected function checkExt(){
          $this->ext=strtolower(pathinfo($this->pathinfo['name'],PATHINFO_EXTENSION))
          if(!in_array($this->ext,$this->allowExt)){
            $this->error='不允许的扩展名';
            return false;
          }
          return true;
        }
        /**
         * 检测图片类型
         * 
         * @return boolean
        */
        protected function checkMime(){
          if(!in_array($this->fileInfo['type'],$this->allowMime)){
            $this->error='不允许的文件类型';
            return false;
          }
          return true;
        }
        /**
         * 检测是否为真实图片
         * 
         * @return boolean
        */
        protected function checkTrueImage(){
          if($this->imageFlag){
            if(!@getimagesize($this->fileinfo['tmp_name'])){
              $this->error='这不是真实的图片文件';
              return false;
            }
            return true;
          }
        }
        /**
         * 检测是否为HTTP post方式上传图片
         * 
         * @return boolean
        */
        protected function checkHTTPPOST(){
          if(!is_uploaded_file($this->fileinfo['tmp_name'])){
		        $this->error='文件不是通过HTTP POST方式上传来的';
		        return false;
		      }
		      return true;
        }
        /**
         * 返回错误信息
         * 
         * @return string
        */
        protected function showError(){
          exit('<span style='color:red;'>'.$this->error.'</span>');
        }
         /**
         * 检测目录不存在则创建
         * 
         * @return 
        */
        protected function checkUploadPath(){
          if(!file_exist($this->uploadPath)){
            mkdir($this->uploadPath,0777,true);
          }
        }
        /**
         * 获取唯一字符串
         * 
         * @return string
        */
        protected function getUniName(){
          return md5(uniqid(microtime(true),true));
        }
        /**
         * 上传文件
         * 
         * @return string
        */
        public function uploadFile(){
          if($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->checkHTTPPOST()&&$this->checkMime()&&$this->checkTrueImage()){
            $this->checkUploadPath();
            $this->uniName = $this->getUniName();
            $this->destination = $this->uploadPath.'/'.$this->uniName.'.'.$this->ext;
            if(@move_uploaded_file($this->fileinfo['tmp_name'],$destination)){
              return $destination;
            }else{
              $this->error='文件上传失败';
              $this->showError();
            }
          }else{
            $this->showError();
          }
        }
    }
?>
