<?php
    function resutlApi($data=array(),$success='success',$code='200',$msg=''){
        $newData = array('data'=>$data,'success'=>$success,'code'=>$code,'msg'=>$msg);
        return $newData;
    }
?>