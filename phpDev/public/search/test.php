<?php
    function mm($data){
        echo $data;
    }
    class a{
        public function aa(){
            mm('ddd');
        }
    }
    $a =new a();
    $a->aa();
?>