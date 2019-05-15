<?php
    use Slim\Container;
    class select{
        private $container;
        private $path;
        function __construct(Container $container){
            $this->container = $container;
            $this->path = $container->get('path');
        }

        public function selectSingleTable($request,$arr){
            $connection = $this->container->get('db1');
            $sql = $this->createSql($request);
            $this->container->get('logger')->info($sql);

            $result = $connection->query($sql);
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;     //取出每一行都是数组
            }
            $resultApi = resutlApi($data);
            return $resultApi;       
        }

        public function selectMoreTableCatalogpnlist($request,$arr){
            $connection = $this->container->get('db1');
            $sqlBefore ="select t2.`件号`,t2.`单价`,t1.`厂家代码`,t1.`厂家名称`,t3.`库存数量` from 1catalogvenderheader t1 join 2catalogpnlist t2 on t1.`厂家代码`=t2.`供应商代码` join 4stockupdate t3 on t2.`供应商代码` = t3.`厂家代码` and t2.`件号` = t3.`件号` ";
            $sqlMiddle ="where t2.";
            $sql = $this->createSql($request,$sqlBefore,$sqlMiddle);
            $this->container->get('logger')->info($sql);
            $result = $connection->query($sql);
            $data = array();
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;     //取出每一行都是数组
            }
            $resultApi = resutlApi($data);
            return $resultApi;       
        }

        public function createSql($request,$sql1="select * from ",$sql2 = " where "){
            $parsedBody = $request -> getParsedBody();
            foreach($parsedBody as $key => $value){
                if($key == 'table'){
                    if($sql1 == "select * from "){
                        $sql1 = $sql1 .$value;
                    }
                }else if($key != null && $key != ""){
                    $sql2 = $sql2 .$key . " in ('";
                    $last = substr($value,-1);
                    if($last == "," || $last == "，"){//去除末尾添加的 ,
                        $value = substr($value,0,-1);
                    }
                    $arrString = str_replace(',',"','",$value);//将value中的‘，’,替换成“‘,’”
                    $sql2 = $sql2 . $arrString;
                    $sql2 =$sql2 . "')";
                    $sql2 = $sql2 . " and ";
                }
            }
            if(substr($sql2,-4) == "and "){
                $sql2 = substr($sql2,0,-4);
            }else{
                $sql2 = '';
            }
            $sql = $sql1 .$sql2;
            return $sql;
        }
    }
?>