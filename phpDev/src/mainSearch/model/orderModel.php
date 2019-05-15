<?php
    use Illuminate\Database\Eloquent\Model;
    class catalogvenderheader1 extends Model{
        //protected $序号;
        //protected $厂家代码;
        protected $table = '1catalogvenderheader';
        //protected $primaryKey = '序号';//默认生成主键，主键名为id,自己指定已经在数据库创建的列
        public $timestamps = true;//时间戳
    }
?>