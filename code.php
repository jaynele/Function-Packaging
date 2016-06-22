<?php 
//show code and click to change  ,but we must have a package - 'code'
//use it like this...
require_once("resources/org/code/Code.class.php");


//make code image
public function code(){
        $code = new \Code;
        return $code->make();
}

//get code number
public function getcode(){
        $code = new \Code;
        return $code->get();
}

//use it in views like this
//also we must have the route  'admin/code'
<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
